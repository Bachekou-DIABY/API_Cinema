<?php

$url = 'http://localhost/API/put.php/1'; // modifier le produit 1
$data = ['name' => 'Comoedia', 'adress' => '13 Avenue Berthelot, 69007 Lyon', 'id_price' => '1', 'id_room' => '1'];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($ch);

var_dump($response);

if (!$response) {
    return false;
}
