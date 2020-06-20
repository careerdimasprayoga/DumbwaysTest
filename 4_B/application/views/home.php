<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/');?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/');?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/');?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= base_url('assets/');?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/');?>css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../../index.html">Dimas Games Center</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/');?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dimas Prayoga</div>
                    <div class="email">dimasprayogatohagasayaga@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li>
                        <a href="">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url('product');?>">
                            <i class="material-icons">toc</i>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url('stock');?>">
                            <i class="material-icons">toc</i>
                            <span>Stock</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url('genre');?>">
                            <i class="material-icons">toc</i>
                            <span>Genre</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_add</i>
                            <span>Add</span>
                        </a>
                        <ul class="ml-menu">
                            <li>  
                              <li>
                                  <a href="<?=base_url('stock/add_stock');?>">Add Stock</a>
                              </li>
                              <li>
                                  <a href="<?=base_url('genre/add_genre');?>">Add Genre</a>
                              </li>
                              <li>
                                  <a href="<?=base_url('product/add_product');?>">Add Game</a>
                              </li>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Example -->
            <div class="row clearfix">

                <?php foreach ($produk as $tampil) : ?>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                <?= $tampil['title'];?>
                            </h2>
                        </div>
                        <div class="body">
                          <img src="<?= base_url('assets/images/product/').$tampil['image'];?>" style="width: 190px; height: 130px;">
                          <h3 style="width: 250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $tampil['title'];?></h3>
                          <h5 style="color: green;"><?= $tampil['name'];?></h5>
                          <h5>Rp. <?= $tampil['price'];?></h5>
                          <h5>
                            <?php if($tampil['stock'] <= 0) {
                              echo "Stok Habis";
                            } else {
                             echo "Stock. ". $tampil['stock'];
                            } ?>
                          </h5>
                          <a href="<?= base_url('home/buy/').$tampil['id'];?>">
                            <button class="btn btn-success btn-md">Buy</button>
                          </a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
            <!-- #END# Basic Example -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/node-waves/waves.js"></script>

    <!-- Wait Me Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/waitme/waitMe.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/');?>js/admin.js"></script>
    <script src="<?= base_url('assets/');?>js/pages/cards/colored.js"></script>

    <!-- Demo Js -->
    <script src="<?= base_url('assets/');?>js/demo.js"></script>
</body>
</html>
