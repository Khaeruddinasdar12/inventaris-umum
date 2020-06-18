<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logoKDCW.png" type="image/ico" />

  <title>Inventaris | KeDai Computerworks</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="css/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="css/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="css/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="css/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body class="nav-md footer_fixed">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><img src="images/header-logo.png" alt="KeDai" width="200"></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li><a href="data_barang.html"><i class="fa fa-edit"></i> Data Barang </a></li>
                <li><a><i class="fa fa-desktop"></i> Tansaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="peminjaman.html">Peminjaman</a></li>
                    <li><a href="data_barang_pinjam.html">Data Barang Yang Pernah Di Pinjam</a></li>
                  </ul>
                </li>
                <li><a href="users.html"><i class="fa fa-child"></i> User </a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                  aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- home -->
        <div class="text-center">
          <img src="images/logoKDCW.png" alt="KeDai Computerworks" class="logos">
          <h3 class="text-header">Inventaris Barang Sekretariat</h3>
          <img src="images/header-logo2.png" alt="KeDai" class="image-header">
        </div>

        <!-- akhir home -->

        <!-- barang -->
        <div class="row">
          <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
            <a href="data_barang.html">
              <div class="tile-stats padd">
                <div class="icon"><i class="fa fa-pie-chart"></i>
                </div>
                <div class="count ico">179</div>
                <h3 class="desc">Jumlah Barang Yang Terdata</h3>
              </div>
            </a>
          </div>
          <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12 ">
            <a href="peminjaman.html">
              <div class="tile-stats padd">
                <div class="icon"><i class="fa fa-shopping-cart"></i>
                </div>
                <div class="count ico">179</div>
                <h3 class="desc">Jumlah Barang Yang Di Pinjam</h3>
              </div>
            </a>
          </div>
        </div>
        <!-- akhir barang -->

        <!-- /top tiles -->
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Inventaris - KeDai Computerworks
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="js/fastclick.js"></script>
  <!-- NProgress -->
  <script src="js/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="js/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="js/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="js/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="js/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="js/skycons.js"></script>
  <!-- Flot -->
  <script src="js/jquery.flot.js"></script>
  <script src="js/jquery.flot.pie.js"></script>
  <script src="js/jquery.flot.time.js"></script>
  <script src="js/jquery.flot.stack.js"></script>
  <script src="js/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="js/jquery.flot.orderBars.js"></script>
  <script src="js/jquery.flot.spline.min.js"></script>
  <script src="js/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="js/date.js"></script>
  <!-- JQVMap -->
  <script src="js/jquery.vmap.js"></script>
  <script src="js/jquery.vmap.world.js"></script>
  <script src="js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="js/moment.min.js"></script>
  <script src="js/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="js/custom.min.js"></script>
  <!-- datatable -->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/dataTables.buttons.min.js"></script>
  <script src="js/buttons.bootstrap.min.js"></script>
  <script src="js/buttons.flash.min.js"></script>
  <script src="js/buttons.html5.min.js"></script>
  <script src="js/buttons.print.min.js"></script>

  <!-- sweet alert -->
  <script src="js/sweetalert2.all.min.js"></script>

</body>

</html>