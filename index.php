<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>



<body>

<?php
/**
 * Archivo principal de la aplicación. Llama a los archivos necesarios para la ejecución de las tareas
 */
  //error_reporting(E_ALL ^ E_WARNING);
  use Lib\JsonToData;
  use Lib\ConnectionDB;
  include('lib/JsonToData.php');
  include('lib/ConnectionDB.php');
  $file = 'data-1.json';
  $object = new JsonToData($file);
  $data = $object->getAllData();
  $cities = $object->getCities();
  $types = $object->getTypes();
  $defaultCity = '';
  $defaultType = '';

  $conn = new ConnectionDB();
  $conn->connection();
  //print_r($x);

  if(isset($_POST["ciudad"])){
    $defaultCity = $_POST["ciudad"];
    $defaultType = $_POST["tipo"];
    $filter = [ 'ciudad' => $_POST["ciudad"], 'tipo' => $_POST["tipo"]];
    $data = $object->getFilterData($filter);
  }
  else{
    $data = $object->getAllData();
  }

  if($data==false){
    
    ?>
    <!-- Modal Structure -->
    <div id="modal1" class="modal open" tabindex="0" style="z-index: 1003; display: block; opacity: 1; top: 10%; transform: scaleX(1) scaleY(1);">
          <div class="modal-content">
            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fuente de Datos no Encontrada</font></font></h4>
            <p><font style="vertical-align: inherit;">La fuente de datos de los bienes no fue encontrada. Por Favor comuníquese con el equipo de soporte para solucionar el inconveniente lo más pronto posible. </font></p>
          </div>
          <div class="modal-footer">
            <a href="javascript:closeModal()" class="modal-close waves-effect waves-green btn-flat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">De acuerdo</font></font></a>
          </div>
    </div>
    <?php
  }
