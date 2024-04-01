<?php
include ('islem.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINEFES | Giriş Sayfası</title>

    <link rel="shortcut icon" href="images/favicon.ico">

    <meta name="description" content="grimDev Yurt Script. X Yılından itibaren; kalitesiyle, elitliğiyle hizmetinizde...">

    <!--Fontlar-->
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:wght@300;400&display=swap" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="card mt-5">
                <div class="card-body">
                    <em><h3 class="card-title text-center">Bi Nefes Bungalov</h3></em>
                    <hr>
                    <form class="user" action="islem.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta Adresi</label>
                            <input type="email" name="kul_eposta" class="form-control" id="email" placeholder="E-posta adresinizi girin" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" name="kul_sifre" class="form-control" id="password" placeholder="Şifrenizi girin" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="oturum_ac" class="btn btn-primary mt-2">Giriş Yap</button>
                        </div>
                        <?php
                        if (isset($_SESSION['mvs_yanlis'])) {
                            echo '<div class="mt-3 text-center"><p class="fs-6">';
                            echo $_SESSION['mvs_yanlis'];
                            echo '</p></div>';
                            unset($_SESSION['mvs_yanlis']);
                        }

                        if(isset($_POST['cikis_yap'])){
                            if(empty($_SESSION['kul_eposta'])){
                                echo '<div class="mt-3 text-center"><p class="fs-6">';
                                echo $_SESSION['cikis_yapildi'];
                                echo '</p></div>';

                                session_destroy();
                                unset($_SESSION['cikis_yapildi']);
                            }
                        }

                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>