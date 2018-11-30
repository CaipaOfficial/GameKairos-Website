<?php
  session_start();

  if ($_POST['destroy'] == "true") {
    session_destroy();
    header("Refresh:0");
    }

 ?>
<!doctype html>
<head>
  <?php
  require ('db/connect.php');

  if ($_POST['LENGUAJE'] == "EN" ) {
    require ('translate/_EN.php');
    echo("<html class='no-js' lang='en'>");
  }else

  if ($_POST['LENGUAJE'] == "ES") {
    require ('translate/_ES.php');
    echo("<html class='no-js' lang='es'>");
  }

  if($_POST['LENGUAJE'] == "" or $_POST['LENGUAJE'] == ""){
    require ('translate/_ES.php');
    echo("<html class='no-js' lang='en'>");
  }


  ?>
  <?php require ('analytics.google/analytics.google.php'); ?>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>KAIROS</title>
  <meta name="description" content="The best MMORPG game, download it now!">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/shards.css">
  <link rel="stylesheet" href="css/paymentfont.min.css">
  <link rel="stylesheet" href="css/shards-demo.css">
  <link href="https://fonts.googleapis.com/css?family=Cinzel:700" rel="stylesheet">
<!--   <link rel="apple-touch-icon" sizes="57x57" href="favico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png"> -->
  <link rel="shortcut icon" href="favico/favicon.ico" />
  <link rel="manifest" href="favico/manifest.json">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body >
  <!-- Floating Shards -->
  <img src="images/demo/shard-1-5x-3.png" alt="Shard" class="shard">
  <!-- Welcome Section -->
  <div class="welcome d-flex justify-content-center flex-column">
    <?php
    require ('Lenguaje_selector.php');
    require ('login/user.php');
     ?>
    <div class="inner-wrapper mt-auto mb-auto">
      <h1 class="slide-in name-server"><?php echo $Kairos; ?></h1>
      <h4><p class="slide-in name-server"><?php echo $BelowKairos; ?></p></h4>
      <div class="action-links slide-in">
        <div class="">
          <a href="https://s3.eu-west-2.amazonaws.com/gamekairos/Laucher/Kairos+Installer.exe" class="btn btn-primary btn-pill align-self-center mr-2">
          <i class="fa fa-download mr-1"></i> <?php echo $DownloadNow; ?></a>
          <a data-scroll-to="#registro" id="scroll-to-content" class="btn btn btn-secondary btn-pill align-self-center text-white"><?php echo $Register; ?></a>
          <a id="scroll-to-content" class="btn btn-light btn-pill align-self-center text-blue"><?php echo $MoreInfo; ?></a>
        </div>
        <div class="pt-3">
          <a href="https://www.youtube.com/watch?v=Mi0KKvWM0j0&feature=youtu.be" style="font-family: 'Cinzel', serif;" class="bg-warning p-2 mb-1 text-black"><?php echo $Rules ?></a>
          <a href="https://www.youtube.com/watch?v=x3ZkEKSM0RE&feature=youtu.be&ab_channel=Delox" style="font-family: 'Cinzel', serif;" class="bg-info p-2 mb-1 text-black"><?php echo $Donations ?></a>
          <a href="https://www.gamekairos.org/pillory/view/pillory_view.php" style="font-family: 'Cinzel', serif;" class="bg-danger p-2 mb-1 text-black">PILLORY</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="page-content">
    <!-- Content -->
    <div class="content clearfix">
      <div id="introductions" class="container mb-5">
        <div class="section-title col-lg-8 col-md-10 ml-auto mr-auto">
            <?php
            echo $Parrafo;
            require ('user_Counter.php');
            echo "<h4 class='text-center'>$RegisteredPlayers: <b class='randon'>$users</b></h4>";
            ?>
          <div class="social-actions">
            <a href="https://twitter.com/_Delynith?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large"
              data-show-screen-name="false">Follow</a>
            <iframe src="https://discordapp.com/widget?id=419667093424832532&theme=dark" width="700" height="500" allowtransparency="true" frameborder="0"></iframe>
            <a class="twitter-share-button" href="https://twitter.com/share" data-size="large" data-text="¡Me encanta Kairos! ¡Que comience la aventura!"
              data-url="http://gamekairos.org" data-hashtags="kairos,gamekairos,game" data-via="_Delynith">
              Tweet
            </a>
            <!-- <a class="github-button" href="https://github.com/designrevision/shards-ui" data-icon="octicon-star" data-show-count="true"
              data-size="large" aria-label="Star designrevision/s on GitHub">Star</a> -->
          </div>
        </div>
      </div>
      <!-- Colors -->
      <div>
        <div class="example col-md-7 ml-auto mr-auto">
          <div class="text-center p-2"><p><h2 class="name-server"><?php echo "$BeginAdventure"; ?></h2></p></div>
          <table class="table table-striped table-responsive-md">
            <colgroup>
               <col class="name">
               <col class="min">
               <col class="max">
            </colgroup>
            <thead class="table-dark">
              <th><h4 class="name-server" style="color: white;"><img src="images/demo/shards-logo.svg" alt="Example Navbar 1" class="mr-2" height="40">KAIROS</h4></th>
              <td><b>Minimum:</b></td>
              <td><b>Recommended:</b></td>

            </thead>
            <tbody>
              <tr>
                  <td>OS</td>
                  <td>Win Vista, Win 7, Win 8, Win 10</td>
                  <td>Win Vista, Win 7, Win 8, Win 10</td>
              </tr>
              <tr>
                  <td>CPU</td>
                  <td>
                      <span>Pentium 3 500 MHz</span>
                  </td>
                  <td>
                      <span>Pentium 3 800 MHz</span>
                  </td>
              </tr>
              <tr>
                  <td>RAM</td>
                  <td>
                      <span>256 MB</span>
                  </td>
                  <td>
                      <span>512 MB</span>
                  </td>
              </tr>
              <tr>
                  <td>Hard Drive</td>
                  <td>
                      <span>3 GB</span>
                  </td>
                  <td>
                      <span>4 GB</span>
                  </td>
              </tr>
              <tr>
                  <td>Graphics Card</td>
                  <td>
                      ATI Radeon 7000,
                      <br>
                      NVidia RIVA TNT2
                  </td>
                  <td>GeForce 2 MX</td>
              </tr>
              <tr>
                  <td>Sound Card</td>
                  <td>Supports DirectX 9.0</td>
                  <td>Supports DirectX 9.0</td>
              </tr>
              <tr>
                  <td>Internet</td>
                  <td>Broadband connection required</td>
                  <td>Broadband connection required</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Icon Packs -->

      <div class="py-5">
        <div id="icon-packs" class="container mb-5">
          <div class="section-title col-lg-8 col-md-10 ml-auto mr-auto mb-5">
            <?php echo "$Top10"; ?>
          </div>
        </div>
        <?php
        require ('Rank.php');
         ?>
      </div>



      <!-- Form Controls -->
      <div id="forms" class="container mb-5">
        <div class="section-title col-lg-8 col-md-10 ml-auto mr-auto">
          <h3 class="mb-4 name-server text-center"><?php echo "$Register"; ?></h3>
        </div>

        <!-- Form Controls - Simple Forms: Default / Using Icons (Seamless) -->
        <div id="registro" class="example col-lg-8 col-md-10 ml-auto mr-auto">

          <?php
          require ('register.php');
           ?>
        </div>
      </div>


      <!-- Footer CTA -->
      <div class="footer-cta bg-dark">
        <div class="container my-5">
          <div class="py-5">
            <div class="text-center">
              <h1>🛠</h1>
              <h2 class="text-white na name-server"><?php echo "$Story"; ?></h2>
              <p class="text-muted col-lg-8 col-md-10 ml-auto mr-auto"><?php echo "$Player"; ?>
                <b>
                  <u><!-- u>Go ahead and build somethin -->
                  </u>
                </b><!-- b> Can't wait to see what you come up with! If you like Shards, make sure you share it with your friends to --></p>
            </div>

            <div class="share d-table ml-auto mr-auto mt-5">
              <a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwww.gamekarios.org&text=KAIROS%20es%20el%20mejor%20servidor%20de%20aventuras%20online"
                class="btn btn-pill btn-primary mr-4" title="Share Shards on Twitter">
                <i class="fa fa-twitter mr-1"></i> Share on Twitter</a>
              <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.gamekarios.org" class="btn btn-pill btn-primary mr-4" title="Share on Facebook">
                <i class="fa fa-facebook mr-1"></i> Share on Facebook</a>
              <a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwww.gamekarios.org&title=KAIROS%20es%20el%20mejor%20servidor%20de%20aventuras%20online"
                class="btn btn-pill btn-primary mr-4" title="Share on LinkedIn">
                <i class="fa fa-linkedin mr-1"></i> Share on LinkedIn</a>
            </div>
          </div>
        </div>
      </div>

      <footer class="main-footer py-5">
        <p class="text-muted text-center small p-0 mb-4">&copy; Copyright 2018 — DesignRevision</p>
        <div class="social d-table mx-auto">
          <a class="twitter mx-3 h4 d-inline-block text-secondary" href="https://twitter.com/DesignRevision" target="_blank">
            <i class="fa fa-twitter"></i>
            <span class="sr-only">View our Twitter Profile</span>
          </a>
          <a class="facebook mx-3 h4 d-inline-block text-secondary" href="https://www.facebook.com/designrevision" target="_blank">
            <i class="fa fa-facebook"></i>
            <span class="sr-only">View our Facebook Profile
              <span>
          </a>
          <a class="github mx-3 h4 d-inline-block text-secondary" href="https://github.com/designrevision" target="_blank">
            <i class="fa fa-github"></i>
            <span class="sr-only">View our GitHub Profile</span>
          </a>
        </div>
      </footer>
    </div>

  <!-- JavaScript -->
  <div id="fb-root"></div>
  <script>
    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1662270373824826";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

  </script>
  <!--  Adsens -->
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-9027741837304821",
      enable_page_level_ads: true
    });
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="js/shards.min.js"></script>
  <script src="js/demo.min.js"></script>
  <a href="https://seal.beyondsecurity.com/vulnerability-scanner-verification/gamekairos.org"><img src="https://seal.beyondsecurity.com/verification-images/gamekairos.org/vulnerability-scanner-2.gif" alt="Website Security Test" border="0"></a>

</body>

</html>
