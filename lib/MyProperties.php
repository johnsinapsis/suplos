<?php

/**
 * Inserta los registros de los bienes seleccionados
 */

namespace Lib;
include("ConnectionDB.php");

if(isset($_POST["id"])){
    
    $conn = new ConnectionDB();
    $conn->connection();

    $sql = 'select * from bienes_seleccionados where id = '.$_POST['id'];
    
    $result = [];
    foreach ($conn->query($sql) as $row)
        array_push($result,$row['id']);
    if(count($result)> 0)
        echo json_encode(['status' => 0, 'msg' => 'El registro seleccionado ya se encuentra registrado en la base de datos']);
    else{
        $x = $conn->query('Insert into bienes_seleccionados value ('.$_POST['id'].')');
        echo json_encode(['msg' => 'Datos guardados correctamente.', 'status' => 1, 'responseDB' => $x]);
    }

}
else{
    echo json_encode(['msg' => 'Los parámetros enviados son incorrectos.', 'status' => 0]);
} 


