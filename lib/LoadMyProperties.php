<?php

/**
 * Carga los registros de la base de datos de los bienes guardados
 */
namespace Lib;
include("ConnectionDB.php");
include("JsonToData.php");

$conn = new ConnectionDB();
$conn->connection();
$sql = "select * from bienes_seleccionados";
$result = [];
foreach ($conn->query($sql) as $row)
    array_push($result,$row['id']+0);


$file = '../data-1.json';
$object = new JsonToData($file);
$Myproperties = $object->getFilterId($result);

echo json_encode($Myproperties);
