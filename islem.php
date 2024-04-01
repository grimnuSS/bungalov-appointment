<?php
include ('admin/connect.php');

if (isset($_POST['iletisim'])){
    $mesaj = $_POST['message'];
    $ad_soyad = $_POST['name'];
    $eposta = $_POST['email'];
    $konu = $_POST['subject'];

    // Veritabanına ekleme işlemi
    $query = "INSERT INTO supports (message, name, eposta, konu) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    if ($stmt->execute([$mesaj, $ad_soyad, $eposta, $konu])) {
        header("location: index.php");
        exit();
    } else {
        echo "Destek eklenirken bir hata oluştu.";
    }

    // Statement'i kapatın
    $stmt = null;
    // Bağlantıyı kapatın
    $db = null;
}

if (isset($_POST['reservation'])) {
    // Formdan gelen verileri al
    $bungalovName = $_POST['bungName'];
    $name = $_POST['name'];
    $phone= $_POST['phone'];
    $baslangic = $_POST['date_baslangic'];
    $bitis = $_POST['date_bitis'];

    // Veritabanına ekleme işlemi
    $query = "INSERT INTO reservation (bungalov_name, name, phone, baslangic, bitis) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    if ($stmt->execute([$bungalovName, $name, $phone, $baslangic, $bitis])) {
        // Başarılı bir şekilde eklendiğinde yapılacak işlemler
        // Örneğin, kullanıcıyı teşekkür sayfasına yönlendirebilirsiniz
        header("location: index.php");
        exit();
    } else {
        // Hata durumunda kullanıcıya bir hata mesajı gösterebilirsiniz
        echo "Rezervasyon eklenirken bir hata oluştu.";
    }

    // Statement'i kapatın
    $stmt = null;
    // Bağlantıyı kapatın
    $db = null;
}
?>