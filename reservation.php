<?php
include ('header.php');
include ('admin/connect.php');

// URL'den 'id' parametresini çek
if (isset($_GET['id'])) {
    $bungID = $_GET['id'];

    $bungQuery = $db->prepare("SELECT * FROM bungalov WHERE id = ?");
    $bungQuery->execute([$bungID]);

    if ($bungQuery->rowCount() > 0) {
        $bungPost = $bungQuery->fetch(PDO::FETCH_ASSOC);
        ?>
<div class="support-company-area fix">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-xl-6 col-lg-6">
                <img src="admin/<?php echo $bungPost['ana_resim']; ?>" alt="" style="width: 500px; height: 700px;">
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2">
                        <span>Bi' Nefes Bungalov</span>
                        <h2><?php echo $bungPost['name']; ?></h2>
                    </div>
                    <div class="support-caption">
                        <p><?php echo $bungPost['description']; ?></p>
                        <div class="select-suport-items">
                            <label class="single-items">2/3/4 Kişilik
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="single-items">Sınırsız Wifi
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="single-items">100% Müşteri Memnuniyeti
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="single-items">Düzenli Temizlik
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <form action="islem.php" class="input-form card p-4" method="POST">
                            <input type="hidden" name="bungName" value="<?php echo $bungPost['name']; ?>">
                            <label for="name">Adınız Soyadınız</label>
                            <input type="text" name="name" class="form-control-plaintext" placeholder="Adınız Soyadınız">
                            <label for="phone">Telefon</label>
                            <input type="text" name="phone" class="form-control-plaintext" placeholder="Telefon Numaranız"><br>

                            <label for="date_baslangic">Başlangıç Tarihi</label>
                            <input type="date" name="date_baslangic" class="form-control-plaintext">
                            <label for="date_bitis">Bitiş Tarihi</label>
                            <input type="date" name="date_bitis" class="form-control-plaintext">
                            <br>

                            <button type="submit" name="reservation" class="btn border-btn">Rezervasyon Yap!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gallery-item col-8">
            <div class="col-3 col-md-2">
                <a href="admin/<?php echo $bungPost['resim_1']; ?>" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url(admin/<?php echo $bungPost['resim_1']; ?>);"></div>
                </a>
            </div>
            <div class="col-3 col-md-2">
                <a href="admin/<?php echo $bungPost['resim_2']; ?>" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url(admin/<?php echo $bungPost['resim_2']; ?>);"></div>
                </a>
            </div>
            <div class="col-3 col-md-2">
                <a href="admin/<?php echo $bungPost['resim_3']; ?>" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url(admin/<?php echo $bungPost['resim_3']; ?>);"></div>
                </a>
            </div>
            <div class="col-3 col-md-2">
                <a href="admin/<?php echo $bungPost['resim_4']; ?>" class="img-pop-up">
                    <div class="single-gallery-image" style="background: url(admin/<?php echo $bungPost['resim_4']; ?>);"></div>
                </a>
            </div>
        </div>
    </div>
    <br>

    <div class="favourite-place place-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Diğer Bungalovlarımızada Göz Atın</span>
                        <h2>Bi' Nefes Bungalovlarımız</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                // Veritabanından bungalov verilerini çek
                $bungalovlarQuery = $db->prepare("SELECT * FROM bungalov LIMIT 3");
                $bungalovlarQuery->execute();

                // Her bir bungalov verisini ekrana yazdır
                while ($bungalov = $bungalovlarQuery->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-place mb-30">
                            <div class="place-img">
                                <img src="admin/<?php echo $bungalov['ana_resim']; ?>" alt="<?php echo $bungalov['name']; ?>">
                            </div>
                            <div class="place-cap">
                                <div class="place-cap-top">
                                    <span><i class="fas fa-star"></i><span>100% Memnuniyet</span> </span>
                                    <h3><a href="reservation.php?id=<?php echo $bungalov['id']; ?>"><?php echo $bungalov['name']; ?></a></h3>
                                    <p class="dolor">2/3/4 Kişilik</span></p>
                                </div>
                                <div class="place-cap-bottom">
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i>Sapanca</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <section class="sample-text-area">
        <div class="container box_1170">
            <h3 class="text-heading">Rezevasyon Yapmak İstiyorum!</h3>
            <p class="sample-text">
                Rezervasyon yapmak için lütfen yönergeleri takip ediniz. Rezervasyonunuz en kısa sürede onaylanacaktır.
            <div class="">
                <ol class="ordered-list">
                    <li><span>Kalmak İstediğiniz Bungalova Karar Verin</span></li>
                    <li><span>Karar Verdiğiniz Bungalovu Kendi Sayfasından İnceleyin</span></li>
                    <li><span>Kişi Sayısı Ve Konumu Size Uygun İse Devam Ediniz</span></li>
                    <li><span>Bungalovun Sayfasındaki Rezervasyon Kısmından Uygun Tarihi Ve Kişi Sayısını Seçin</span></li>
                    <li><span>Rezervasyon Yap'a Tıkladığınızda Rezervasyon Talebiniz Gönderilir</span></li>
                    <li><span>Sistemimizde O Günün Uygunluğu İncelenir Ve Onaylanma Durumu Hakkında Size Bilgilendirme E-Postası Gönderilir</span></li>
                </ol>
            </div>
            </p>
            <h4 class="text-heading">Mutlu Bi' Nefes Almak İşte Bu Kadar Kolay</h4>
        </div>
    </section>
<?php
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
include ('footer.php');
?>
