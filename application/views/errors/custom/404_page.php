<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= $title; ?></title>

    <!--Icon Aplikasi [ OPTIONAL ]-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/') ?><?= $website['logo']; ?>">


    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url('assets/templatenifty/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url('assets/templatenifty/') ?>css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url('assets/templatenifty/') ?>css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url('assets/templatenifty/') ?>plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/templatenifty/') ?>plugins/pace/pace.min.js"></script>

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/templatenifty/') ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>
    <div id="container" class="cls-container">

        <!-- HEADER -->
        <!--===================================================-->
        <div class="cls-header">
            <div class="cls-brand">
                <a class="box-inline" href="index-2.html">
                    <img alt="Nifty Admin" src="<?php echo base_url('assets/img/') ?><?= $website['logo']; ?>" class="brand-icon">
                    <span class="brand-title"><?= $website['nama_website']; ?>
                        <!-- <span class="text-thin">Admin</span> -->
                    </span>
                </a>
            </div>
        </div>

        <!-- CONTENT -->
        <!--===================================================-->
        <div class="cls-content">
            <h1 class="error-code text-info">404</h1>
            <p class="h4 text-uppercase text-bold">PAGE NOT FOUND!</p>
            <div class="pad-btm">
                Sorry, but the page you are looking for has not been found on our server.
            </div>
            <!-- <div class="row mar-ver">
                <form class="col-xs-12 col-sm-10 col-sm-offset-1" method="post" action="https://themeon.net/nifty/v2.9.1/pages-search-results.html">
                    <input type="text" placeholder="Search.." class="form-control error-search">
                </form>
            </div> -->
            <hr class="new-section-sm bord-no">
            <button class="btn btn-primary btn-labeled" onclick="goBack()"><i class="btn-label fa fa-chevron-circle-left"></i> Go Back</button>
        </div>


    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>js/jquery.min.js"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>js/bootstrap.min.js"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>js/nifty.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>