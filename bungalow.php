<?php
include('header.php');
include('admin/connect.php');
?>
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/bungalov.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Bungalovlarımız</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- Favourite Places Start -->
<div class="favourite-place place-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Bİ'NEFES ALMAK İSTEYENLERE</span>
                    <h2>Bi' Nefes Bungalovlarımız</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            // Veritabanından bungalov verilerini çek
            $bungalovlarQuery = $db->prepare("SELECT * FROM bungalov");
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
<!-- Favourite Places End -->

<?php
include('footer.php');
?>
