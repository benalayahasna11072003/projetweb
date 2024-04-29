<?php
class excursion
{
    private $id;
    private $nom;
    private $email;
    private $dated;
    private $date_f;
    private $ids;
    
    public function __construct($id = null, $nom, $email, $dated, $date_f, $ids)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->dated = $dated;
        $this->date_f = $date_f;
        $this->ids = $ids;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDated()
    {
        return $this->dated;
    }

    public function getDate_f()
    {
        return $this->date_f;
    }

    public function getIds()
    {
        return $this->ids;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setDated($dated)
    {
        $this->dated = $dated;
    }

    public function setDate_f($date_f)
    {
        $this->date_f = $date_f;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
    }
}

