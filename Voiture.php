<?php

class Voiture implements JsonSerializable
{
    private $id;
    private $modele;
    private $date;

    public function __construct($id, $modele, $date)
    {
        $this->id = $id;
        $this->modele = $modele;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'modele' => $this->modele,
            'date' => $this->date
         ];
    }

    public static function fromJson($json){
        return new Voiture($json['id'], Modele::fromJson($json['modele']), $json['date']);
    }
}
