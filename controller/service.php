<?php

require_once("../../config.php");
require_once("../../model/service.php");

class servicec
{

    public function listservice()
    {
        $sql = "SELECT * FROM service";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listservicris()
    {
        $sql = "SELECT * FROM service ORDer by prix ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    public function recherchess($t)
    {
        $sql = "SELECT * FROM service WHERE nom = :nom";
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

    function deleteservice($id) {
        $sql = "DELETE FROM service WHERE ids = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
    
        try {
            $req->execute();
            if ($req->rowCount() == 0) {
                echo "Aucune service trouvée avec cet ID.";
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    

    function addservice($service)
    {
        $sql = "INSERT INTO service (ids, nom, photo, prix, date)
                VALUES (null, :nom, :photo, :prix, :dat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $service->getNom(),
                'photo' => $service->getphoto(),
                'prix' => $service->getprix(), // Corrected method name
                'dat' => $service->getdate()
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    


    public function showservice($id) {
        $sql = "SELECT * FROM service WHERE ids = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // Proper error handling
            throw new Exception("Error fetching categories: " . $e->getMessage());
        }
    }


function updateservice($service, $id)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE service SET 
                nom = :nom, 
                prix = :prix, 
                date = :date, 
                photo = :photo
            WHERE ids= :ids'
        );
        
        $query->execute([
            'ids' => $id,
            'nom' => $service->getNom(),
            'prix' => $service->getprix(),
            'date' => $service->getdate(),
            'photo' => $service->getphoto()
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
public function min() {
    $sql = "SELECT COUNT(*) AS quantity FROM service WHERE prix < 500";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result['quantity'];
    } catch (Exception $e) {
        // Proper error handling
        throw new Exception("Error fetching quantity: " . $e->getMessage());
    }
}
public function max() {
    $sql = "SELECT COUNT(*) AS quantity FROM service WHERE prix > 1000";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result['quantity'];
    } catch (Exception $e) {
        // Proper error handling
        throw new Exception("Error fetching quantity: " . $e->getMessage());
    }
}
public function med() {
    $sql = "SELECT COUNT(*) AS quantity FROM service WHERE prix > 500 and prix <1000";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result['quantity'];
    } catch (Exception $e) {
        // Proper error handling
        throw new Exception("Error fetching quantity: " . $e->getMessage());
    }
}




}



    // Dans servicec.php

// Méthode pour mettre à jour les informations d'une service
