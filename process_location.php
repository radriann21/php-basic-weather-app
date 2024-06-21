<?php

function processlocation()
{

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Headers: Content-Type");
  header("Content-Type: application/json");

  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  if (isset($data['latitude']) && isset($data['longitude'])) {
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];

    $API_KEY = getenv('API_KEY'); 
    $API_URL = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$API_KEY";

    $ch = curl_init($API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($httpCode == 200) {
      $weatherData = json_decode($response, true);
      echo json_encode($weatherData);
    } else {
      echo json_encode(['error' => 'Error al obtener los datos del climma']);
    }
  } else {
    echo json_encode(['error' => 'Coordernadas no proporcionadas']);
  }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  processlocation();
}
?>