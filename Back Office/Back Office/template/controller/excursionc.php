<?php

include '../config.php';

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
    function deleteexcursion($id) {
        $sql = "DELETE FROM excursion WHERE id = :id";
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
        $sql = "INSERT INTO excursion (id,nom, description, date, duree, niveaudiff) 
                VALUES (:id,:nom, :description, :date, :duree, :niveaudiff)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $excursion->getid(),
                'nom' => $excursion->getNom(),
                'description' => $excursion->getdescription(),
                'date' => $excursion->getdate(),
                'duree' => $excursion->getduree(),
                'niveaudiff' => $excursion->getniveaudiff(),
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    


    function showexcursion($id)
{
    $sql = "SELECT * FROM excursion WHERE id = :id";
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


    // Dans excursionc.php

// Méthode pour mettre à jour les informations d'une excursion
function updateexcursion($id,$nom,$description,$date,$duree,$niveaudiff)
{

    $sql="UPDATE excursion SET nom= '$nom', description='$description', date='$date', duree='$duree' , niveaudiff = '$niveaudiff' WHERE id='$id'";
	$db = config::getConnexion();
	try
	{
		$db->query($sql);
	}
	catch (Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
    
}
}