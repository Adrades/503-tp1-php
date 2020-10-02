<?php

require 'Constructeur.php';
require 'Commande.php';
require 'Usine.php';
require 'Moteur.php';
require 'Modele.php';
require 'Couleur.php';
require 'Option.php';
require 'Client.php';
require 'Voiture.php';
require 'Parking.php';

$r3neau = new Constructeur("R3neau");
$u1 = new Usine($r3neau);

$diesel = new Moteur("Diesel Basique", Moteur::$Carburant["Diesel"]);
$blanc = new Couleur("Blanc");
$joliesVitres = new Option("Jolies Vitres");
$optionsVector = array();
$optionsVector[] = $joliesVitres;

$jean = new Client("Jean");
$ajdr = date('jS \of F Y');

$mR21 = new Modele("Modèle R21", $r3neau, $blanc, $diesel, $optionsVector);
$r21 = new Voiture("A2Z83D", $mR21, $ajdr);

$jeanR21 = new Commande($ajdr, $r21, $jean);

$u1->createParking();
$u1->getParking(0)->setPlace("A", 1, $r21);

echo "La voiture de " . $jeanR21->getClient()->getNom() .
    " a pour couleur du " . $jeanR21->getVoiture()->getModele()->getCouleur()->getNom() .
    ", et implémente le " . $jeanR21->getVoiture()->getModele()->getNom() .
    " de chez " . $jeanR21->getVoiture()->getModele()->getConstructeur()->getNom()."\n";

//echo json_encode($u1, JSON_PRETTY_PRINT)."\n\n";
//echo json_encode($jeanR21, JSON_PRETTY_PRINT)."\n\n";

//var_dump(json_decode(json_encode($jeanR21, JSON_PRETTY_PRINT)));

$r22 = Voiture::fromJson(json_decode(json_encode($r21, JSON_PRETTY_PRINT), true));

var_dump($r21);
var_dump($r22);
