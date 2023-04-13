
<?php

include_once('config.php');

        $mysqli = new mysqli('localhost', 'root', '' , 'mmsnews_article') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM articles") or die($mysqli->error);
        $tadas = mysqli_fetch_all($result);

    /*this code will make sure that if you are not
 signed in you will be redirected back to the sign up page */

 if(isset($_SESSION['email']) == false){
  header('Location: sign-in.php');

}

          /*this code will make sure that if you are not
 signed in you will be redirected back to the sign up page*/  

   
    ?>

<!DOCTYPE html>
<html>
<head>
<title>MMS News</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

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
  margin-right:20px;
  color:#2AB2E3;
  margin-top:10px;

}

img{
  max-width:100%;
  max-height:auto;
  object-fit:contain;

}

.slick-slide img {
    display: block;
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


</style>


</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <div class="box_wrapper">
    <header id="header">
      <div class="header_top">
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav custom_nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="account.php">Account</a></li>

              </ul>
            </div>
          </div>
        </nav>
        <div class="header_search">
        <div class="welcome-name">
        <?php
            echo  $_SESSION['email'];
            ?>
          </div>
        </div>
        <div class="d-none d-lg-block" style="margin-left:45px;margin-top:12px;">
              <a href="Log-out.php"  style="color:#2AB2E3;">Log-out</a>
          </div>
      </div>
      <div class="header_bottom">
        <div class="logo_area"><a class="logo" href="#"><b style="color:#2AB2E3!important">MMS</b>News <span>A Story Delivery Site</span></a></div>
        <div class="top_addarea"></a></div>
      </div>
    </header>
    <div class="latest_newsarea"> <span>Latest News</span>

    

      <ul id="ticker01" class="news_sticker">
      <?php
        $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 20 ");
        foreach($rows as $row){
      ?>
        <li><a href="single-page.php?id=<?php echo $row['id']?>" style="font-family:comic sans ms;font-size:17px;margin-top:-6px;"><?php echo $row['title']; ?></a></li>
        <?php } ?>
       
      </ul>
     
    </div>
    <div class="thumbnail_slider_area">
      <div class="owl-carousel">

      <?php
        $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 20 ");
        foreach($rows as $row){
      ?>
        <div class="signle_iteam"><img src="./<?php echo $row['image']; ?>" width="100"  title="<?php echo $row['title']; ?>">

          <div class="sing_commentbox slider_comntbox">
            <p><i class="fa fa-calendar"></i><?php echo $row['date']; ?></p>
          </div>
          <a class="slider_tittle" href="single-page.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a>
        </div>
        <?php } ?>
       
          <div class="sing_commentbox slider_comntbox">
            <p><i class="fa fa-calendar"></i>19 Nov 2045</p>
          </div>
          <a class="slider_tittle" href="#">Fusce eu nulla semper porttitor felis sit amet</a></div>
      </div>
    </div>
    <section id="contentbody">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
          <div class="row">
            <div class="left_bar">
              <div class="single_leftbar">
                <h2><span>Recent Post</span></h2>
                <div class="singleleft_inner">
                <ul class="recentpost_nav wow fadeInDown">
                <?php
                    $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 8 ");
                    foreach($rows as $row){
                  ?>
                    <li><img src="./<?php echo $row['image']; ?>" width="100"  title="<?php echo $row['title']; ?>"> <a class="recent_title"  href="single-page.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a></li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="single_leftbar wow fadeInDown">
                <h2><span>Advertise Here</span></h2>
                <div class="singleleft_inner"> <a href="#"><img src="images/150x600.jpg" alt="" height="100%" width="100%"></a></div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
          <div class="row">
            <div class="middle_bar">
              <div class="featured_sliderarea">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                  <?php
                    $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 20 ");
                    foreach($rows as $row){
                  ?>
                    <div class="item"> <img src="./<?php echo $row['image']; ?>" width="50"  title="<?php echo $row['title']; ?>">
                      <div class="carousel-caption">
                        <h1><a href="single-page.php?id=<?php echo $row['id']?>"> <?php echo $row['title']; ?></a></h1>
                      </div>
                    </div>
                    <?php } ?>

                  </div>
                  <a class="left left_slide" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> </a> <a class="right right_slide" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </a></div>
              </div>
             
             
              <div class="category_three_fourarea  wow fadeInDown">
                <div class="category_three">
                  <div class="single_category">
                    <div class="category_title"> <a href="pages/single_page.html">Features</a></div>
                    <div class="single_category_inner">
                      <ul class="catg_nav catg_nav3">
                      <?php
                          $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 6 ");
                          foreach($rows as $row){
                        ?>
                        <li>
                          <div class="catgimg_container"> <a class="catg1_img" href="single-page.php?id=<?php echo $row['id']?>"> <img src="./<?php echo $row['image']; ?>" width="50"  title="<?php echo $row['title']; ?>"> </a></div>
                          <a class="catg_title"  href="single-page.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a>
                          <div class="sing_commentbox">
                            <p><i class="fa fa-calendar"></i><?php echo $row['date']; ?></p>
                          </div>
                          <p class="post-summary"><?php echo $row['article']; ?></p>
                       </li>
                       <?php } ?>
                      </ul>
                      <div class="catg3_bottompost wow fadeInDown">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="category_four wow fadeInDown">
                  <div class="single_category">
                    <div class="category_title"> <a href="#">Latest Updates</a></div>
                    <div class="single_category_inner">
                      <ul class="catg_nav catg_nav3">
                      <?php
                          $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 6");
                          foreach($rows as $row){
                        ?>
                        <li>
                          <div class="catgimg_container"> <a class="catg1_img" href="single-page.php?id=<?php echo $row['id']?>">  <img src="./<?php echo $row['image']; ?>" width="50"  title="<?php echo $row['title']; ?>"> </a></div>
                          <a class="catg_title" href="single-page.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a>
                          <div class="sing_commentbox">
                            <p><i class="fa fa-calendar"></i><?php echo $row['date']; ?></p>
                          </div>
                          <p class="post-summary"><?php echo $row['article']; ?></p>
                       </li>
                       <?php } ?> 
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <div class="col-lg-3 cosl-md-3 col-sm-12 col-xs-12">
          <div class="row">
            <div class="right_bar">
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Popular Post</span></h2>
                <div class="singleleft_inner">
                  <ul class="catg3_snav ppost_nav wow fadeInDown">
                  <?php
                          $rows = mysqli_query($conn, "SELECT * FROM articles ORDER BY RAND() LIMIT 12 ");
                          foreach($rows as $row){
                        ?>

                     <li>
                            <div class="media"> <a class="media-left" href="single-page.php?id=<?php echo $row['id']?>"> <img src="./<?php echo $row['image']; ?>" width="50"  title="<?php echo $row['title']; ?>"> </a>
                              <div class="media-body"> <a class="catg_title"  href="single-page.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a>
                                <div class="sing_commentbox">
                                  <p><i class="fa fa-calendar"></i><?php echo $row['date']; ?></p>
                                </div>
                              </div>
                            </div>
                         </li>
                   <?php } ?> 
                  </ul>
                </div>
                <div class="single_leftbar wow fadeInDown">
                <h2><span>Advertise Here</span></h2>
                <div class="singleleft_inner"> <a href="#"><img alt="" src="images/ad.jpeg" width="100%" height="100%"></a></div>
              </div>
              </div>
             
          
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer id="footer">
      <div class="footer_top">
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Follow By Email</h2>
            <div class="subscribe_area">
              <p>"Subscribe here to get our newsletter, it is safe just Put your Email and click subscribe"</p>
              <form action="#">
                <div class="subscribe_mail">
                  <input class="form-control" type="email" placeholder="Email Address">
                  <i class="fa fa-envelope"></i></div>
                <input class="submit_btn" type="submit" value="Submit">
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Popular Post</h2>
            <ul class="catg3_snav ppost_nav">
              <li>
                <div class="media"> <a class="media-left" href="pages/single_page.html"> <img src="images/70x70.jpg" alt=""> </a>
                  <div class="media-body"> <a class="catg_title" href="pages/single_page.html"> Aliquam malesuada diam eget turpis varius</a></div>
                </div>
             </li>
              <li>
                <div class="media"> <a class="media-left" href="pages/single_page.html"> <img src="images/70x70.jpg" alt=""> </a>
                  <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                </div>
             </li>
              <li>
                <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                  <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                </div>
             </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="single_footer_top wow fadeInRight">
            <h2>Labels</h2>
            <ul class="footer_labels">
              <li><a href="#">Comedy</a></li>
              <li><a href="#">Arts</a></li>
              <li><a href="#">Cinema</a></li>
              <li><a href="#">Nature</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Tourism</a></li>
              <li><a href="#">Videos</a></li>
            </ul>
          </div>
        </div>
       
      </div>
      <div class="footer_bottom">
        <div class="footer_bottom_left">
          <p>Copyright &copy; 2045</p>
        </div>
        <div class="footer_bottom_right">
          <ul>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Googel+" href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Rss" href="#"><i class="fa fa-rss"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

<?php

/*if(isset($_SESSION['email']) == false){
  session_destroy();
}*/

?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>