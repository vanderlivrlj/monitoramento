<?php
require_once 'php/connect.php';
require_once 'html/header.html';

 $sql = "SELECT * FROM ip ";
 $resultado = mysqli_query($mysqli,$sql) or die("Erro ao retornar dados");

 $query = mysqli_query($mysqli, $sql);
 $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $id = $registro['id_ips'];
   $nome = $registro['nome'];
   $url = $registro['url'];

   $curl = curl_init($registro['url']);

   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

   $headers = array(
     "Content-Type: application/json",
   );
   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

   $data = '{"Username":"","Password":""}';

   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

   //for debug only!
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

   $resp = curl_exec($curl);
   curl_close($curl);

   if ($resp){
    //  echo "<div class=\"/alinha-items>";
     $mensagem = " - OK";
     echo "<br><div class=\"items-ok\">";
     echo $nome;
     echo "</tr>";
     echo $mensagem; echo "<br> </div>";
   } else {
     echo "<tr>";
     echo "<br><div class=\"items-of\">";
     echo "<td>".$nome."</td>";
     echo "</tr> ";
     $mensagem = " - ERROR";
     echo $mensagem." </di>";
    //  echo "</div>";
   }
 }
mysqli_close($mysqli);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <style type="text/css">
    .items{
      display: block
      grid-template-columns: 100px 100px 100px;
      justify-content: space-around;
    }
    
    .items-ok{
      width:180px;
      height: 50px;
      display:flex;
      flex-direction:row;
      background-color: green;
      align-items: center;
      flex-wrap: wrap;
      justify-content: center;
    }
    .items-of{
      width:33%;
      height: 50px;
      display:flex;
      flex-direction:row;
      align-items: center;
      flex-wrap: wrap;
      justify-content: center;
      background-color: red;
    }
  </style>
</head>
</html>