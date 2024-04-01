<?php
    include('header.php');
    include ('admin/connect.php');
?>
<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="hero__caption">
                                <h1><span>Bi' Nefes</span> Almak İsteyenlere </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services servic-padding">
        <div class="container">
            <div class="row d-flex justify-contnet-center">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5>800+ Fazla Memnun<br>Müşteri</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-pay"></span>
                        </div>
                        <div class="services-cap">
                            <h5>100% Özen Gösterilen<br>Güvenlik Sistemleri</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-experience"></span>
                        </div>
                        <div class="services-cap">
                            <h5>8+ Yıllık Sektör<br>Tecrubesi</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-good"></span>
                        </div>
                        <div class="services-cap">
                            <h5>98% Müşteri<br>Mutluluğu</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Favourite Places Start -->
    <div class="favourite-place place-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Bungalovlarımızdan Bazıları</span>
                        <h2>Size Bi' Nefes Olacağız!</h2>
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
    <div class="support-company-area support-padding fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img mb-50">
                        <img src="assets/img/service/support-img.jpg" alt="">
                        <div class="support-img-cap">
                            <span>BI' NEFES</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2">
                            <span>Şirketimiz Hakkında</span>
                            <h2>Size Bi' Nefes Olmaya Geliyoruz!</h2>
                        </div>
                        <div class="support-caption">
                            <p>Yüksek Güvenlikli Lüks Bungalovlarımız İle Sizleride Memnun Kalan Müşterilerimiz Arasında Göreceğimizden Eminiz!</p>
                            <div class="select-suport-items">
                                <label class="single-items">Yüksek Güvenlik
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items">Lüks Bungalovlar
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items">100% Müşteri Memnuniyeti
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items">Bi' Nefes Almak İsteyenlere
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <a href="#" class="btn border-btn">Bungalovlarımız</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Area Start -->
    <div class="home-blog-area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>YAZILARIMIZI OKUMAK İSTERSENİZ</span>
                        <h2>Bi' Nefes Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <?php
                    // Veritabanından verileri çek
                    $blogPosts = $db->prepare("SELECT * FROM blog LIMIT 3");
                    $blogPosts->execute();

                    // Her bir blog yazısı için döngü
                    while ($post = $blogPosts->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-xl-4 col-lg-4 col-md-6">';
                        echo '<div class="home-blog-single mb-30">';
                        echo '<div class="blog-img-cap">';
                        echo '<div class="blog-img">';
                        // Blog resmi için veritabanındaki alanı kullan
                        echo '<img src="admin/' . $post['resim'] . '" alt="">';
                        echo '</div>';
                        echo '<div class="blog-cap">';
                        // Blog başlığı için veritabanındaki alanı kullan
                        echo '<h3><a href="single_blog.php?id=' . $post['id'] . '">' . $post['baslik'] . '</a></h3>';
                        echo '<a href="single_blog.php?id=' . $post['id'] . '" class="more-btn">Devamını Oku »</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
</main>
<?php
    include('footer.php');
?>