<?php

class appMySQL{
  private $conexion; private $total_consultas;

  public function appMySQL(){ 
    if(!isset($this->conexion)){
      $this->conexion = (mysql_connect('<ip server>','<usuario>','<pass>'))
        or die(mysql_error());
      mysql_select_db("<bd>",$this->conexion) or die(mysql_error());
    }
  }

  public function consulta($consulta){ 
    $this->total_consultas++; 
    $resultado = mysql_query($consulta,$this->conexion);
    if(!$resultado){ 
      echo 'MySQL Error: ' . mysql_error();
      exit;
    }
    return $resultado;
  }

  public function fetch_array($consulta){
   return mysql_fetch_array($consulta);
  }

  public function num_rows($consulta){
   return mysql_num_rows($consulta);
  }

  public function getTotalConsultas(){
   return $this->total_consultas; 
  }
  public function cerconexion (){
        mysql_close ($this->conexion);
   }
}
//---------------------------------------
$db = new appMySQL();//crear objeto clase


  

?>