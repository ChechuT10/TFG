<?php

class Food extends Db{

    public function getFood(){
        $sql = "SELECT * FROM alimentos;";
        $query = $this->connect()->query($sql);
        if ($query) {
             while($data=$query->fetchAll()){
                return $data;
            }
        }else{
            return false;
        }
    }

    public function addFood($name, $calorias, $hidratos, $proteinas, $grasas){
        $sql = "INSERT INTO desayuno (`nombre`, `calorias`, `hidratos`, `proteinas`, `grasas`) VALUES (?, ?, ?, ?, ?);";
        $query = $this->connect()->query($sql);
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

    public function addToBreakfast($idUser, $idFood){
        $sql = "INSERT INTO desayuno (idUser,idAlimento) VALUES (?, ?);";
        $query = $this->connect()->prepare($sql);  
        if ($query->execute([$idUser, $idFood])) {
                return true;
        }else{
                return false;
        }
    }
    
    public function getBreakfast($user){
        $sql = "SELECT * FROM desayuno WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$user])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }


    // Añadir y obtener comida

    public function addToLaunch($idUser, $idFood){
        $sql = "INSERT INTO comida (idUser,idAlimento) VALUES (?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$idUser, $idFood])) {
                return true;
        }else{
                return false;
        }
    }
    
    public function getLaunch($user){
        $sql = "SELECT * FROM comida WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$user])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }


    // Añadir y obtener cena

    public function addToDinner($idUser, $idFood){
        $sql = "INSERT INTO cena (idUser,idAlimento) VALUES (?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$idUser, $idFood])) {
                return true;
        }else{
                return false;
        }
    }
    
    public function getDinner($user){
        $sql = "SELECT * FROM cena WHERE idUser = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$user])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }
}
