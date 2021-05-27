<?php

  $url = 'http://localhost/API/cinemas.php';
  $data = ['name' => 'Pathe Vaise', 'adress' => '43, rue des Docks 69009 Lyon', 'id_price' => '3', 'id_room' => '3'];

  // utilisez 'http' même si vous envoyez la requête sur https:// ...
  $options = [
      'http' => [
          'header' => "Content-type: application/x-www-form-urlencoded\r\n",
          'method' => 'POST',
          'content' => http_build_query($data),
      ],
  ];
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if (false === $result) { // Handle error
  }

  var_dump($result);
