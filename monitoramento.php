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
     $mensagem = " - OK";
     echo "<br>";
     echo "<td>".$nome."</td>";
     echo "</tr>";
     echo $mensagem; echo "<br>";
   } else {
     echo "<tr>";
     echo "<br>";
     echo "<td>".$nome."</td>";
     echo "</tr>";
     $mensagem = " - ERROR";
     echo $mensagem;
   }
 }
mysqli_close($mysqli);

?>