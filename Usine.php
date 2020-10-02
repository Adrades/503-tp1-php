<?php

class Usine implements JsonSerializable
{
    private $id;
    private $constructeur;
    public static $nombreUsine = 0;
    public $parkings;

    public function __construct($constructeur)
    {
        $this->constructeur = $constructeur;
        $this->id = Usine::$nombreUsine;
        $this->parkings = array();
        ++Usine::$nombreUsine;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setConstructeur($constructeur)
    {
        $this->constructeur = $constructeur;
    }

    public function getConstructeur()
    {
        return $this->constructeur;
    }

    public function createParking()
    {
        $this->parkings[count($this->parkings)] = new Parking($this, count($this->parkings));
    }

    public function getParkings()
    {
        return $this->parkings;
    }

    public function getParking($numero)
    {
        return $this->parkings[$numero];
    }

    /**
     * @param array $parkings
     */
    public function setParkings(array $parkings): void
    {
        $this->parkings = $parkings;
    }

    public function jsonSerialize()
    {
        return [
            'constructeur' => $this->constructeur,
            'parkings' => $this->parkings,
        ];
    }

    public static function fromJson($json)
    {
        $ps = [];
        $u = new Usine(Constructeur::fromJson($json['constructeurs']));
        foreach ($json['parkings'] as $park) {
            foreach ($park['places'] as $rang) {
                foreach ($rang as $place) {
                    if (!null) {
                        Voiture::fromJson($place);
                    }
                }
            }
            $ps[$park['numero']] = Parking::fromData($u, $park['numero'], $park['places']);
        }
        $u->setParkings($ps);
        return $u;
    }
}