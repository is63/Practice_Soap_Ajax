<?php

class Coche
{

    private $conn;
    private $authenticated;

    function __construct()
    {
        $this->conn = $this->connect();
        $this->authenticated = false;
    }

    function connect()
    {
        try {
            $user = "root";
            //$user = "if0_37391483";
            $pass = "root";
            //$pass = "rQ0fMHEb5O";
            $dbname = "coches";
            //$dbname = "if0_37391483_coches";
            $host = "127.0.0.1";
            //$host = "sql206.infinityfree.com";

            $con = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            print "<p>Error: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public function authenticate($params)
    {
        if ($params->username == 'ies' && $params->password == 'daw') {
            $this->authenticated = true;
            return true;
        } else {
            throw new SoapFault('Wrong user/pass combination', 401);
        }
    }

    public function getVideos()
    {
        if (!$this->authenticated) {
            throw new SoapFault('Client', 'User is not authenticated');
        }

        if (!$this->conn) {
            throw new SoapFault('Server', "Database connection failed");
        }

        $sql = "SELECT marca, url FROM marcas";
        $result = $this->conn->query($sql);
        $arrayUrl = $result->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($arrayUrl);
    }

    public function getModels($marca){
        if(!$this->authenticated){
            throw new SoapFault('Client', 'User is not authenticated');
        }
        if(!$this->conn){
            throw new SoapFault('Server', "Database connection failed");
        }



        $sql = "SELECT modelo FROM modelos WHERE marca = (SELECT id FROM marcas WHERE marca = ?)";
        $result = $this->conn->prepare($sql);
        $result->bindParam(1,$marca);
        $result->execute();
        $arrayModels = $result->fetchAll(PDO::FETCH_ASSOC);

        if(empty($arrayModels)){
            throw new SoapFault('Model not found', 404);
        }

        return json_encode($arrayModels);
    }

}

