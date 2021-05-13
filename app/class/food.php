<?php

class Food extends Db{

    public function getFoodCount(){
        $sql = "SELECT * FROM alimentos;";
        $query = $this->connect()->query($sql);
        if ($query) {
             while($data=$query->fetchAll()){
                return count($data);
            }
        }else{
            return false;
        }
    }

    public function addFood($name, $calorias, $hidratos, $proteinas, $grasas){
        $sql = "INSERT INTO alimentos (idalimentos, nombre, calorias, hidratos, proteinas, grasas) VALUES (NULL, ?, ?, ?, ?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$name, $calorias, $hidratos, $proteinas, $grasas])) {
            return true;
        }else{
            return false;
        }
    }

    public function getFoodByName($name){
        $sql = "SELECT * FROM alimentos WHERE nombre LIKE '%$name%' OR nombre = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$name])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function checkFoodByName($name){
        $sql = "SELECT * FROM alimentos WHERE nombre = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$name])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function getFoodById($id){
        $sql = "SELECT * FROM alimentos WHERE idalimentos = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$id])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    // Añadir y obtener desayuno

    public function addToBreakfast($idUser, $idFood, $date){
        $sql = "INSERT INTO desayuno (idUser,idAlimento, fecha) VALUES (?, ?, ?);";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$idUser, $idFood, $date])) {
                return true;
        }else{
                return false;
        }
    }

    public function removeFromBreakfast($idUser, $idFood, $date){
        $sql = "DELETE FROM desayuno WHERE idUser = ? AND idAlimento = ? AND  fecha = ?;";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$idUser, $idFood, $date])) {
                return true;
        }else{
                return false;
        }
    }
    
    public function getBreakfast($user, $date){
        $sql = "SELECT * FROM desayuno WHERE idUser = ? AND fecha = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$user, $date])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }


    // Añadir y obtener comida

    public function addToLaunch($idUser, $idFood, $date){
        $sql = "INSERT INTO comida (idUser,idAlimento, fecha) VALUES (?, ?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$idUser, $idFood, $date])) {
                return true;
        }else{
                return false;
        }
    }
    
    public function removeFromLaunch($idUser, $idFood, $date){
        $sql = "DELETE FROM comida WHERE idUser = ? AND idAlimento = ? AND  fecha = ?;";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$idUser, $idFood, $date])) {
                return true;
        }else{
                return false;
        }
    }

    public function getLaunch($user, $date){
        $sql = "SELECT * FROM comida WHERE idUser = ? AND fecha = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$user, $date])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }


    // Añadir y obtener cena

    public function addToDinner($idUser, $idFood, $date){
        $sql = "INSERT INTO cena (idUser,idAlimento, fecha) VALUES (?, ?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$idUser, $idFood, $date])) {
                return true;
        }else{
                return false;
        }
    }
    
    public function removeFromDinner($idUser, $idFood, $date){
        $sql = "DELETE FROM cena WHERE idUser = ? AND idAlimento = ? AND  fecha = ?;";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$idUser, $idFood, $date])) {
                return true;
        }else{
                return false;
        }
    }

    public function getDinner($user, $date){
        $sql = "SELECT * FROM cena WHERE idUser = ? AND fecha = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$user, $date])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }
}
