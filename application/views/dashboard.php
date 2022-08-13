<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Panneau de commande</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Tableau de bord</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <?php if ($is_admin == true) : ?>

            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $total_products ?></h3>

                            <p>Produits totaux</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url('products/') ?>" class="small-box-footer">Plus d'infos<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $total_paid_orders ?></h3>

                            <p>Total des commandes payées</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('orders/') ?>" class="small-box-footer">Plus d'infos<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $total_users; ?></h3>

                            <p>Nombre total d'utilisateurs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-people"></i>
                        </div>
                        <a href="<?php echo base_url('users/') ?>" class="small-box-footer">Plus d'infos<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        <?php endif; ?>

        <div style="background-color:white; padding:10px; width: 100%; margin-bottom:10px; border-radius: 5px; border:1px solid #000;">

            <h4>Vue stratégique</h4>

            <div class="col-md-12 col-xs-12">
               <!-- <?php /*if ($this->session->userdata('strategy') != 2) : */?>
                    <div style=" width:15%; height:auto; display: inline-block; ">
                        <label for="date">Date</label>
                        <div class="form-group" style="width:50%">
                            <input value="" id="date" name="date" type="text" autocomplete="off" required>
                        </div>
                    </div>
                --><?php /*endif; */?>
                 <?php if ($this->session->userdata('strategy') == 4) : ?>
                     <div style="width:15%; height:auto; display: inline-block; ">
                         <label for="dateend">Qté Min</label>
                         <div class="form-group" style="width:50%">
                             <input id="qty2" name="qty2" type="number" autocomplete="off" required>
                         </div>
                     </div>
                <?php endif; ?>
                <div style="width:15%; height:auto; display: inline-block; ">
                    <label for="dateend"> <?php if ($this->session->userdata('strategy') == 4) : ?> Max <?php endif; ?>Qté</label>
                    <div class="form-group" style="width:50%">
                        <input id="qty" name="qty" type="number" autocomplete="off" required>
                    </div>
                </div>

                <button type="button" onclick="dosomething()" class="btn btn-success">Filtre</button>
                <!-- <div id="mydiv" style="display: none;"><button type="submit" class="btn btn-success">Print</button></div> -->

            </div>
            <br>
            <br /> <br />


            <table id="manageTable1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl NO:</th>
                        <th>Nom produit</th>
                        <th>SKU</th>
                        <th>Prix</th>
                        <th>Inventaire actuel</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  -->
                </tbody>
            </table>
            <!--  <section class="content-header">
	  <h1>TABLES STATUS</h1> </section> -->
        </div>




        <div class="row">
          <!-- /.col -->
          <div class=" col-sm-12 col-md-12 col-lg-12 col-xs-12">
             <!-- PRODUCT LIST -->
             <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body ">
                   <div id="chart_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
                       <div class="chart-container">
                        <div class="pie-chart-container">
                          <canvas id="pie-chart">
                              <?php echo $chart_data; ?>
                          </canvas>
                        </div>
                      </div>
                   </div>
                </div>
                <!-- /.box-body -->
             </div>
             <!-- /.box -->
          </div>
          <!-- /.col -->
       </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    var strategy = "<?php echo $this->session->userdata('strategy'); ?>";
    var base_url = "<?php echo base_url(); ?>";
    //let chart_data;
    $(document).ready(function() {
        $("#dashboardMainMenu").addClass('active');

        $("#date").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true

        });


        $('#manageTable1').DataTable({

        });

        // $.ajax({
        //     url: base_url + 'dashboard/pie_chart_js',
        //     async:false,
        //     type: 'post',
        //     dataType: 'json',
        //     success:function(response) {
        //         chart_data = response;
        //     }
        // });



        pichartgenerate();
    



    });

    function dosomething() {
        var date = $("#date").val();
        //alert(date);
        var date = '1900-01-01';
        var qty = $("#qty").val();
        var qty2 = '';
        if(strategy==4){
             qty2 = $("#qty2").val();
            if (qty2 == "") {
                alert("Veuillez saisir une quantité minimale.");
            }
        }

        if (qty != "") {
            var tabble = $('#manageTable1').DataTable({
                "button": false,
                "paging": false,
                "order": [],
                "ajax":  base_url + 'products/fetchAllProducts',
                "destroy": true,

                "rowCallback": function( row, data, index ) {
                    var strat = parseInt(strategy);
                    console.log(strat);
                    switch (strat) {
                        case 1:
                            if (parseInt(data[4]) == qty) {
                                $('td', row).css('background-color', 'green');
                            } else {
                                $('td', row).css('background-color', 'red');
                            }
                            break;
                        case 2:
                            if (parseInt(data[4]) < qty) {
                                $('td', row).css('background-color', 'red');
                            } else {
                                $('td', row).css('background-color', 'green');
                            }
                            break;
                        case 3:
                            if (parseInt(data[4]) > qty) {
                                $('td', row).css('background-color', 'red');
                            } else {
                                $('td', row).css('background-color', 'green');
                            }
                            break;
                        case 4:
                            if (parseInt(data[4]) <= qty && parseInt(data[4]) >= qty2 ) {
                                $('td', row).css('background-color', 'green');
                            } else {
                                $('td', row).css('background-color', 'red');
                            }
                            break;
                    }


                }

            });



        } else {
            alert("Veuillez entrer une quantité.");

        }

       /* if (strategy == 2) {
            if (qty != "") {
                var tabble = $('#manageTable1').DataTable({
                    "button": false,
                    "paging": false,
                    "order": [],
                    "ajax": base_url + 'products/fetchProductsbyqty/'+ qty,
                    "destroy": true,

                    "rowCallback": function( row, data, index ) {
                        if ( data[1] == "test" )
                        {
                            $('td', row).css('background-color', 'Red');
                        }
                        else
                        {
                            $('td', row).css('background-color', 'green');
                        }
                    }

                });



            } else {
                alert("Please enter a quantity. ");

            }
        } else {
            if (date != "" && qty != "") {
                var tabble = $('#manageTable1').DataTable({
                    "button": false,
                    "paging": false,
                    "order": [],
                    "ajax": base_url + 'products/fetchProducts/' + date + '/' + qty,
                    destroy: true,
                    "rowCallback": function( row, data, index ) {
                        if ( data[1] == "test" )
                        {
                            $('td', row).css('background-color', 'Red');
                        }
                        else
                        {
                            $('td', row).css('background-color', 'green');
                        }
                    }

                });


            } else {
                alert("Veuillez sélectionner une date et saisir une quantité. ");

            }
        }*/
    }
        
    function pichartgenerate(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Product Sold Qty",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Produit vendu la semaine dernière",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  };


</script>