?>
  <!-- <video src="img/video.mp4" id="vidFondo"></video>  -->


  <div id="modal2" class="modal" tabindex="0" style="z-index: 1003; display: none; opacity: 1; top: 10%; transform: scaleX(1) scaleY(1);">
          <div class="modal-content">
            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fuente de Datos no Encontrada</font></font></h4>
            <p><font style="vertical-align: inherit;">No hay conexión con la base de datos. Por Favor comuníquese con el equipo de soporte para solucionar el inconveniente lo más pronto posible. </font></p>
          </div>
          <div class="modal-footer">
            <a href="javascript:closeModal()" class="modal-close waves-effect waves-green btn-flat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">De acuerdo</font></font></a>
          </div>
    </div>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="index.php" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php 
                foreach($cities as $city)
                { 
                  if($defaultCity==$city)
                    $selected = 'selected';
                  else
                    $selected = '';
              ?>
                <option value="<?php echo $city; ?>" <?php echo $selected ?> ><?php echo $city ?></option>
              <?php 
              } 
              ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <?php
                foreach($types as $type){
                  if($defaultType==$type)
                    $selected = 'selected';
                  else
                    $selected = '';
              ?>
                <option value="<?php echo $type; ?>" <?php echo $selected; ?> ><?php echo $type ?></option>
              <?php 
                }
              ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2" onclick="load()">Mis bienes</a></li>
        <li><a href="#tabs-3">Reportes</a></li>
      </ul>
      <div id="tabs-1">
        <?php
          foreach($data as $row){
        ?>
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card">
            
            <div class="card-real">
              <div>
                <img class="materialboxed" width="200" src="img/home.jpg" alt="imagen inmueble">
              </div>
              <div>
                <div> <b>Dirección:</b> <?php echo $row["Direccion"] ?></div>
                <div> <b>Ciudad:</b> <?php echo $row["Ciudad"] ?></div>
                <div> <b>Teléfono:</b> <?php echo $row["Telefono"] ?></div>
                <div> <b>Codigo Postal:</b> <?php echo $row["Codigo_Postal"] ?></div>
                <div> <b>Tipo:</b> <?php echo $row["Tipo"] ?> </div>
                <div> <b>Precio:</b><?php echo $row["Precio"] ?></div>
                <div>
                  <button class="waves-effect waves-light btn" onclick="store(&#39;<?php echo $row['Id']; ?>&#39;)">
                    Guardar
                  </button>
                </div>
              </div>
              
            </div>
            
            <div class="divider"></div>
          </div>
        </div>
        <?php
              }
            ?>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="misBienes">
          
            
            
          
        </div>
      </div>

      <div id="tabs-3" >
        <div class="colContenido">
          <div class="tituloContenido card">
            <h5>Exportar Reporte:</h5>
            <form action="excel.php" method="post" id="formulario2" target="_blank">
            <div class="reports">
              <div>
                <h5>Filtros</h5>
              </div>
              <div class="select-report">
                <label>Ciudad</label>
                <select class="browser-default" name="city">
                <option value="" selected>Elige una ciudad</option>
              <?php 
                foreach($cities as $city)
                { 
                  if($defaultCity==$city)
                    $selected = 'selected';
                  else
                    $selected = '';
              ?>
                <option value="<?php echo $city; ?>" <?php echo $selected ?> ><?php echo $city ?></option>
              <?php 
              } 
              ?>
                </select>
              </div>

              <div class="select-report">
                <label>Tipo</label>
                <select class="browser-default" name="type">
                <option value="" selected>Elige una tipo de bien</option>
                <?php
                foreach($types as $type){
                  if($defaultType==$type)
                    $selected = 'selected';
                  else
                    $selected = '';
              ?>
                <option value="<?php echo $type; ?>" <?php echo $selected; ?> ><?php echo $type ?></option>
              <?php 
                }
              ?>
                </select>
              </div>

              <div class="center-align" style="padding-bottom: 20px;">
                <button type="submit" class="waves-effect waves-light btn">Generar Excel</button>
              </div>

            </div>
            </form>
          </div>  
        </div>
      </div>

    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">

    
    
      $( document ).ready(function() {
          $( "#tabs" ).tabs();

          
          
      });


      /**
       * Cerrar la modal cuando no se encuentra el archivo json
       */
      function closeModal(){
          $("#modal1").fadeOut(1000);
      }

      /**
       * Se guarda el bien elegido según el id 
       */
      function store(id){
        $.ajax({
          url: 'lib/MyProperties.php',
          type: "POST",
          dataType: "json",
          data:{id},
            success: function(data){
              //console.log(data);
              Materialize.toast(data.msg, 3000, 'rounded')
            }
        });
      }

      /** 
       * Se cargan los bienes guardados en la base de datos al oprimir el botón de mis bienes para evitar recarga total de la página
      */
      function load(){
        $("#misBienes").html("");
        $.ajax({
          url: 'lib/LoadMyProperties.php',
          type: "POST",
          dataType: "json",
          success: function(data){
              console.log(data);
              var html = "";
              for(var i =0; i< data.length; i++){
              var html = `${html} 
              <div class="tituloContenido card" id="my_${data[i]['Id']}">
              <div class="card-real">
              <div>
                <img class="materialboxed" width="200" src="img/home.jpg" alt="imagen inmueble">
              </div>
              <div>
                <div> <b>Dirección:</b> ${data[i]['Direccion']}</div>
                <div> <b>Ciudad:</b>${data[i]['Ciudad']}</div>
                <div> <b>Teléfono:</b> ${data[i]['Telefono']}</div>
                <div> <b>Codigo Postal:</b> ${data[i]['Codigo_Postal']}</div>
                <div> <b>Tipo:</b> ${data[i]['Tipo']}</div>
                <div> <b>Precio:</b>${data[i]['Precio']}</div>
                <div>
                  <button class="waves-effect waves-light btn" onclick="del(${data[i]['Id']})">
                    Eliminar
                  </button>
                </div>
              </div>
              <div class="divider"></div>
              </div>
              </div>`;
             }
            $("#misBienes").append(html);
          }
        });
      }


      /**
       * Eliminar un registro de mis bienes de la base de dato, se renderiza solo el componente
      */
      function del(id){
        $.ajax({
          url: 'lib/DeleteMyProperties.php',
          type: "POST",
          dataType: "json",
          data:{id},
            success: function(data){
              //console.log(data);
              Materialize.toast(data.msg, 3000, 'rounded')
              if(data.status===1){
                $("#my_"+id).remove();
              }
            }
        });
      }
 
    </script>
  </body>
  </html>
