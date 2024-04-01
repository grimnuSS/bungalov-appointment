<?php
include ('header.php');

include ('connect.php');

ob_start();
session_start();

if(empty($_SESSION['kul_eposta'])){
    header("location:login.php");
}
?>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://localhost/bungalov" class="simple-text">
                    BINEFES Bungalov
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="index.php">
                        <i class="ti-home"></i>
                        <p>Bungalovlar</p>
                    </a>
                </li>
                <li>
                    <a href="blog.php">
                        <i class="ti-write"></i>
                        <p>Yazılar</p>
                    </a>
                </li>
                <li>
                    <a href="gallery.php">
                        <i class="ti-gallery"></i>
                        <p>Fotoğraf Galerisi</p>
                    </a>
                </li>
                <li>
                    <a href="reservations.php">
                        <i class="ti-view-list"></i>
                        <p>Rezervasyonlar</p>
                    </a>
                </li>
                <li>
                    <a href="supports.php">
                        <i class="ti-support"></i>
                        <p>İletişim Talepleri</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Menüyü Aç</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bungalovlar</a>
                </div>
                <div class="collapse navbar-collapse">
                    <div class="navbar-right">
                        <form action="islem.php" method="post">
                            <button name="cikis_yap" type="submit" class="btn btn-primary">
                                Çıkış Yap
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="header">
                        <h3>Bungalovlar</h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Adı</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $sayi = 0;
                            $yazilar = $db->prepare("SELECT * FROM bungalov");
                            $yazilar->execute();

                            while ($yazi = $yazilar->fetch(PDO::FETCH_ASSOC)) {
                            $sayi++; ?>
                        <tr>
                            <td><?php echo $sayi ?></td>
                            <td><?php echo $yazi['name'] ?></td>
                            <td><?php echo $yazi['createdAt'] ?></td>
                            <td>
                                <form action="islem.php" method="POST">
                                    <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                                    <button class="btn btn-danger" name="bungalov_sil" type="submit">Sil</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Bungalov Ekle</h4>
                    </div>
                    <div class="content">
                        <form action="islem.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bungalov Başlığı</label>
                                        <input name="baslik" type="text" class="form-control border-input" placeholder="Yazı Başlığı">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ana Resim</label>
                                        <input name="ana_Resim" type="file" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Resim 1</label>
                                        <input name="resim_1" type="file" class="form-control border-input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Resim 2</label>
                                        <input name="resim_2" type="file" class="form-control border-input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Resim 3</label>
                                        <input name="resim_3" type="file" class="form-control border-input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Resim 4</label>
                                        <input name="resim_4" type="file" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <textarea name="aciklama" class="form-control border-input" id="editor"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="bungalov_ekle" class="btn btn-info btn-fill btn-wd">Bungalov Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php
include ('footer.php');
?>