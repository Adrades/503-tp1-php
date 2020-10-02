<?php

class Constructeur implements JsonSerializable
{
    private $id;
    private $nom;
    public static $nombreConstructeurs = 0;

    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->id = Constructeur::$nombreConstructeurs;
        ++Constructeur::$nombreConstructeurs;
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
        return [
            'nom' => $this->nom
        ];
    }

    public static function fromJson($json)
    {
        return new Constructeur($json['nom']);
    }
}
