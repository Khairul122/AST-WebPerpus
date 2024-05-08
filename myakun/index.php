<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['idadmin'])) {
    echo "<script>location='login.php'</script>";
    header('location=login.php');
    exit();
}
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="../../img/icon.png"/>
    <title>SI-PERPUSTAKAAN</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css"/>
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/select2/dist/css/select2.min.css">

  </head>

  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <div href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Adm</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Selamat Datang</b></span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->


              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../assets/images/user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['nama'];?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">

                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="index.php" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                    </div>
                    <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Keluar</i></a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../assets/images/user.png" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li>
               <a href="?module=home">
                 <i class="fa fa-dashboard"></i> <span>Dashboard</span>
               </a>
             </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                  <span>Data Master</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="?module=data_buku">
                    <i class="fa fa-laptop"></i> <span>DATA BUKU</span>
                  </a>
                </li>

                <li>
                  <a href="?module=data_peminjaman">
                    <i class="fa fa-user"></i> <span>DATA PEMINJAMAN</span>
                  </a>
                </li>
                                <li>
                  <a href="?module=data_pengembalian">
                    <i class="fa fa-user"></i> <span>DATA PENGEMBALIAN</span>
                  </a>
                </li>

              </ul>
            </li>
			     <li>
              <a href="?module=peminjaman">
                <i class="fa fa-file"></i> <span>PEMINJAMAN</span>
              </a>
            </li>
                       <li>
              <a href="logout.php">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
	  <content>
		<?php include"content.php"; ?>
	  </content>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
         &copy; Copyright <?php echo date('Y');  ?> SI-PERPUS
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/backtoTop.js"></script>
    <script src="../assets/ckeditor/ckeditor.js"></script>
    <script src="../assets/select2/dist/js/select2.full.min.js"></script>
 <script>
      $(function () {
        $('.textarea').wysihtml5();
        $('.select2').select2();
        $('#datepicker').datepicker({
          autoclose: true
        });

        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        CKEDITOR.replace( 'editor');
      });
    </script>
  </body>
</html>

