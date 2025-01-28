<?php

session_start();

include('functions.php');

$env = file(__DIR__.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($env as $value)
{
  $value = explode('=', $value);  
  define($value[0], $value[1]);
}

if(is_valid_domain($_POST['domain']) == false)
{

    header('Location: /?error');
    die();

}

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://whois-lookup-service.p.rapidapi.com/v1/getwhois?url=".$_POST['domain'],
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: whois-lookup-service.p.rapidapi.com",
		"x-rapidapi-key: ".RAPIDAPI_KEY
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
	header('Location: /?api');
    die();
}

$response = json_decode($response, true);

if($response['status'] != 'ok')
{
	header('Location: /?api');
    die();
}

// $response = file_get_contents('brickmmo.com.json');

$_SESSION['domain'] = $_POST['domain'];
$_SESSION['response'] = $response;

/*
echo '<pre>';
print_r($response);
echo '</pre>';
*/

header('Location: details.php');
die();