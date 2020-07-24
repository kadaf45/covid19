      <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>administrator/home" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/backend/lte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
           <!-- judul aplikasi -->
      <span class="brand-text font-weight-light">dministrator</span>
    </a>

  <div class="sidebar">
      <!-- User Login -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <?php $usr = $this->model_app->view_where('users', array('username'=> $this->session->username))->row_array();
                  if (trim($usr['foto'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['foto']; } ?>
          <img src="<?php echo base_url(); ?>assets/backend/foto_user/<?php echo $foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info"> 

          <a href="<?php echo base_url(); ?>admin/dashboard" class="d-block"><?php echo "$usr[nama_lengkap]"; ?></a>
        </div>
      </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>administrator/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-cogs"></i>
              <p>
                Parameter Umum
                <i class="right fas fa-angle-left "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
              	<?php
              	$cek=$this->model_app->umenu_akses("identitaswebsite",$this->session->id_session);
              	if($cek==1 OR $this->session->level=='admin'){
              		echo "<a href='".base_url()."administrator/identitaswebsite' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Identitas Website</p>
                </a>
              </li>";
          			}
          		?>


              <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("ref_kab",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<a href='".base_url()."administrator/ref_kab' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Referensi Kabupaten</p>
                </a>
              </li>";
                }
              ?>

              <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("ref_kec",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<a href='".base_url()."administrator/ref_kec' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Referensi Kecamatan</p>
                </a>
              </li>";
                }
              ?>

              <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("ref_status",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<a href='".base_url()."administrator/ref_status' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Referensi Status</p>
                </a>
              </li>";
                }
              ?>


             <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("background",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "
                <a href='".base_url()."administrator/background' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Background</p>
                </a>
              </li>";
              }
             ?>  
             
             <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("kategori",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "
                <a href='".base_url()."administrator/kategori' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Kategori</p>
                </a>
              </li>";
              }
             ?>  
             
               <li class="nav-item">
              	<?php
              	$cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
              	if($cek==1 OR $this->session->level=='admin'){
              		echo "
                <a href='".base_url()."administrator/manajemenuser' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Data User</p>
                </a>
              </li>";
              }
	           ?> 

            </ul>
          </li>

           <li class="nav-item">
            <?php
                $cek=$this->model_app->umenu_akses("alamat",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "
                <a href='".base_url()."administrator/daf_alamat' class='nav-link'>
              <i class='nav-icon fas fa fa-globe'></i>
              <p>
                Alamat Situs
                <i class='fas'></i>
              </p>
            </a>
          </li>";
        }
        ?> 

        <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("pasien",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<a href='".base_url()."administrator/pasien' class='nav-link'>
                  <i class='far fa-globe nav-icon'></i>
                  <p>Data Pasien</p>
                </a>
              </li>";
                }
              ?>

        <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("kasus",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<a href='".base_url()."administrator/total_kasus' class='nav-link'>
                  <i class='far fa-envelope nav-icon'></i>
                  <p>Data Kasus API</p>
                </a>
              </li>";
                }
        ?>

        <li class="nav-item">
                <?php
                $cek=$this->model_app->umenu_akses("download",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                  echo "<a href='".base_url()."administrator/download' class='nav-link'>
                  <i class='far fa-download nav-icon'></i>
                  <p>File Download</p>
                </a>
              </li>";
                }
        ?>

          <li class="nav-item">
                <a href="<?php echo base_url(); ?>administrator/logout" class="nav-link">
                  <i class="far fa-power-off nav-icon"></i>
                  
                  <p>Keluar</p>
                </a>
          </li>

               
          
        </ul>
      </nav>
      </div>