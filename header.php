<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?><!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Homepage : GeoWorld</title>

<?php
require_once 'inc/manager-db.php';
$lesContinents = getContinent() ;
$lesPays = getAllCountries();
//var_dump($lesContinents);
?>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }
    .dropdown-menu{
      max-height: 400px;
      overflow-y: auto;
      }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="mapWorld.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index2.php">Home <span class="sr-only">(current)</span></a>
        </li>
       
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Continent</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php foreach($lesContinents as $leContinent) : ?>
              <a class="dropdown-item" href="index2.php?name=<?= $leContinent->Continent ; ?>"><?= $leContinent->Continent; ?> </a>
              <?php endforeach ; ?>
              </div>
              </li>
          
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Pays</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php foreach($lesPays as $pays) : ?>
              <a class="dropdown-item" href="index3.php?id=<?= $pays->id ; ?>"><?= $pays->Name; ?> </a>
              <?php endforeach ; ?>
              </div>
              </li>
              <li class="nav-item">
        <a class="nav-link" href="EsperanceVie.php">Espérance de vie humaine <span class="sr-only">(current)</span></a>
        </li>
        </li>
     
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation-Atelier-de-Prof-SLAM
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
