<?php

class Modele implements JsonSerializable
{
    private $id;
    private $nom;
    private $constructeur;
    private $couleur;
    private $moteur;
    private $options;
    public static $nombreModele = 0;

    public function __construct($nom, $constructeur, $couleur, $moteur, $options)
    {
        $this->id = Modele::$nombreModele;
        ++Modele::$nombreModele;
        $this->nom = $nom;
        $this->constructeur = $constructeur;
        $this->couleur = $couleur;
        $this->moteur = $moteur;
        $this->options = $options;

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

    public function getConstructeur()
    {
        return $this->constructeur;
    }

    public function setConstructeur($constructeur)
    {
        $this->constructeur = $constructeur;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function getMoteur()
    {
        return $this->moteur;
    }

    public function setMoteur($moteur)
    {
        $this->moteur = $moteur;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @param $option
     * une varible de type Option est rajoutée aux options du modèle si celles-ci
     * ne la contienne pas déjà.
     */
    public function addOptions($option)
    {
        if (!in_array($option, $this->options)) {
            $this->options[] = $option;
        }
    }

    public function jsonSerialize()
    {
        return [
            'nom' => $this->nom,
            'constructeur' => $this->constructeur,
            'couleur' => $this->couleur,
            'moteur' => $this->moteur,
            'options' => $this->options
        ];
    }

    public static function fromJson($json){
        $options = [];
        foreach ($json['options'] as $o){
            $options[] = Option::fromJson($o);
        }

        return new Modele($json["nom"],
            Constructeur::fromJson($json['constructeur']),
            Couleur::fromJson($json['couleur']),
            Moteur::fromJson($json['moteur']),
            $options
        );
    }
}