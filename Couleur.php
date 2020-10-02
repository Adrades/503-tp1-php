<?php


class Couleur implements JsonSerializable
{
    private $id;
    private $nom;
    public static $nombreCouleurs = 0;

    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->id = Couleur::$nombreCouleurs;
        ++Couleur::$nombreCouleurs;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function jsonSerialize()
    {
        return array('nom'=>$this->nom);
    }

    public static function fromJson($json)
    {
        return new Couleur($json['nom']);
    }
}