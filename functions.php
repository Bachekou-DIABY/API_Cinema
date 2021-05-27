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

    echo $query = "INSERT INTO cinema(name, adress) VALUES('".$name."', '".$adress."')";

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

    //construire la requête SQL
    $query = "UPDATE cinema SET name='".$name."', adress='".$adress."' WHERE id=".$id;

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

function getUsers()
{
    global $conn;
    $query = 'SELECT * FROM user';
    $response = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getUser($id = 0)
{
    global $conn;
    $query = 'SELECT * FROM user';
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

function addUser()
{
    global $conn;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $encrypted_password = password_hash($_POST['encrypted_password'], PASSWORD_DEFAULT);
    $id_cinema = $_POST['id_cinema'];

    echo $query = "INSERT INTO user(first_name, last_name, email, encrypted_password,id_cinema) 
    VALUES('".$first_name."', '".$last_name."','".$email."','".$encrypted_password."',{$id_cinema})";

    if (mysqli_query($conn, $query)) {
        $response = [
            'status' => 1,
            'status_message' => 'Utilisateur ajoute avec succes.',
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

function deleteUser($id)
{
    global $conn;
    $query = 'DELETE FROM user WHERE id='.$id;
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

function updateUser($id)
{
    global $conn;
    $_PUT = []; //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);
    $first_name = $_PUT['first_name'];
    $last_name = $_PUT['last_name'];
    $email = $_PUT['email'];
    $encrypted_password = password_hash($_PUT['encrypted_password'], PASSWORD_DEFAULT);
    $id_cinema = $_PUT['id_cinema'];

    //construire la requête SQL
    $query = "UPDATE user 
    SET first_name='".$first_name."', last_name='".$last_name."', email='".$email."', encrypted_password='".$encrypted_password."',id_cinema={$id_cinema} 
    WHERE id=".$id;

    if (mysqli_query($conn, $query)) {
        $response = [
            'status' => 1,
            'status_message' => 'Utilisateur mis a jour avec succes.',
        ];
    } else {
        $response = [
            'status' => 0,
            'status_message' => 'Echec de la mise a jour de l\'utilisateur. '.mysqli_error($conn),
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getAdministrators()
{
    global $conn;
    $query = 'SELECT * FROM administrator';
    $response = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getAdministrator($id = 0)
{
    global $conn;
    $query = 'SELECT * FROM administrator';
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

function addAdministrator()
{
    global $conn;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $encrypted_password = password_hash($_POST['encrypted_password'], PASSWORD_DEFAULT);

    echo $query = "INSERT INTO administrator(first_name, last_name, email, encrypted_password) 
    VALUES('".$first_name."', '".$last_name."','".$email."','".$encrypted_password."')";

    if (mysqli_query($conn, $query)) {
        $response = [
            'status' => 1,
            'status_message' => 'Administrateur ajoute avec succes.',
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

function deleteAdministrator($id)
{
    global $conn;
    $query = 'DELETE FROM administrator WHERE id='.$id;
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

function updateAdministrator($id)
{
    global $conn;
    $_PUT = []; //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);
    $first_name = $_PUT['first_name'];
    $last_name = $_PUT['last_name'];
    $email = $_PUT['email'];
    $encrypted_password = password_hash($_PUT['encrypted_password'], PASSWORD_DEFAULT);

    //construire la requête SQL
    $query = "UPDATE administrator 
    SET first_name='".$first_name."', last_name='".$last_name."', email='".$email."', encrypted_password='".$encrypted_password."' 
    WHERE id=".$id;

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
