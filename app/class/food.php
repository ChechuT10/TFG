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

}