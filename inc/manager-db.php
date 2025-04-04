<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}
function getContinent(){
    global $pdo;
    $query = 'SELECT DISTINCT Continent FROM `Country` ;';
    return $pdo->query($query)->fetchAll();
}
function getCapitale($num) {
    global $pdo;
    $query = 'SELECT Name  FROM `City` where id = :id ;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $num, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetch();
}
function getDetail($num) {
    global $pdo;
    $query = 'SELECT *  FROM `Country` where id = :id ;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $num, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetch();
}
function getlangue($num) {
    global $pdo;
    $query = "SELECT Language.Name FROM Language,CountryLanguage
    where CountryLanguage.idLanguage=Language.id
    and CountryLanguage.idCountry = $num
    and CountryLanguage.IsOfficial=\"T\"";
    //echo $query;
    return $pdo->query($query)->fetch();
}
function getPaysName($name)
{
    global $pdo;
    $query = "SELECT * FROM Country WHERE Name = '$name';";
    return $pdo->query($query)->fetch();
}
function nameLanguage($id) {
    global $pdo;
    $query = 'SELECT Name FROM `Language` WHERE id = :id;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchColumn(); // Retourne directement la valeur
}
function addInfo($idPays, $population, $pnb, $chefEtat, $esperanceDeVie) {
    global $pdo;
    $population = (int) $population;
    $requete = "UPDATE Country SET Population = :population, GNP = :pnb, HeadOfState = :chefEtat, LifeExpectancy = :esperance WHERE id = :id";
    try {
        $prep = $pdo->prepare($requete);
        $prep->bindValue(':population', $population, PDO::PARAM_INT);
        $prep->bindValue(':pnb', $pnb, PDO::PARAM_STR);
        $prep->bindValue(':chefEtat', $chefEtat, PDO::PARAM_STR);
        $prep->bindValue(':esperance', $esperanceDeVie, PDO::PARAM_STR);
        $prep->bindValue(':id', $idPays, PDO::PARAM_INT);
        $prep->execute();
    } catch (Exception $e) {
        die("Erreur dans la requête : " . $e->getMessage());
    }
}
function percentageLanguage($id){
    global $pdo;
    $query = 'SELECT idLanguage, Percentage FROM `CountryLanguage` WHERE idCountry = :id ORDER BY Percentage DESC;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}

function getVilles($id){
    global $pdo;
    $query = 'SELECT Name, Population, District FROM `City` WHERE idCountry = :id;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    return $prep->fetchAll();
}
function getEsperance(){
    global $pdo;
    $query = 'SELECT Name,LifeExpectancy FROM `Country`
                order BY LifeExpectancy DESC;';
    return $pdo->query($query)->fetchAll();}
