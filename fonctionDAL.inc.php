<?php
    include '../db.inc.gestion.php';
    function connexionBase(){
        try {
            $connexion = new PDO('mysql:dbname='.BDD.';host='.HOST.';port='.PORT,LOGIN,PASSW);
            $connexion->exec("set name utf8");
            return $connexion;
        }catch(PDOException $e){
            throw new Exception('Connexion impossible !');
        }
    }

    function DAL_getRealisation(){
        try{
            $connexion = connexionBase();
            $request = 'SELECT id_realisation, titre_realisation, description_realisation, date_debut_realisation, date_fin_realisation From Realisation ';
            $lignes = $connexion->query($request)->fetchAll(PDO::FETCH_ASSOC);
            return $lignes;
        } catch(Exception $e) {
            throw new Exception("DAL_getALLRealisation" .$e->getMessage());  
        }
    }

    function DAL_UpdateRealisation($id_realisation, $nbGaime){
       try{
        //echo $id_realisation;
        //echo $nbGaime;
        $connexion = connexionBase();
        $request = 'UPDATE Realisation SET nbGaime = :nbGaime WHERE id_realisation = :id';
        $prep = $connexion->prepare($request);
        $prep->bindValue(':id',$id_realisation, PDO::PARAM_INT);
        $prep->bindValue(':nbGaime', $nbGaime, PDO::PARAM_INT);
        
        $ok = $prep->execute();
        echo $ok;
        return $prep->rowCount();
       } catch(PDOException $e) {
        throw new Exception("DAL_UpdateRealisation" .$e->getMessage());  
        //return $e->getMessage();
       }
    }
?>