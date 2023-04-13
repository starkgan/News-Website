<?php
    include_once('config.php');

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $sql = "SELECT * FROM articles WHERE id = $user_id";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              $title = $row['title'];
              $article = $row['article'];
              $image = $row['image'];
              $date = $row['date'];
            }

        }

    }

   // $redirect = isset($_SESSION['email']) ? header('Location:index.php') : header('Location:sign-in.php');
    //$redirect = isset($_SESSION['email']) ? 'index.php' : 'sign-in.php';
    //$redirect = !empty($_SESSION['email']) ? $_SESSION['email'] : 'sign-in.php';

   // echo $_SESSION['email'];

  

    ?>
 
    
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>MMS NEWS</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">

        <style>
         .nav-item .nav-link:hover {
    color:#2AB2E3;

}

.nav-item .nav-link:focus {
    color:#2AB2E3;

}

.nav-item .nav-link:active {
    color:#2AB2E3;

}

.welcome-name{
  margin-right:10px;
  color:#2AB2E3;
  margin-top:10px;

}

img{
  max-width:100%;
  height:100%;
  object-fit:contain;

}

.slick-slider {
  -webkit-tap-highlight-color: transparent
}

.signle_iteam { 
  background:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7));
}

.slider_tittle{
  font-weight:bold;
  font-family:comic sans ms;
}

a:hover{
  text-decoration:none;
}

.recent_title {
  color: rgb(17, 17, 17);
}
.about{
    margin-top:80px;
    margin-left:20px;
    margin-right:20px;


}



            .overlap{
                overflow:visible;
            }

        </style>


    </head>
    
    <body>

<main>

<nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                        MMS<b style="color:#2AB2E3!important">NEWS</b>
                    </a>

                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="contact.php">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="account.php">Account</a>
                            </li>
                        </ul>

                        <?php echo $_SESSION['email']; ?>


                        <div class="d-none d-lg-block" style="margin-left:45px;">
                            <a href="Log-out.php"  style="color:#2AB2E3;">Log-out</a>
                        </div>
                    </div>
                </div>
            </nav>

    <section class="about section-padding">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="mb-5"><span><?php echo  $title;?></span></h2>
                </div>

                <div class="col-lg-2 col-12 mt-auto mb-auto">
                  <p><?php echo  $date;?></p>
                </div>

                <div class="col-lg-10 col-12">
                    <div class="tab-content mt-2" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <div class="row">
                                <div class="col-lg-7 col-12">
                                <img src="./<?php echo $image; ?>" width="auto"  title="<?php echo $title; ?>"></div>

                                <div class="col-lg-5 col-12">
                                    <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                        <p><?php echo  $article; ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-youtube" role="tabpanel" aria-labelledby="pills-youtube-tab">

                            <div class="row">
                                <div class="col-lg-7 col-12">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="https://www.youtube-nocookie.com/embed/f_7JqPDWhfw?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12">
                                    <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                        <h4 class="mb-3">Life at Studio</h4>

                                        <p>Over three years in business, We’ve had the chance to work on a variety of projects, with companies</p>

                                        <p>Custom work is branding, web design, UI/UX design</p>

                                        <div class="mt-2 mt-lg-auto">
                                            <a href="contact.php" class="custom-link mb-2">
                                                Work with us
                                                <i class="bi-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

 <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.php">MMS</a> NEWS</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 </p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.agitsolutionsng.com/" target="_blank">Stark_Gan</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.php" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>
       
<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/jQuery.headroom.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
