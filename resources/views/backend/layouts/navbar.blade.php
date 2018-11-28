<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>{{ __('manager') }}</span>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-envira"></i>
                    </span>
                    <span class="title">{{ __('product') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('products.index') }}">{{ __('Product Information') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('product_types.index') }}">{{ __('Product Types') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-envira"></i>
                    </span>
                    <span class="title">{{ __('Bill') }}</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('bills.index') }}">{{ __('Bills Information') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
