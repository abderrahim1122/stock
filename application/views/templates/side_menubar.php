<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
          </a>
        </li>


          
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Utilisateurs</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              
              <li id="createUserNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Ajouter un utilisateur</a></li>
              <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Gérer les utilisateurs</a></li>
            </ul>
          </li>
          <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span>Produits</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="addProductNav"><a href="<?php echo base_url('products/create') ?>"><i class="fa fa-circle-o"></i> Ajouter un produit</a></li>
                <li id="manageProductNav"><a href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> Gérer les Produits</a></li>
              </ul>
            </li>
            <li class="treeview" id="mainOrdersNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>Commandes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="addOrderNav"><a href="<?php echo base_url('orders/create') ?>"><i class="fa fa-circle-o"></i> Ajouter une commande</a></li>
                
                <li id="manageOrdersNav"><a href="<?php echo base_url('orders') ?>"><i class="fa fa-circle-o"></i> Gérer les commandes</a></li>
                
              </ul>
            </li>
            <li id="reportNav">
              <a href="<?php echo base_url('reports/') ?>">
                <i class="glyphicon glyphicon-stats"></i> <span>Rapports</span>
              </a>
            </li>
            <li id="companyNav"><a href="<?php echo base_url('company/') ?>"><i class="fa fa-files-o"></i> <span>Entreprise</span></a></li>
        

        <!-- <li class="header">Settings</li> -->

        
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Profil</span></a></li>

          <li><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Paramètres</span></a></li>
        <!-- user permission info -->
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Se déconnecter</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
</aside>