<?php //iniciamos php
// Creamos una clase llamada User que se 'extiende' de db para poder hacer uso de sus funciones
class User extends Db{

    // Creamos una funcion para crear usuarios
    public function createUsers($name, $lastName, $userName, $email, $pswd){
        // Declaramos la sentencia sql
        $sql = "INSERT INTO users (nombre,apellidos,nombreUser,email,userPswd) VALUES (?, ?, ?, ?, ?);";//users
       // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
        $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT);
        // $query->bind_param('ssss', $name, $email, $userName, $hashedPswd);
        if ($query->execute([$name, $lastName, $userName, $email, $hashedPswd])) {
            // Si se ejecuta correctamente se retorna un boolean con valor true
            return true;
        }else{
            // Si se produce algun error se retorna un boolean con valor false
            return false;
        }

    }

    public function createUsersAux($age, $height, $weight, $idealw, $auxId){
        $sql = "INSERT INTO userAux (edad,altura,peso,pesoIdeal,idUser) VALUES (?, ?, ?, ?, ?);";
        // Ejecutamos la sentencia sql
         $query = $this->connect()->prepare($sql);
         // $query->bind_param('ssss', $name, $email, $userName, $hashedPswd);
         if ($query->execute([$age, $height, $weight, $idealw, $auxId])) {
             // Si se ejecuta correctamente se retorna un boolean con valor true
             return true;
         }else{
             // Si se produce algun error se retorna un boolean con valor false
             return false;
         }
 
    }

    // Creamos una funcion para completar tareas
    public function finishAuxForm($auxId){
        // Declaramos la sentencia sql
        $sql = "UPDATE users SET auxForm = 'S' WHERE idUser = ?;";
        // Ejecutamos la sentencia sql
        $query = $this->connect()->prepare($sql);
        if ($query->execute([$auxId])) {
             // Si se ejecuta correctamente se retorna un boolean con valor true
            return true;
        }else{
            // Si se produce algun error se retorna un boolean con valor false
            return false;
        }
    }   

    function getUser($userName , $email){
        $sql = "SELECT * FROM users WHERE nombreUser = ? OR email = ?;";
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
    $sql = "SELECT * FROM users WHERE idUser = ?;";
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