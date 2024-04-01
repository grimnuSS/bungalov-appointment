<?php
    include('header.php');
?>
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/contact_hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Bize Ulaşın!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <iframe
                width="100%"
                height="480"
                style="border:0"
                loading="lazy"
                allowfullscreen
                src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d24163.09586625895!2d30.37990157898759!3d40.732811930190345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x14ccb3ec53254543%3A0x6be2139ad088beaa!2sBi%20Nefes%20Bungalov%2C%20Yan%C4%B1k%20Mahallesi%2C%203.%20Sk.%204%2F2%2C%2054600%20Serdivan%2FSakarya%20Merkez%2FSakarya!3m2!1d40.7328119!2d30.382154!4m5!1s0x14ccb3ec53254543%3A0x6be2139ad088beaa!2sBi%20Nefes%20Bungalov!3m2!1d40.7328119!2d30.382154!5e0!3m2!1sen!2str!4v1663306815084!5m2!1sen!2str"
            ></iframe>

        </div>

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">İletişime Geçin</h2>
            </div>
            <div class="col-lg-8">
                <form action="islem.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Mesajınızı Yazın"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Adınız Soyadınız">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="E-Postanız">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="İletişim Konusu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="iletisim" class="button button-contactForm boxed-btn">Gönder!</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Bi Nefes Bungalov, Yanık,</h3>
                        <p> Lekoşa, 3. Sokak 4/2, 54600 Sapanca/Sakarya</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+90 536 615 30 72</h3>
                        <p>Osman Bıyıkoğlu</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>binefesbungalov@gmail.com</h3>
                        <p>İstediğiniz Zaman Bize Ulaşabilirsiniz!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>