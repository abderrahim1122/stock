

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gérer
        <small>Utilisateurs</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Utilisateurs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ajouter une utilisateur</h3>
            </div>
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>
                
                <div class="form-group">
                  <label for="username">Nom d'utilisateur</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="cpassword">Confirmer mot de passe</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="fname">Prénom</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="lname">Nom</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone">Téléphone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="gender">Sexe</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Masculin
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                      Féminin
                    </label>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Retour</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();

    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');
  
  });
</script>
