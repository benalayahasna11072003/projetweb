<?php
class service
{
    private  $id ;
    private $nom ;
    private  $photo;
    private $prix;
    private $date;
   
 

    public function __construct($id=null , $nom, $photo, $prix,$date)
    {
        $this->id= $id;
        $this->nom = $nom;
        $this->photo = $photo;
        $this->prix= $prix;
        $this->date=$date;

    }


    public function getId()
    {
        return $this->id;
    }


    public function getNom()
    {
        return $this->nom;
    }
    public function getphoto()
    {
        return $this->photo;
    }

    public function getprix()
    {
        return $this->prix;
    }
    public function getdate()
    {
        return $this->date;
    }
   
    

    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function setphoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }
}
