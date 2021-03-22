<?php

class Bd{
    private $db = null;

    public function criaBD($host, $user, $password, $database){
        try{
        $this->db = new PDO("mysql:host=$host", $user, $password);
        $result = $this->db->exec("CREATE DATABASE IF NOT EXISTS '$database';
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$password';
                GRANT ALL ON '$database'.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;");
        die($result);
        return true;
        }
        catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }
    }

    public function conectar($host, $user, $password , $database){
        $this->criaBD($host, $user, $password , $database);
        $this->db = new PDO("mysql:host=$host",$database, $user, $password);
    }

    public function gravar($json){
        var_dump($json);
    }

    public function ler(){

    }


}

    $banco = new Bd();
    if($banco->criaBD('localhost', 'root', '', 'turim'))
    {
        echo "lol";
    }




?>