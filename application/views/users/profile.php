

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Utilisateur
        <small>Profil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
                <tr>
                  <th>Nom d'utilisateur</th>
                  <td><?php echo $user_data['username']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $user_data['email']; ?></td>
                </tr>
                <tr>
                  <th>Prénom</th>
                  <td><?php echo $user_data['firstname']; ?></td>
                </tr>
                <tr>
                  <th>Nom</th>
                  <td><?php echo $user_data['lastname']; ?></td>
                </tr>
                <tr>
                  <th>Sexe</th>
                  <td><?php echo ($user_data['gender'] == 1) ? 'Male' : 'Gender'; ?></td>
                </tr>
                <tr>
                  <th>Téléphone</th>
                  <td><?php echo $user_data['phone']; ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
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

 
