<?php

// require_once '../dao/Sql.php';

class UsuarioController
{ 

  

    public function __construct(){
        echo("Oi");



        $conn = mysqli_connect('localhost','root','','v1');
        if(mysqli_errno($conn)){
            echo 'Ok';
        }else{
            echo mysqli_errno($conn);
        }
        // $this ->Sql = new Sql();
    }

}