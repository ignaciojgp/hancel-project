<?php


include "bd.php";

$idQueryMysql = "SELECT MAX(id) AS id FROM tracking";

$consultaId   = $db->consulta($idQueryMysql);


if($db->num_rows($consultaId)>0)
        {
            while($resultados = $db->fetch_array($consultaId))
          { 
            $idMails =  $resultados['id'];
          }
        }

echo  $idMails;
?>