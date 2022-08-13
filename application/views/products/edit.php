

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gérer
      <small>Produits</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li class="active">Produits</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

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
            <h3 class="box-title">Modifier un produit</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <!-- <div class="form-group">
                  <label>Image Preview: </label>
                  <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150" class="img-circle">
                </div> -->

                

                <div class="form-group">
                  <label for="product_name">Nom de produit</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $product_data['name']; ?>"  autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="sku">SKU</label>
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" value="<?php echo $product_data['sku']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="price">Prix</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="<?php echo $product_data['price']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="qty">Qté</label>
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Qty" value="<?php echo $product_data['qty']; ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter 
                  description" autocomplete="off">
                    <?php echo $product_data['description']; ?>
                  </textarea>
                </div>

                

                <div class="form-group">
                  <label for="store">Disponibilité</label>
                  <select class="form-control" id="availability" name="availability">
                    <option value="1" <?php if($product_data['availability'] == 1) { echo "selected='selected'"; } ?>>Oui</option>
                    <option value="2" <?php if($product_data['availability'] != 1) { echo "selected='selected'"; } ?>>Non</option>
                  </select>
                </div>



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Retour</a>
              </div>
            </form>
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

<script type="text/javascript">
  
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainProductNav").addClass('active');
    $("#manageProductNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>