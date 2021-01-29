<?php
/**
 * Genera el archivo de exportación a excel según los filtros de ciudad y tipo
 */
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=bienes.xls');


use Lib\JsonToData;

include('lib/JsonToData.php');

$file = 'data-1.json';
$object = new JsonToData($file);

if(isset($_POST["city"])){
    $filterdata = [ 'ciudad' => $_POST["city"], 'tipo' => $_POST["type"]];
    $data = $object->getFilterData($filterdata);
    //print_r($data);
?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <caption>TABLA DE BIENES</caption>
    <tr style="background-color: blue; color:white">
        <th>ID</th>
        <th>DIRECCION</th>
        <th>Ciudad</th>
        <th>TELEFONO</th>
        <th>CODIGO POSTAL</th>
        <th>TIPO</th>
        <th>PRECIO</th>
    </tr>
    <?php
          foreach($data as $row){
        ?>
    <tr>
        <td><?php echo $row['Id']; ?></td>
        <td><?php echo $row['Direccion']; ?></td>
        <td><?php echo $row['Ciudad']; ?></td>
        <td><?php echo $row['Telefono']; ?></td>
        <td><?php echo $row['Codigo_Postal']; ?></td>
        <td><?php echo $row['Tipo']; ?></td>
        <td><?php echo str_replace(',','',$row['Precio']); ?></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
else{
    echo "Datos no consistentes";
}


