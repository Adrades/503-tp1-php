<?php

class Client implements JsonSerializable
{
    private $id;
    private $nom;
    private static $nombreClients = 0;

    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->id = Client::$nombreClients;
        ++Client::$nombreClients;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function jsonSerialize()
    {
        return array('nom'=>$this->nom);
    }
}
