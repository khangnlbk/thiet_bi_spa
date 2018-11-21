<?php
$pmWorkspace = 'carlomagno83';
$oToken = json_decode(file_get_contents("app-data.json"), true);


$ch = curl_init("http://enterprisetrial3.processmaker.com/api/1.0/".$pmWorkspace."/cases");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $oToken['access_token']));
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$method = strtoupper($method);

$data = json_decode(curl_exec($ch));
$info= curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$cases = array('cases'=>$data);
echo json_encode($cases);




