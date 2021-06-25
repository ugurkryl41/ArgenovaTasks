<?php

$baglanti = new mysqli("localhost", "root", "", "test");

if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

echo "MySQL bağlantısı başarıyla gerçekleştirildi.";

?>