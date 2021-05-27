<?php

require_once './database/db_connect.php';

require_once './functions.php';

  $request_method = $_SERVER['REQUEST_METHOD'];

  switch ($request_method) {
    case 'GET':
      if (!empty($_GET['id'])) {
          // Récupérer un seul produit
          $id = intval($_GET['id']);
          getAdministrator($id);
      } else {
          // Récupérer tous les produits
          getAdministrators();
      }

      break;

    case 'POST':
      // Ajouter un produit
      addAdministrator();

      break;

    case 'PUT':
      // Modifier un produit
      $id = intval($_GET['id']);
      updateAdministrator($id);

      break;

    case 'DELETE':
      // Supprimer un produit
      $id = intval($_GET['id']);
      deleteAdministrator($id);

      break;

    default:
      // Requête invalide
      header('HTTP/1.0 405 Method Not Allowed');

      break;
  }
