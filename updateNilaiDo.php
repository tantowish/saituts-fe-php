<?php
if(isset($_POST['submit']))
{    
    $nim = $_GET['nim'];
    $kode_mk = $_GET['kode_mk'];    
    $nilai = $_POST['nilai'];

    // Endpoint URL
    $url = 'http://localhost/sait_uts/server.php?nim='.$nim.'&kode_mk='.$kode_mk;

    // Initialize cURL session
    $ch = curl_init($url);

    // Data to be updated
    $jsonData = array(
        'nilai' =>  $nilai,
    );

    // Encode the array into JSON
    $jsonDataEncoded = json_encode($jsonData);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

    // Execute the cURL request
    $result = curl_exec($ch);
    $result = json_decode($result, true);

    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    // Output the result
    print("<center><br>status :  {$http_status} "); 
    print("<br>");
    print("message :  {$result["message"]} "); 
    echo "<br>Sukses mengupdate data di ubuntu server !";
    echo "<br><a href=index.php> OK </a>";

    header("Location: http://localhost/saituts-fe/");
    exit();
}

?>