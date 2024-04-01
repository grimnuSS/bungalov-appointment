<?php
include ('header.php');
include ('admin/connect.php');

// URL'den 'id' parametresini çek
if (isset($_GET['id'])) {
    $blogID = $_GET['id'];

    // Veritabanından ilgili blog verilerini çek
    $blogQuery = $db->prepare("SELECT * FROM blog WHERE id = ?");
    $blogQuery->execute([$blogID]);

    // Blog var mı kontrol et
    if ($blogQuery->rowCount() > 0) {
        $blogPost = $blogQuery->fetch(PDO::FETCH_ASSOC);
        // Blog verilerini kullanarak sayfayı oluştur
        ?>
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="admin/<?php echo $blogPost['resim']; ?>" alt="">
                            </div>
                            <div class="blog_details">
                                <h2><?php echo $blogPost['baslik']; ?></h2>
                                <p class="excert">
                                    <?php echo $blogPost['yazi']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="blog-author">
                            <div class="media align-items-center">
                                <img src="assets/img/blog/author.png" alt="">
                                <div class="media-body">
                                    <a href="#">
                                        <h4><?php echo $blogPost['author']; ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Diğer Yazılarımız</h3>
                                <?php
                                // Bu örnekte, aynı kategoriye sahip diğer yazıları sorgula
                                $otherPostsQuery = $db->prepare("SELECT * FROM blog LIMIT 5");
                                $otherPostsQuery->execute();

                                while ($otherPost = $otherPostsQuery->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class="media post_item">
                                        <img style="height: 20px; width: auto" src="admin/<?php echo $otherPost['resim']; ?>" alt="post">
                                        <div class="media-body">
                                            <a href="single_blog.php?id=<?php echo $otherPost['id']; ?>">
                                                <h3><?php echo $otherPost['baslik']; ?></h3>
                                            </a>
                                            <p><?php echo date('M d, Y', strtotime($otherPost['createdAt'])); ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {
        // Blog bulunamadıysa hata mesajı göster
        echo "Blog bulunamadı.";
    }
} else {
    // 'id' parametresi yoksa hata mesajı göster
    echo "Blog ID eksik.";
}

include ('footer.php');
?>
