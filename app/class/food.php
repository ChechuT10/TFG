<?php

class Food extends Db{

    public function getFood(){
        $sql = "SELECT * FROM alimentos;";
        $query = $this->connect()->query($sql);
        if ($query) {
             // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
            // Si hay algun error se imprime un mensaje
            return false;
        }
    }

    public function getFoodByName($name){
        // Declaramos la sentencia sql
        $sql = "SELECT * FROM alimentos WHERE nombre LIKE '%$name%' OR nombre = ?;";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$name])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function getFoodById($id){
        // Declaramos la sentencia sql
        $sql = "SELECT * FROM alimentos WHERE idalimentos = ?;";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$id])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }

    // Añadir y obtener desayuno

    public function addToBreakfast($idUser, $idFood){
        // Declaramos la sentencia sql
        $sql = "INSERT INTO desayuno (idUser,idAlimento) VALUES (?, ?);";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$idUser, $idFood])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
                return true;
        }else{
                return false;
        }
    }
    
    public function getBreakfast($user){
        // Declaramos la sentencia sql
        $sql = "SELECT * FROM desayuno WHERE idUser = ?;";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$user])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }


    // Añadir y obtener comida

    public function addToLaunch($idUser, $idFood){
        // Declaramos la sentencia sql
        $sql = "INSERT INTO comida (idUser,idAlimento) VALUES (?, ?);";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$idUser, $idFood])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
                return true;
        }else{
                return false;
        }
    }
    
    public function getLaunch($user){
        // Declaramos la sentencia sql
        $sql = "SELECT * FROM comida WHERE idUser = ?;";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$user])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }


    // Añadir y obtener cena

    public function addToDinner($idUser, $idFood){
        // Declaramos la sentencia sql
        $sql = "INSERT INTO cena (idUser,idAlimento) VALUES (?, ?);";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$idUser, $idFood])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
                return true;
        }else{
                return false;
        }
    }
    
    public function getDinner($user){
        // Declaramos la sentencia sql
        $sql = "SELECT * FROM cena WHERE idUser = ?;";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
    
        if ($query->execute([$user])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }
}
