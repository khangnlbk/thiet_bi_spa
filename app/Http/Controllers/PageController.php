<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Illuminate\Support\Facades\Mail;
use Session;
use Hash;
use Auth;

class PageController extends Controller
{
    //

    public function getIndex() {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(8,['*'],'pag1');
        $sale_product = Product::where('promotion_price', '<>', 0 )->paginate(8,['*'],'pag2');
        // var_dump($slide);
        // dd($new_product);
        // exit;
    	// return view('page.trangchu', ['slide'=>$slide]);
        return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));
        // return view('page.trangchu', compact('new_product'));
    }

    public function getProductType($type) {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai_sp = ProductType::all();
        $loai_sanpham = ProductType::where('id', $type)->first();
    	return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai_sp', 'loai_sanpham'));
    }

    public function getProductDetail(Request $req) {
        $sanpham = Product::where('id', $req->id)->first();
        $sanpham_cungloai = Product::where('id_type', $sanpham->id_type)->paginate(3);
    	return view('page.chitiet_sanpham', compact('sanpham', 'sanpham_cungloai', 'so_luong', 'selectOption'));
    }

    public function getContact() {
        return view('page.lienhe');
    }

    public function getAbout() {
        return view('page.gioithieu');
    }

    public function getAddToCart(Request $req, $id) {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);   
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function postAddToCart(Request $req, $id) {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addMany($product, $id, $req->qty);   
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteItemCart($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout() {
        return view('page.dathang');
    }

    public function postCheckout(Request $req) {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->full_name = $req->fullname;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        // if ($req->use_coin == 'yes') {
        //     $bill->total = $cart->totalPrice - Auth::user()->coin_point*10;   
        //     Auth::user()->coin_point = 0;
        // } elseif ($req->use_coin == 'no'){
        //     $bill->total = $cart->totalPrice;
        //     Auth::user()->coin_point += $cart->totalPrice/1000;  
        // }
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $customer->note;
        $bill->save();
        // Auth::user()->save();    


        foreach ($cart->items as $key => $value) {
            $billDetail = new BillDetail;
            $billDetail->id_bill = $bill->id;
            $billDetail->id_product = $key;
            $billDetail->quantity = $value['qty'];
            $billDetail->unit_price = ($value['price']/$value['qty']);
            $billDetail->save();
        }

        $data = array(
            'bill' => $bill,
        );
        Mail::send('mail.bill', $data, function ($message) {
            $message->from('tinhhang22@gmail.com', 'Bill order');
            $message->to('tinh.nc96@gmail.com')->subject('Test!');
        });
        Session::forget('cart');

        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function getLogin() {
        return view('page.login');
    }
    public function getSignup() {
        return view('page.signup');
    }

    public function postSignup(Request $req) {
        $this->validate($req,
            [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            're_password'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',  
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Mật khẩu tối thiểu 6 kí tự',
            'password.max'=>'Mật khẩu tối đa 20 kí tự',
            'fullname.required'=>'Vui lòng nhập tên đầy đủ',
            're_password.required'=>'Vui lòng nhập lại password',
            're_password.same'=>'Mật khẩu không trùng khớp'
        ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->gender = $req->gender;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanh-cong', 'Đã tạo tài khoản thành công.Vui lòng đăng nhập để tiếp tục');
    }

    public function postLogin(Request $req) {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',  
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu tối thiểu 6 kí tự',
                'password.max'=>'Mật khẩu tối đa 20 kí tự'               
            ]
        );
        $credientials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credientials)) {
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Đăng nhập thành công']);
        }
        else {
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công, sai email hoặc password, vui lòng thử lại']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req) {
        $product = Product::where('name', 'like', '%'.$req->key.'%')
                            ->orWhere('unit_price', $req->key)
                            ->paginate(4);
        return view('page.search', compact('product'));
    }

    public function getEdit() {
        return view('page.edit');
    }

    public function postEdit(Request $req) {
        $this->validate($req,
            [
            'password'=>'max:20',
            'fullname'=>'required',
            're_password'=>'same:password'
        ],
        [
            'password.max'=>'Mật khẩu mới tối đa 20 kí tự',
            'fullname.required'=>'Vui lòng nhập tên đầy đủ',
            're_password.same'=>'Mật khẩu mới không trùng khớp'
        ]);

        $current_user = User::find(Auth::user()->id);
        $current_user->full_name = $req->fullname;
        $current_user->gender = $req->gender;
        $current_user->phone = $req->phone;
        $current_user->address = $req->address;
        if ($req->password !== null) {
            if (password_verify($req->old_password, $current_user->password)) {
                $current_user->password = Hash::make($req->password); 
            } else {
                return redirect()->back()->with('sua-that-bai', 'Mật khẩu cũ không đúng');
            }

            if (strlen($req->password) < 6) {
                return redirect()->back()->with('sua-that-bai-2', 'Mật khẩu mới tối thiểu 6 kí tự');
            }
        }
                   
        $current_user->save();
        // var_dump($current_user);
        // exit;
        return redirect()->back()->with('sua-thanh-cong', 'Sửa thông tin cá nhân thành công');
    }
}
