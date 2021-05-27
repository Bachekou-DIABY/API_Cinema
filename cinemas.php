<?php

require_once './database/db_connect.php';

require_once './functions.php';

  $request_method = $_SERVER['REQUEST_METHOD'];

  switch ($request_method) {
    case 'GET':
      if (!empty($_GET['id'])) {
          // Récupérer un seul produit
          $id = intval($_GET['id']);
          getCinema($id);
      } else {
          // Récupérer tous les produits
          getCinemas();
      }

      break;

    case 'POST':
      // Ajouter un produit
      addCinema();

      break;

    case 'PUT':
      // Modifier un produit
      $id = intval($_GET['id']);
      updateCinema($id);

      break;

    case 'DELETE':
      // Supprimer un produit
      $id = intval($_GET['id']);
      deleteCinema($id);

      break;

    default:
      // Requête invalide
      header('HTTP/1.0 405 Method Not Allowed');

      break;
  }
