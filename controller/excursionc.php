<?php

require_once("../../config.php");
require_once("../../model/excursion.php");

class excursionc
{

    public function listexcursion()
    {
        $sql = "SELECT * FROM excursion";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listexcurcroi()
    {
        $sql = "SELECT * FROM excursion ORDer by date ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function rechercheex($t)
    {
        $sql = "SELECT * FROM excursion WHERE nom = :nom";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $t, PDO::PARAM_STR); // Bind as string
            $req->execute();
            $liste = $req->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    function deleteexcursion($id) {
        $sql = "DELETE FROM excursion WHERE ide = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
    
        try {
            $req->execute();
            if ($req->rowCount() == 0) {
                echo "Aucune excursion trouvée avec cet ID.";
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    

    function addexcursion($excursion)
    {
        $sql = "INSERT INTO excursion 
                VALUES (null, :nom, :email, :datedd, :datedf, :ids)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $excursion->getNom(),
                'email' => $excursion->getEmail(),
                'datedd' => $excursion->getDated(),
                'datedf' => $excursion->getDate_f(),
                'ids' => $excursion->getIds()
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    



    function showexcursion($id)
{
    $sql = "SELECT * FROM excursion WHERE ide = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $excursion = $query->fetch();
        return $excursion;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
function updatedexcursion($excursion, $id)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE excursion SET 
                nom = :nom, 
                mail = :email, 
                date = :dated, 
                date_f = :date_f
            WHERE ide = :ide'
        );
        
        $query->execute([
            'ide' => $id,
            'nom' => $excursion->getNom(),
            'email' => $excursion->getEmail(),
            'dated' => $excursion->getDated(),
            'date_f' => $excursion->getDate_f()
        ]);
        
        echo $query->rowCount() . " records updated successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


    // Dans excursionc.php

// Méthode pour mettre à jour les informations d'une excursion

}