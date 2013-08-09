<?php
    function registro($usuario, $idDevice, $password, $email, $cel, $imei, $verDroid, $fechas, $horas, $mailsAmigos)
    {
        $respuesta="respuesta";

        include "bd.php";
          
          $i=0;
          $aviso = "";


    if (comprobar_email($email)) 
    {          
    //-> verificar usuario
              $array['email'] =  'ok';
              $queryMysql = "SELECT * FROM usuario  WHERE usuario ='".$usuario."'";
              $consulta = $db->consulta($queryMysql);

    //<- usuario Si / No
              if($db->num_rows($consulta)>0)
              {
    //<- usuario Si 
                  $array['usuario'] =  'usuario ya existe';   
                  $responde = "error";
                  //echo "error";
              }
              else
              {
    //<- usuario No            
                  $array['usuario'] =  'usuario no existe';   
                  $responde = "ok";
                  //echo "ok";
                  $newUserQueryMysql = "INSERT INTO usuario (id, usuario, idDevice, password, email, celular, imei, fecha, hora, extra1, extra2, extra3, extra4)VALUES (null,'$usuario','$idDevice','$password','$email', '$cel', '$imei', '$fechas','$horas','null','null','null','$mailsAmigos')";       
                  $consultaTres   = $db->consulta($newUserQueryMysql);
    //<- regresar usuario id
                  
                  $idUserQueryMysql = "SELECT * FROM usuario  WHERE usuario ='".$usuario."'";
                  $consultaIdUser   = $db->consulta($idUserQueryMysql);
                    if($db->num_rows($consultaIdUser)>0)
                      {
                        while($resultados = $db->fetch_array($consultaIdUser))
                      { 
                        $array['usr-id'] =  $resultados['id'];
                      }
                }

                   if (enviar_mail($usuario, $cel, $password, $mailsAmigos, $email, $verDroid)) 
                   {
                        $array['envio-mail'] =  'se envio un mail con sus datos de registro';             
                   }
                   else
                   {
                        $array['envio-mail'] =  'el envio de su correo de registro no se completo';
                   }
              }

         
    }
    else
    {
      $array['email'] =  'email no valido';
      $responde = "error";
    }
//echo $aviso;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////            
          $object = array('resultado' => $responde,'descripcion'=>$array);
          return $object;
    }


    function comprobar_email($email){ 
        $mail_correcto = 0; 
        //compruebo unas cosas primeras 
        if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
             if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
               //miro si tiene caracter . 
               if (substr_count($email,".")>= 1){ 
                   //obtengo la terminacion del dominio 
                   $term_dom = substr(strrchr ($email, '.'),1); 
                   //compruebo que la terminación del dominio sea correcta 
                   if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                     //compruebo que lo de antes del dominio sea correcto 
                     $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                     $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                     if ($caracter_ult != "@" && $caracter_ult != "."){ 
                         $mail_correcto = 1; 
                     } 
                   } 
               } 
             } 
        } 
        if ($mail_correcto) 
             return 1; 
        else 
             return 0; 
    } 


    function enviar_mail($usuario, $cel, $password, $mailsAmigos, $email, $verDroid){

                    $subject = "su registro de App Hansel ha sido creada con éxito";
                   
                    // Cuerpo del mensaje
                    $mensaje = " \n";
                    $mensaje.= "Bienvenido a Hancel. Su cuenta ha sido creada con éxito. \n";
                    $mensaje.= " \n";
                    $mensaje.= "Su nombre de usuario es:".$usuario."\n";
                    $mensaje.= " \n";
                    $mensaje.= "Usted puede revisar su historial de alertas y los contactos que originalmente seleccionó a través de la plataforma web de Hancel. Puede acceder en la siguiente dirección: www.hancel.org \n";
                    $mensaje.= " \n";
                    $mensaje.= "Para conocer cómo utilizar Hancel, puede consultar el tutorial en www.hancel.org/tutorial \n";
                    $mensaje.= " \n";
                    $mensaje.= "Si usted no se registró en Hancel, por favor ignore este correo. \n";
                    $mensaje.= "Este es un mensaje automático, por favor no responda. \n";
                    $mensaje.= "El uso del sitio web y la aplicación Hancel constituye la aceptación de los términos de uso y de la política de privacidad de Hancel 2013. \n";
                    $mensaje.= "email:".$email.", fecha:".date("d/m/Y")." - ".date("h:i:s a").", Nivel.sisAnd:".$verDroid."\n";
                    $mensaje.= "IP:".$_SERVER['REMOTE_ADDR']."\n\n";
                    $mensaje.= " \n";
                    $mensaje.= "---------------------------------- \n";
                    $mensaje.= "Enviado desde http://www.hanselapp.com/ \n";
                   
                    // headers del email
                    $headers = "From: "."noreply@hanselapp.com"."\r\n";
                    // Enviamos el mensaje
                    if (mail($email, $subject, $mensaje, $headers)) {
                        return 1; 
                    } else {
                        return 0; 
                    }
                 }
?>