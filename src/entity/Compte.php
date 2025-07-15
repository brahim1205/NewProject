<?php
namespace App\Core;

class Compte
{
    private int $id;
    private string $solde;
    private string $numero_compte;
    private string $statut_compte;


    public function __construct($id=0,$solde="",$numero_compte="",$statut_compte="")
    {
        $this->id=$id;
        $this->solde=$solde;
        $this->numero_compte=$numero_compte;
        $this->statut_compte=$statut_compte;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @return  self
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get the value of numero_compte
     */ 
    public function getNumero_compte()
    {
        return $this->numero_compte;
    }

    /**
     * Set the value of numero_compte
     *
     * @return  self
     */ 
    public function setNumero_compte($numero_compte)
    {
        $this->numero_compte = $numero_compte;

        return $this;
    }

    /**
     * Get the value of statut_compte
     */ 
    public function getStatut_compte()
    {
        return $this->statut_compte;
    }

    /**
     * Set the value of statut_compte
     *
     * @return  self
     */ 
    public function setStatut_compte($statut_compte)
    {
        $this->statut_compte = $statut_compte;

        return $this;
    }
}