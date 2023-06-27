<!-- views/layout/default.php -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME . ' - ' . $auth->getUsername() ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
  <link rel="shortcut icon" href="public/img/tesp.png" type="image/png">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="public/img/tesp2.png" alt="AdminLTELogo" height="100" width="100">
    </div>

    <!-- Caixas de estatistica perto da navbar  -->


    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">



            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $numfolhasobras ?></h3>
                <p>N.º de Folhas de obra</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?c=cliente&a=folhaobraindex&id=<?= $auth->getId() ?>" class="small-box-footer">Ver Todas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">

            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $numfolhasobraspagas ?><sup style="font-size: 20px"></sup></h3>
                <p>N.º Folhas de Obra Pagas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?c=cliente&a=folhaobrapaga&id=<?= $auth->getId() ?>" class="small-box-footer">Ver Pagas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">


            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $numfolhasobrasemitidas ?></h3>
                <p>N.º Folhas de Obras Emitidas</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="index.php?c=cliente&a=folhaobraemitida&id=<?= $auth->getId() ?>" class="small-box-footer">Ver Emitidas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php?c=layout&a=frontoffice" class="brand-link">
        <img src="public/img/tesp.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= APP_NAME ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="public/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index.php?c=cliente&a=edit" class="d-block"><?= $auth->getUsername(); ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item">
              <a href="index.php?c=cliente&a=folhaobraindex&id=<?= $auth->getId() ?>" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Todas as Folhas de Obra
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?c=cliente&a=folhaobrapaga&id=<?= $auth->getId() ?>" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Folhas de Obra Pagas
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="index.php?c=cliente&a=folhaobraemitida&id=<?= $auth->getId() ?>" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Folhas de Obra Emitidas
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?c=cliente&a=edit" <?= $auth->getId() ?>" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>
                  Área Pessoal
                </p>
              </a>
            </li>

          </ul>
          </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- /.content-header -->

      <!-- Main content -->

      <?php require_once($viewPath); ?>

      <!-- /.content -->
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <?php require_once 'footer.php' ?>;
  <!-- jQuery -->
  <script src="public/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="public/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="public/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="public/plugins/moment/moment.min.js"></script>
  <script src="public/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="public/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="public/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="public/js/pages/dashboard.js"></script>
</body>

</html>