<?php
include('header.php');
include ('admin/connect.php');
?>

    <div class="section-top-border col-8 mx-auto">
        <h3>Fotoğraf Galerimiz</h3>
        <div class="row gallery-item">
            <?php
            $resimler = $db->prepare("SELECT * FROM gallery");
            $resimler->execute();

            while ($resim = $resimler->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-md-4">';
                echo '<a href="' . 'admin/' .$resim['directory'] . '" class="img-pop-up">';
                echo '<div class="single-gallery-image" style="background: url(admin/' . $resim['directory'] .');"></div>';
                echo '</a>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="section-top-border">
            <h3 class="mb-30">Bi' Nefes Fotoğraf Galerisi Hakkında</h3>
            <div class="row">
                <div class="col-lg-12">
                    <blockquote class="generic-blockquote">
                        Burada bulunan tüm resimler Bi' Nefes Bungalov'a aittir. Tüm hakları saklıdır. Fotoğraf sahiplerinin izinleri dahilinde yayınlanmıştır. Sizde mutlu anlarınızı burada yaratmak ve paylaşmak isterseniz marka yüzlerimiz arasına katılabilirsiniz!
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
<?php
include('footer.php');
?>