<?php

$nim = $_GET['nim'];
$kode_mk = $_GET['kode_mk'];

//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://localhost/sait_uts/server.php?nim='.$nim.'&kode_mk='.$kode_mk;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// pastikan method nya adalah delete
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);


//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$http_status} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 //
echo "<br>Sukses menghapus data di server !";
echo "<br><a href=index.php> OK </a>";

header("Location: http://localhost/saituts-fe/");
exit();
?>