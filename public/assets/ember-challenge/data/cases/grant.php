<?php

if (! empty($_GET['error'])) {
    print_r($_GET);
    die();
}

$apiServer = "http://enterprisetrial3.processmaker.com/api/1.0/carlomagno83";
$endpoint = "/token";
$appData = json_decode(file_get_contents("app-data.json"), true);

$postParams = array(
    'grant_type' => 'authorization_code',
    'code' => $_GET['code']
);

$ch = curl_init($apiServer . $endpoint);

curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERPWD, $appData['client_id'] . ":" . $appData['client_secret']);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

$result = curl_exec($ch);
$data = json_decode($result, true);
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

if (isset($data["access_token"])) {
    file_put_contents("app-data.json", json_encode(array_merge($appData, $data)));
    //var_dump($data);

    echo "<script>parent.location.reload()</script>";
    //header("location: index.php");
} else {
    print "<br>\n<font color=red>No access token returned from $endpoint</font><br>\n";
}




