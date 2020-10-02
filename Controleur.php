<?php


class Controleur implements JsonSerializable
{
    private $clientArray;
    private $commandeArray;
    private $constructeurArray;
    private $couleurArray;
    private $modeleArray;
    private $moteurArray;
    private $optionArray;
    private $parkingArray;
    private $usineArray;
    private $voitureArray;

    private function __construct($json){
        if($json!=null){
            $this->fromJson($json);
        }

    }

    private function fromJson($json){

    }

    public function addClientArray($client){
        $this->clientArray[] = $client;
    }

    public function addCommandeArray($commande){
        $this->commandeArray[] = $commande;
    }

    public function addConstructeurArray($constructeur){
        $this->constructeurArray[] = $constructeur;
    }

    public function addCouleurArray($couleur){
        $this->couleurArray[] = $couleur;
    }

    public function addModeleArray($modele){
        $this->modeleArray[] = $modele;
    }

    public function addMoteurArray($moteur){
        $this->moteurArray[] = $moteur;
    }

    public function addOptionArray($option){
        $this->optionArray[] = $option;
    }

    public function addParkingArray($parking){
        $this->parkingArray[] = $parking;
    }

    public function addUsineArray($usine){
        $this->usineArray[] = $usine;
    }

    public function addVoitureArray($voiture){
        $this->voitureArray[] = $voiture;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}