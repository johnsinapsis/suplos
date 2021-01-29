<?php

namespace Lib;

/**
 * Clase que permite la conversión del archivo json a un array, se obtienen las ciudades y tipos de vivienda.
 * Obtiene filtros por id.
 */

class JsonToData
{

    private $data;

    /**
     * Obtener el contenido del archivo JSON
     */
	public function __construct($file)
    {
        $this->data = file_get_contents($file);
    }

    /** 
     * convertir los datos del archivo JSON en un array
     * @access public
     * @return Array
     */
    public function getAllData(){
        if($this->data==false)
            return false;
        $real =  json_decode($this->data, true);
        return $real;
    }
    
    /** 
     * obtener los datos de las ciudades sin repetir
     * @access public
     * @return Array
     */
    public function getCities(){
        $allData = $this->getAllData();
        $cities = [];
        foreach($allData as $row){
            if(count($cities)==0)
                array_push($cities,$row['Ciudad']);
            else{
                if(!array_search($row['Ciudad'],$cities))
                    array_push($cities,$row['Ciudad']);
            }
        }
        sort($cities);
        $cities = array_unique($cities);
        return $cities;
    }


    /** 
     * obtener los datos de los tipos de vivienda sin repetir
     * @access public
     * @return Array
     */
    public function getTypes(){
        $allData = $this->getAllData();
        $types = [];
        foreach($allData as $row){
            if(count($types)==0)
                array_push($types,$row['Tipo']);
            else{
                if(!array_search($row['Tipo'],$types))
                    array_push($types,$row['Tipo']);
            }
        }
        sort($types);
        $types = array_unique($types);
        return $types;
    }

    /** 
     * obtener los datos de los filtros por ciudad y Tipo
     * @access public
     * @param Array $filter array de los filtros a buscar
     * @return Array Array filtrado
     */
    public function getFilterData($filter){
        $allData = $this->getAllData();
        $filterData = [];
        if($filter['ciudad']!='')
        {
            $filterData = array_filter($allData,function($value) use($filter){
                
                return $value['Ciudad'] == $filter['ciudad'];
            } );
        }
        else
            $filterData = $allData;
        
            
        if($filter['tipo']!='')
        {
            $filterData = array_filter($filterData,function($value) use($filter){
                
                return $value['Tipo'] == $filter['tipo'];
            });
        }
        return $filterData;
    }

    /** 
     * obtener los datos de los id enviados
     * @access public
     * @param Array $filter array de los id a buscar
     * @return Array
     */

    public function getFilterId($filter){
        $allData = $this->getAllData();
        $filterData = [];
        $k=0;
        for($i=0;$i<count($allData);$i++){
            for($j=0;$j<count($filter);$j++){
                if($allData[$i]['Id'] == $filter[$j]){
                    $filterData[$k] = $allData[$i];
                    $k++;
                    $j= count($filter);
                }
            }
        }
       
        return $filterData;
    }

}