<?php
include ('connect.php');

ob_start();
session_start();

if (isset($_POST['oturum_ac'])) {
    $kullanici_sor=$db->prepare("SELECT * FROM users WHERE mail=:mail AND sifre=:sifre");
    $kullanici_sor->execute(array(
        'mail' => $_POST['kul_eposta'],
        'sifre' => $_POST['kul_sifre']
    ));
    $sonuc = $kullanici_sor->rowCount();

    if ($sonuc == 0){
        $_SESSION['mvs_yanlis'] = "E-Posta ya da Şifreniz yanlış";
        header("location: login.php");
        exit;
    }else{
        $_SESSION['kul_eposta'] = $_POST['kul_eposta'];
        header("location:index.php");
    }
}

if(isset($_POST['cikis_yap'])){
    if(isset($_SESSION['kul_eposta'])){
        session_destroy();
        unset($_SESSION['kul_eposta']);
        $_SESSION['cikis_yapildi'] = "Oturum Kapatıldı. Yeniden Giriş Yapmanız Gerek.";
        header("location: login.php");
    }
}


if (isset($_POST['yazi_ekle'])) {
    // Formdan gelen verileri alın
    $yazi_baslik = $_POST['yazi_baslik'];
    $yazi = $_POST['yazi'];
    $kullanici_ad = $_SESSION['kul_eposta'];

    // Resim yüklemesi için gerekli işlemleri yapın
    if (isset($_FILES['yazi_resim']) && $_FILES['yazi_resim']['error'] == UPLOAD_ERR_OK) {
        $resim_adi = $_FILES['yazi_resim']['name'];
        $resim_tmp = $_FILES['yazi_resim']['tmp_name'];
        $resim_yolu = "blog/" . $resim_adi; // Resimlerin yükleneceği klasörü belirtin

        // Resmi belirtilen klasöre kaydedin
        move_uploaded_file($resim_tmp, $resim_yolu);
    } else {
        // Eğer resim yüklenmemişse veya bir hata olmuşsa, uygun bir hata mesajı verin.
        if ($_FILES['yazi_resim']['error'] != UPLOAD_ERR_OK) {
            echo "Resim yüklenirken bir hata oluştu. Hata Kodu: " . $_FILES['yazi_resim']['error'];
            exit();
        }
        exit();
    }

    // Veritabanına bilgileri kaydedin
    $query = "INSERT INTO blog (baslik, resim, yazi, author) VALUES (?, ?, ?, ?)";

    $resim_son = "http://localhost/bungalov/" . $resim_yolu;
    $stmt = $db->prepare($query);
    $stmt->execute([$yazi_baslik, $resim_yolu, $yazi, $kullanici_ad]);

    if ($stmt) {
        header("location:blog.php");
    } else {
        echo "Yazı eklenirken bir hata oluştu.";
    }

    // Statement'i kapatın
    $stmt = null;
// Bağlantıyı kapatın
    $db = null;
}

if (isset($_POST['yazi_sil'])) {
    $yazi_id = $_POST['yazi_id'];

    // Silme işlemi burada gerçekleştirilecek
    $silme_sorgusu = $db->prepare("DELETE FROM blog WHERE id = :yazi_id");
    $silme_sorgusu->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
    $silme_sorgusu->execute();

    // Silme işlemi başarılıysa yönlendirme veya mesaj ekle
    header("location: blog.php");
    exit();
}

if (isset($_POST['yazi_duzenle'])) {
    // Yazı Düzenleme İşlemi
    $yazi_id = $_POST['yazi_id'];
    $duzenle_yazi_baslik = $_POST['duzenle_yazi_baslik'];
    $duzenle_yazi = $_POST['duzenle_yazi'];

    $duzenleme_sorgusu = $db->prepare("UPDATE blog SET baslik = :duzenle_yazi_baslik, icerik = :duzenle_yazi WHERE id = :yazi_id");
    $duzenleme_sorgusu->bindParam(':duzenle_yazi_baslik', $duzenle_yazi_baslik, PDO::PARAM_STR);
    $duzenleme_sorgusu->bindParam(':duzenle_yazi', $duzenle_yazi, PDO::PARAM_STR);
    $duzenleme_sorgusu->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
    $duzenleme_sorgusu->execute();

    header("location: blog.php");
    exit();
}



