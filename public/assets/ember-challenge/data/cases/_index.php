<?php
//change the server address and workspace to match your system:
$pmServer    = 'http://enterprisetrial3.processmaker.com'; //http://localhost:8081 - http://enterprisetrial3.processmaker.com
$pmWorkspace = 'carlomagno83';//workflow - carlomagno83

$clientId = "MFLUMKSSSEQTDJAHOISGMOOKJFIYNUYA"; // LTLPGXYQYNMWRKAXFZAVUALFCXUEILZH - MFLUMKSSSEQTDJAHOISGMOOKJFIYNUYA
$clientSecret = "97723161355ba74f5bb6095076297444";// 23507690455b83c48e0ade4072400163 - 97723161355ba74f5bb6095076297444
$username = "mario.conchaflores@gmail.com";// admin - mario.conchaflores@gmail.com
$password = "anton9001";// admin - anton9001

$oToken = pmRestLogin($clientId, $clientSecret, $username, $password);
if (isset($oToken) and isset($oToken->access_token)) {

   //can now call REST endpoints using $oToken->access_token
   //die('end');
   $oRet = pmRestRequest("GET", "/api/1.0/".$pmWorkspace."/cases", null, $oToken->access_token);

   $cases = array('cases'=>$oRet);
   //var_dump($aUsers);
   echo json_encode($cases);

   
}else{
   echo "Not Access token";
}

function pmRestLogin($clientId, $clientSecret, $username, $password) { 
   global $pmServer, $pmWorkspace;
   $postParams = array(
      'grant_type'    => 'password',
      'scope'         => '*',       //set to 'view_process' if not changing the process
      'client_id'     => $clientId,
      'client_secret' => $clientSecret, 
      'username'      => $username,
      'password'      => $password 
   );
 
   $ch = curl_init("$pmServer/$pmWorkspace/oauth2/token");
   curl_setopt($ch, CURLOPT_TIMEOUT, 30);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
   $oToken = json_decode(curl_exec($ch));
   $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);
   if ($httpStatus != 200) {
      print "Error in HTTP status code: $httpStatus\n";
      return null;
   }
   elseif (isset($oToken->error)) {
      print "Error logging into $pmServer:\n" .
         "Error:       {$oToken->error}\n" .
         "Description: {$oToken->error_description}\n";
   }
   else {
      //At this point $oToken->access_token can be used to call REST endpoints.
 
      //If planning to use the access_token later, either save the access_token 
      //and refresh_token as cookies or save them to a file in a secure location. 
 
      //If saving them as cookies:
      setcookie("access_token",  $oToken->access_token,  time() + 3600);
      setcookie("refresh_token", $oToken->refresh_token); //refresh token doesn't expire
      setcookie("client_id",     $clientId);
      setcookie("client_secret", $clientSecret);
 
      //If saving to a file:
      //file_put_contents("oauthAccess.json", json_encode($oToken));
   }
 
   return $oToken; 
}


function pmRestRequest($method, $endpoint, $aVars = null, $accessToken = null) {
   global $pmServer;
 
   if (empty($accessToken) and isset($_COOKIE['access_token'])) 
      $accessToken = $_COOKIE['access_token'];
 
   if (empty($accessToken)) { //if the access token has expired
      //To check if the PM login session has expired: !isset($_COOKIE['PHPSESSID'])
      //header("Location: loginForm.php"); //change to match your login method
      die('Access token has expired');
   }
 
   //add beginning / to endpoint if it doesn't exist:
   if (!empty($endpoint) and $endpoint[0] != "/")
      $endpoint = "/" . $endpoint; 
 
   $ch = curl_init($pmServer . $endpoint);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $accessToken));
   curl_setopt($ch, CURLOPT_TIMEOUT, 30);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $method = strtoupper($method);
 
   switch ($method) {
      case "GET":
         break;
      case "DELETE":
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
         break;
      case "PUT":
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      case "POST":
         curl_setopt($ch, CURLOPT_POST, 1); 
         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($aVars));
         break;
      default:
         throw new Exception("Error: Invalid HTTP method '$method' $endpoint");
         return null;
   }
 
   $oRet = new StdClass;
   $oRet->response = json_decode(curl_exec($ch));
   $oRet->status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);
 
   if ($oRet->status == 401) { //if session has expired or bad login:
      //header("Location: loginForm.php"); //change to match your login method
      die('Access token has expired');  
   }
   elseif ($oRet->status != 200 and $oRet->status != 201) { //if error
      if ($oRet->response and isset($oRet->response->error)) {
         print "Error in $pmServer:\nCode: {$oRet->response->error->code}\n" .
               "Message: {$oRet->response->error->message}\n";
      }
      else {
         print "Error: HTTP status code: $oRet->status\n";
      }
   }
 
   return $oRet->response; 
}

