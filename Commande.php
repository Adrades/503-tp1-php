<?php

class Commande implements JsonSerializable
{
    private $id;
    private $date;
    private $voiture;
    private $client;
    public static $nombreCommandes = 0;

    public function __construct($date, $voiture, $client)
    {
        $this->date = $date;
        $this->voiture = $voiture;
        $this->client = $client;
        $id = Commande::$nombreCommandes;
        ++Commande::$nombreCommandes;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getVoiture()
    {
        return $this->voiture;
    }

    public function setVoiture($voiture)
    {
        $this->voiture = $voiture;
    }

    public function jsonSerialize()
    {
        return [
            'date' => $this->date,
            'voiture' => $this->voiture,
            'client' => $this->client
        ];
    }
}