if (isset($_POST['bungalov_ekle'])) {
    // Formdan gelen verileri alın
    $bungalov_baslik = $_POST['baslik'];
    $aciklama = $_POST['aciklama'];

    // Ana resim yüklemesi için gerekli işlemleri yapın
    if (isset($_FILES['ana_Resim']) && $_FILES['ana_Resim']['error'] == UPLOAD_ERR_OK) {
        $ana_resim_adi = $_FILES['ana_Resim']['name'];
        $ana_resim_tmp = $_FILES['ana_Resim']['tmp_name'];
        $ana_resim_yolu = "bungalov/" . $ana_resim_adi; // Ana resmin yükleneceği klasörü belirtin

        // Ana resmi belirtilen klasöre kaydedin
        move_uploaded_file($ana_resim_tmp, $ana_resim_yolu);
    } else {
        // Eğer ana resim yüklenmemişse veya bir hata olmuşsa, uygun bir hata mesajı verin.
        if ($_FILES['ana_Resim']['error'] != UPLOAD_ERR_OK) {
            echo "Ana Resim yüklenirken bir hata oluştu. Hata Kodu: " . $_FILES['ana_Resim']['error'];
            exit();
        }
        exit();
    }

    // Diğer resimler için gerekli işlemleri yapın (resim_1, resim_2, resim_3, resim_4)
    $resimler_yolu = "bungalov/";

    $resim_1_yolu = $resim_2_yolu = $resim_3_yolu = $resim_4_yolu = "";

    foreach (['resim_1', 'resim_2', 'resim_3', 'resim_4'] as $resim_input) {
        if (isset($_FILES[$resim_input]) && $_FILES[$resim_input]['error'] == UPLOAD_ERR_OK) {
            $resim_adi = $_FILES[$resim_input]['name'];
            $resim_tmp = $_FILES[$resim_input]['tmp_name'];
            ${$resim_input . '_yolu'} = $resimler_yolu . $resim_adi;

            // Resmi belirtilen klasöre kaydedin
            move_uploaded_file($resim_tmp, ${$resim_input . '_yolu'});
        } else {
            // Eğer resim yüklenmemişse veya bir hata olmuşsa, uygun bir hata mesajı verin.
            if ($_FILES[$resim_input]['error'] != UPLOAD_ERR_OK) {
                echo "$resim_input yüklenirken bir hata oluştu. Hata Kodu: " . $_FILES[$resim_input]['error'];
                exit();
            }
            exit();
        }
    }

    // Veritabanına bilgileri kaydedin
    $query = "INSERT INTO bungalov (name, description, ana_resim, resim_1, resim_2, resim_3, resim_4, createdAt) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $db->prepare($query);
    $stmt->execute([$bungalov_baslik, $aciklama, $ana_resim_yolu, $resim_1_yolu, $resim_2_yolu, $resim_3_yolu, $resim_4_yolu]);

    if ($stmt) {
        header("location:index.php");
    } else {
        echo "Bungalov eklenirken bir hata oluştu.";
    }

    // Statement'i kapatın
    $stmt = null;
    // Bağlantıyı kapatın
    $db = null;
}

if (isset($_POST['bungalov_sil'])) {
    $yazi_id = $_POST['yazi_id'];

    // Silme işlemi burada gerçekleştirilecek
    $silme_sorgusu = $db->prepare("DELETE FROM bungalov WHERE id = :yazi_id");
    $silme_sorgusu->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
    $silme_sorgusu->execute();

    // Silme işlemi başarılıysa yönlendirme veya mesaj ekle
    header("location: index.php");
    exit();
}



if (isset($_POST['resim_ekle'])) {
    // Formdan gelen verileri alın
    $resim_baslik = $_POST['ad'];

    // Ana resim yüklemesi için gerekli işlemleri yapın
    if (isset($_FILES['resim']) && $_FILES['resim']['error'] == UPLOAD_ERR_OK) {
        $ana_resim_adi = $_FILES['resim']['name'];
        $ana_resim_tmp = $_FILES['resim']['tmp_name'];
        $ana_resim_yolu = "gallery/" . $ana_resim_adi; // Ana resmin yükleneceği klasörü belirtin

        // Ana resmi belirtilen klasöre kaydedin
        move_uploaded_file($ana_resim_tmp, $ana_resim_yolu);
    } else {
        // Eğer ana resim yüklenmemişse veya bir hata olmuşsa, uygun bir hata mesajı verin.
        if ($_FILES['resim']['error'] != UPLOAD_ERR_OK) {
            echo "Ana Resim yüklenirken bir hata oluştu. Hata Kodu: " . $_FILES['resim']['error'];
            exit();
        }
        exit();
    }

    // Veritabanına bilgileri kaydedin
    $query = "INSERT INTO gallery (name, directory, createdAt) VALUES (?, ?, NOW())";

    $stmt = $db->prepare($query);
    $stmt->execute([$resim_baslik, $ana_resim_yolu]);

    if ($stmt) {
        header("location:gallery.php");
    } else {
        echo "Bungalov eklenirken bir hata oluştu.";
    }

    // Statement'i kapatın
    $stmt = null;
    // Bağlantıyı kapatın
    $db = null;
}

if (isset($_POST['resim_sil'])) {
    $yazi_id = $_POST['yazi_id'];

    // Silme işlemi burada gerçekleştirilecek
    $silme_sorgusu = $db->prepare("DELETE FROM gallery WHERE id = :yazi_id");
    $silme_sorgusu->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
    $silme_sorgusu->execute();

    // Silme işlemi başarılıysa yönlendirme veya mesaj ekle
    header("location: gallery.php");
    exit();
}

if (isset($_POST['destek_sil'])) {
    $yazi_id = $_POST['yazi_id'];

    // Silme işlemi burada gerçekleştirilecek
    $silme_sorgusu = $db->prepare("DELETE FROM supports WHERE id = :yazi_id");
    $silme_sorgusu->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
    $silme_sorgusu->execute();

    // Silme işlemi başarılıysa yönlendirme veya mesaj ekle
    header("location: supports.php");
    exit();
}

if (isset($_POST['rezervasyon_sil'])) {
    $yazi_id = $_POST['yazi_id'];

    // Silme işlemi burada gerçekleştirilecek
    $silme_sorgusu = $db->prepare("DELETE FROM reservation WHERE id = :yazi_id");
    $silme_sorgusu->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
    $silme_sorgusu->execute();

    // Silme işlemi başarılıysa yönlendirme veya mesaj ekle
    header("location: reservations.php");
    exit();
}



?>