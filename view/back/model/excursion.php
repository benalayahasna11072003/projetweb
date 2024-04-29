<?php
class excursion
{
    private  $id ;
    private $nom ;
    private  $description;
    private  $date ;
    private $duree ;
    private $niveaudiff;

    public function __construct($id , $nom, $description, $date, $duree,$niveaudiff)
    {
        $this->id= $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->date= $date;
        $this->duree = $duree;
        $this->niveaudiff = $niveaudiff;

    }


    public function getId()
    {
        return $this->id;
    }


    public function getNom()
    {
        return $this->nom;
    }
    public function getdescription()
    {
        return $this->description;
    }

    public function getdate()
    {
        return $this->date;
    }
    public function getduree()
    {
        return $this->duree;
    }
    public function getniveaudiff()
    {
        return $this->niveaudiff;
    }

    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

    


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }


    


    public function setduree($duree)
    {
        $this->duree = $duree;

        return $this;
    }


    


    public function setniveaudiff($niveaudiff)
    {
        $this->niveaudiff = $niveaudiff;

        return $this;
    }
}
