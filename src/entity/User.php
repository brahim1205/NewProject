<?php

namespace App\Core;

class User extends TypeUser
{ 
    private string $nom;
    private string $prenom;
    private int $id;
    private string $tel;
    private string $photo_recto;
    private string $photo_verso;
    private string $adresse;
    private string $numero_cni;


    public function __construct($nom="",$prenom="",$id=0,$tel=0,$photo_recto="",$photo_verso="",$adresse="",$numero_cni)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->id=$id;
        $this->tel=$tel;
        $this->photo_recto=$photo_recto;
        $this->photo_verso=$photo_verso;
        $this->adresse=$adresse;
        $this->numero_cni=$numero_cni;  
    }

    


    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
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
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of photo_recto
     */ 
    public function getPhoto_recto()
    {
        return $this->photo_recto;
    }

    /**
     * Set the value of photo_recto
     *
     * @return  self
     */ 
    public function setPhoto_recto($photo_recto)
    {
        $this->photo_recto = $photo_recto;

        return $this;
    }

    /**
     * Get the value of photo_verso
     */ 
    public function getPhoto_verso()
    {
        return $this->photo_verso;
    }

    /**
     * Set the value of photo_verso
     *
     * @return  self
     */ 
    public function setPhoto_verso($photo_verso)
    {
        $this->photo_verso = $photo_verso;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of numero_cni
     */ 
    public function getNumero_cni()
    {
        return $this->numero_cni;
    }

    /**
     * Set the value of numero_cni
     *
     * @return  self
     */ 
    public function setNumero_cni($numero_cni)
    {
        $this->numero_cni = $numero_cni;

        return $this;
    }
}