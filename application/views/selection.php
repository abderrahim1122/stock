<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sélection de la stratégie</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
      .btn-circle {
          padding: 5%;
          border-radius: 50%;
          text-align: center;
          font-size: 18px;
          line-height: 10;
      }

    </style>
</head>
<body class="hold-transition login-page">
<div class="text-center" style="margin-top: 140px;">
  <div class="login-logo">
    <b>Sélection de la stratégie</b>
  </div>
  <!-- /.login-logo -->
  <div class="">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->

    <?php echo validation_errors(); ?>  

    <?php if(!empty($errors)) {
      echo $errors;
    } ?>
<!--  -->

        <div class="row text-center">

					<div class="col-md-3">
					</div>

					<div class="col-md-3">
					
          <a title="Calendar Replenishment" href="<?php echo base_url('auth/selection/1')?>" class="btn btn-danger btn-circle">
              Réapprovisionnement calendaire
            </a> 
					</div>
					
					<div class="col-md-3">
            <a title="Reorder point replenishmentent" href="<?php echo base_url('auth/selection/2')?>" class="btn btn-success btn-circle">
              Réapprovisionnement du point de commande
            </a> 
						
					</div>
          <div class="col-md-3">
					</div>
					</div>
          <div class="row text-center" style="margin-top: 50px;">
          
          <div class="col-md-3">
					</div>

					<div class="col-md-3">
            <a title="Inventory replenishment method" href="<?php echo base_url('auth/selection/3')?>" class="btn btn-success btn-circle">
            Réapprovisionnement des stocks
            </a>
					 
					</div>
					
					<div class="col-md-3">
          <a title="Demand Forecast Replenishment" href="<?php echo base_url('auth/selection/4')?>" class="btn btn-danger btn-circle">
          Réapprovisionnement de la prévision de la demande
            </a>
						
					</div>
          <div class="col-md-3">
					</div>
				</div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<script>

</script>
</body>
</html>
