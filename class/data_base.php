<?php
try {
    $conector = new PDO("mysql:dbname=miproyecto;host=127.0.0.1","root","");
    echo "conexion exitosa";
}catch (Exception $ex){
    echo "Fallo la conexion".$ex->getMessage();
}

class base_datos {
    private $gbd;

    function __construct($driver, $base_datos, $host, $user, $pass){
        $conection = $driver . ":dbname=" . $base_datos . ";host=$host";
        $this->gbd =new PDO($conection, $user, $pass);

        if (!$this->gbd){
            throw new Exception("No se ha podido realizar la conexion");
        }
    }

    function select($tabla, $filtros = null, $arr_porepare = null, $orden = null, $limit = null){
        $sql = "SELECT * FROM " . $tabla;
        if ($filtros != null){
            $sql .= " WERE " . $filtros;
        }
        if ($orden != null){
            $sql .= " ORDER BY " . $orden;
        }
        if ($limit != null){
            $sql .= " LIMIT " .$limit;
        }
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_porepare);
        if($resource){
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        }else{
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }

    function delete($tabla, $filtros = null, $arr_prepare = null){
        $sql = "DELETE FROM " . $tabla . " WHERE " .$filtros;

        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource){
            return true;
        }else{
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }

    function insert($tabla,$campos, $valores, $arr_prepare = null){
        $sql = "INSERT INTO " . $tabla . "(" . $campos . ") VALUES ($valores)";
        
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource){
            return $this->gbd->lastInsertId();
        }else{
            echo '<pre>';
            print_r($resource->errorInfo());
            echo '</pre>';
            throw new Exception("No se pudo realizar la consulta de la selección");
        }
    }

    function update($tabla, $campos, $filtros, $arr_prepare = null){
        $sql = " UPDATE " . $tabla . "SET" . $campos . "WHERE" . $filtros;

        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if($resource){
            return true;
        }else{
            echo '<pre>';
            print_r($resource->errorInfo());
            echo '<pre>';
            throw new Exception("No se pudo realizar la consulta de la selección");
        }
    }
   
}
?>