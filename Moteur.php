<?php

class Moteur implements JsonSerializable
{
    public static $Carburant = array("Essence" => "Essence", "Diesel" => "Diesel", "GPL" => "GPL", "Hybride" => "Hybride");

    private $id;
    private $nom;
    private $carburant;
    public static $nombreMoteur = 0;

    public function __construct($nom, $carburant)
    {
        $this->nom = $nom;
        $this->carburant = $carburant;
        $this->id = Moteur::$nombreMoteur;
        ++Moteur::$nombreMoteur;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getCarburant()
    {
        return $this->carburant;
    }

    public function setCarburant($carburant)
    {
        $this->carburant = $carburant;
    }

    public function jsonSerialize()
    {
        return array('nom'=>$this->nom, 'carburant'=>$this->carburant);
    }

    public static function fromJson($json){
        return new Moteur($json['nom'], $json['carburant']);
    }
}
