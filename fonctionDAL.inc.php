<?php
    function connexionBase(){
        $hote='mysql:host=localhost;port=3306;dbname=gedimagination';
        $user='ANTONOVA';
        $pass='Buba123';
        try {
            $connexion= new PDO($hote, $user, $pass);
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

    function DAL_InsertSQLiteDatabase(){
       try{
        $connexion = connexionBase();
        $request = 'INSERT INTO Realisation (id, titre, description, debut, fin) VALUES (:id_realisation, :titre_realisation, :description_realisation, :date_debut_realisation, :date_fin_realisation) ';
        $prep = $connexion->prepare($request);
        $prep->bindValue(':id_realisation','id', PDO::PARAM_STR);
        $prep->bindValue(':titre_realisation', 'titre', PDO::PARAM_STR);
        $prep->bindValue(':description_realisation', 'description', PDO::PARAM_STR);
        $prep->bindValue(':date_debut_realisation', 'debut', PDO::PARAM_STR);
        $prep->bindValue(':date_fin_realisation','fin', PDO::PARAM_STR);
        $ok = $prep->execute();
        return $prep->rowCount();
       } catch(Exception $e) {
        throw new Exception("DAL_insertSQLiteDatabase" .$e->getMessage());  
        //return $e->getMessage();
       }
    }
?>