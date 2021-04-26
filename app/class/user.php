<?php //iniciamos php
// Creamos una clase llamada User que se 'extiende' de db para poder hacer uso de sus funciones
class User extends Db{

    // Creamos una funcion para crear usuarios
    public function createUsers($name, $lastName, $userName, $email, $pswd, $age, $weight, $height){
        // Declaramos la sentencia sql
        $sql = "INSERT INTO user (nombre,apellidos,nombreUser,email,pswdUser,edad,peso, altura) VALUES (?, ?, ?, ?, ?, ?, ?);";//users
       // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
        $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT);
        // $query->bind_param('ssss', $name, $email, $userName, $hashedPswd);
        if ($query->execute([$name, $lastName, $userName, $email, $hashedPswd, $age, $weight, $height])) {
            // Si se ejecuta correctamente se retorna un boolean con valor true
            return true;
        }else{
            // Si se produce algun error se retorna un boolean con valor false
            return false;
        }

    }

    function getUser($userName , $email){
        $sql = "SELECT * FROM user WHERE nombreUser = ? OR email = ?;";
        $query = $this->connect()->prepare($sql);
        // $query->bind_param("ss" , $userName , $email);
        if ($query->execute([$userName , $email])) {
            // Si se ejecuta correctamente se crea y se devuelve un array
            while($data=$query->fetch()){
                return $data;
            }
        }else{
                return false;
        }
    
   }

   public function getUserById($id){
    // Declaramos la sentencia sql
    $sql = "SELECT * FROM user WHERE iduser = ?;";
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
}
// Cerramos php
?>