<?php

class Exercise extends Db{

    public function getExerciseCount(){
        $sql = "SELECT * FROM ejercicio;";
        $query = $this->connect()->query($sql);
        if ($query) {
             while($data=$query->fetchAll()){
                return count($data);
            }
        }else{
            return false;
        }
    }

    public function addExercise($name, $calorias, $hidratos, $proteinas, $grasas){
        $sql = "INSERT INTO ejercicio (idalimentos, nombre, calorias, hidratos, proteinas, grasas) VALUES (NULL, ?, ?, ?, ?, ?);";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$name, $calorias, $hidratos, $proteinas, $grasas])) {
            return true;
        }else{
            return false;
        }
    }


    public function getExerciseByName($name){
        $sql = "SELECT * FROM ejercicio WHERE nombre LIKE '%$name%' OR nombre = ?;";
        $query = $this->connect()->prepare($sql);    
        if ($query->execute([$name])) {
            while($data=$query->fetchAll()){
                return $data;
            }
        }else{
                return false;
        }
    }

    public function getExerciseById($id){
        $sql = "SELECT * FROM ejercicio WHERE idalimentos = ?;";
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$id])) {
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    }
}
