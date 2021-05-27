<?php

require_once './database/db_connect.php';

require_once './functions.php';

  $request_method = $_SERVER['REQUEST_METHOD'];

  switch ($request_method) {
    case 'GET':
      if (!empty($_GET['id'])) {
          // Récupérer un seul produit
          $id = intval($_GET['id']);
          getUser($id);
      } else {
          // Récupérer tous les produits
          getUsers();
      }

      break;

    case 'POST':
      // Ajouter un produit
      addUser();

      break;

    case 'PUT':
      // Modifier un produit
      $id = intval($_GET['id']);
      updateUser($id);

      break;

    case 'DELETE':
      // Supprimer un produit
      $id = intval($_GET['id']);
      deleteUser($id);

      break;

    default:
      // Requête invalide
      header('HTTP/1.0 405 Method Not Allowed');

      break;
  }
