<?php

namespace Lib;

/**
 * Clase para la conexión a la base de datos
 */

class ConnectionDB{
    
    private $data;
    private $hostname;
    public $conn;

    /**
     * obtiene los datos de conexión del archivo credentials.json. Valida desde donde se solicita la conexión
     * 
     */
    public function __construct(){
        $arrayPath= getcwd();
        $arrayPath = explode(DIRECTORY_SEPARATOR,$arrayPath);
        $currentDir = $arrayPath[count($arrayPath)-1];
        if($currentDir==='lib')
         $file = "../credentials.json";
         else
         $file = "credentials.json";
        $this->data = file_get_contents($file);
    }

    /**
     * Conexión a la base de datos con los datos obtenidos desde el constructor
     * 
     */
    public function connection(){
        if($this->data==false)
            return false;    
        $this->data =  json_decode($this->data, true);
    
        $this->hostname = 'mysql:dbname='.$this->data['db'].';host='.$this->data['hostname'];
        try {
            $this->conn = new \PDO($this->hostname, $this->data['user'], $this->data['password']);
            //echo "conexion exitosa";
        }
        catch(\PDOException $err) {
            // Imprime error de conexión
          echo "ERROR: No se pudo conectar a la base de datos: " . $err->getMessage();
        }
    } 

    /**
     * Realiza las consultas, inserciones y eliminaciones a la base de datos
     * @param Array $sql Consulta Sql
     * @return Array Resultado de la consulta
     */
    public function query($sql){
       return $this->conn->query($sql);
    }
}