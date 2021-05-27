<?php

function getCinemas()
{
    global $conn;
    $query = 'SELECT * FROM cinema';
    $response = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getCinema($id = 0)
{
    global $conn;
    $query = 'SELECT * FROM cinema';
    if (0 != $id) {
        $query .= ' WHERE id='.$id.' LIMIT 1';
    }
    $response = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function addCinema()
{
    global $conn;
    $name = $_POST['name'];
    $adress = $_POST['adress'];
    $id_price = $_POST['id_price'];
    $id_room = $_POST['id_room'];

    echo $query = "INSERT INTO cinema(name, adress, id_price, id_room) VALUES('".$name."', '".$adress."',{$id_price},{$id_room})";

    if (mysqli_query($conn, $query)) {
        $response = [
            'status' => 1,
            'status_message' => 'Cinema ajoute avec succes.',
        ];
    } else {
        $response = [
            'status' => 0,
            'status_message' => 'ERREUR!.'.mysqli_error($conn),
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteCinema($id)
{
    global $conn;
    $query = 'DELETE FROM cinema WHERE id='.$id;
    if (mysqli_query($conn, $query)) {
        $response = [
            'status' => 1,
            'status_message' => 'Produit supprime avec succes.',
        ];
    } else {
        $response = [
            'status' => 0,
            'status_message' => 'La suppression du produit a echoue. '.mysqli_error($conn),
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function updateCinema($id)
{
    global $conn;
    $_PUT = []; //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);
    $name = $_PUT['name'];
    $adress = $_PUT['adress'];
    $id_price = $_PUT['id_price'];
    $id_room = $_PUT['id_room'];

    //construire la requête SQL
    $query = "UPDATE cinema SET name='".$name."', adress='".$adress."', id_price={$id_price}, id_room={$id_room} WHERE id=".$id;

    if (mysqli_query($conn, $query)) {
        $response = [
            'status' => 1,
            'status_message' => 'Produit mis a jour avec succes.',
        ];
    } else {
        $response = [
            'status' => 0,
            'status_message' => 'Echec de la mise a jour de produit. '.mysqli_error($conn),
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
