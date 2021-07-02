<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "test";


try{
    $db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_password);
    // türkçe karakter için utf8
    $db->exec("SET CHARSET UTF8");
    //eğer hata olursa pdo nun exception komutu ile ekrana yazdırıyoruz
}catch(PDOException $e){
    die ("Hata var");
}

?>