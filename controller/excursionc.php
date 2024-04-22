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
function updateexcursion($excursion)
{
    // Ensure $excursion is a valid object and not empty
    if (!$excursion instanceof excursion || empty($excursion->id)) {
        return false;
    }

    // Prepare SQL query to update excursion information
    $query = "UPDATE excursion SET 
                nom = :nom, 
                description = :description, 
                date = :date, 
                duree = :duree, 
                niveaudiff = :niveaudiff 
              WHERE id = :id";

    // Prepare values to be passed to the query
    $values = array(
        ':id' => $excursion->id,
        ':nom' => $excursion->nom,
        ':description' => $excursion->description,
        ':date' => $excursion->date,
        ':duree' => $excursion->duree,
        ':niveaudiff' => $excursion->niveaudiff
    );

    try {
        // Execute prepared query with provided values
        $stmt = $this->db->prepare($query);
        $stmt->execute($values);

        // Return true if update is successful
        return true;
    } catch (PDOException $e) {
        // In case of error, display the error message and return false
        echo "Erreur lors de la mise à jour de l'excursion : " . $e->getMessage();
        return false;
    }
}