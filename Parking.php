<?php

class Parking implements JsonSerializable
{
    private $id;
    private $numero;
    private $usine;
    private $places;

    /**
     * @var int
     * Variable de classe pour l'identifiants des parkings
     */
    public static $nombreParking = 0;

    /**
     * Parking constructor.
     * @param $usine Usine du parking
     * @param $numero int
     */
    public function __construct(Usine $usine, int $numero)
    {
        $this->usine = $usine;
        $this->numero = $numero;
        $this->id = Parking::$nombreParking;
        $this->places = array();
        ++Parking::$nombreParking;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param $numero int
     */
    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    /**
     * @param $usine Usine
     */
    public function setUsine(Usine $usine)
    {
        $this->usine = $usine;
    }

    /**
     * @return Usine
     */
    public function getUsine()
    {
        return $this->usine;
    }

    /**
     * Permet d'affecter une voiture à une place
     * @param $rang string
     * @param $place int
     * @param $voiture Voiture
     */
    public function setPlace(string $rang, int $place, Voiture $voiture)
    {
        if (!in_array($rang, $this->places)) {
            $this->places[$rang] = array();
        }
        $this->places[$rang][$place] = $voiture;

    }

    /**
     * Permet de voir le contenu d'une place
     * @param $rang string
     * @param $place int
     * @return Voiture
     */
    public function getPlace(string $rang, int $place)
    {
        return $this->places[$rang][$place];
    }

    /**
     * @return array
     */
    public function getPlaces(): array
    {
        return $this->places;
    }

    /**
     * @param array $places
     */
    public function setPlaces(array $places): void
    {
        $this->places = $places;
    }

    public function jsonSerialize()
    {
        return [
            'numero' => $this->numero,
            'places' => $this->places
        ];
    }

    public static function fromData($usine, $numero, $places)
    {
        $p = new Parking($usine, $numero);
        $p->setPlaces($places);
        return $p;
    }
}
