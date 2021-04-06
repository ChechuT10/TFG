<?php

class Food extends Db{

    public function getFood(){
        $sql = "SELECT * FROM food;";
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


}