<?php
include ('header.php');
include ('admin/connect.php');
?>
    <!-- Blog Area Start -->
    <div class="home-blog-area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Bungalovlar İle İlgilenenlere</span>
                        <h2>Bi' Nefes Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                // Veritabanından verileri çek
                $blogPosts = $db->prepare("SELECT * FROM blog");
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
<?php
include ('footer.php');
?>