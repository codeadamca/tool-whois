<?php

// Initialize a session
session_start();

// Include functions file
include('functions.php');

// Import env variables
$env = file(__DIR__.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($env as $value)
{
  $value = explode('=', $value);  
  define($value[0], $value[1]);
}

// Check if domain is a valid format
if(is_valid_domain($_POST['domain']) == false)
{

    header('Location: /?error');
    die();

}

// Initiate API WHOIS call
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

// Execute API call
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// Check for API call errors
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

// Temporarily use a static JSON file for testing
// $response = file_get_contents('brickmmo.com.json');

// Save domain and API response to session
$_SESSION['domain'] = $_POST['domain'];
$_SESSION['response'] = $response;

/*
echo '<pre>';
print_r($response);
echo '</pre>';
*/

// Redirect to details page
header('Location: details.php');
die();