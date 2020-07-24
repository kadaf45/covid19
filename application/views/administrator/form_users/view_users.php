    <section class="content">
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Manajemen Users</h3>
                </div>
                <div class="box">
                 <div class="box-header col-md-12">
                  <a class='pull-right btn btn-primary btn-sm' style='margin-top: 20px; margin-right: 20px;' href='<?php echo base_url(); ?>administrator/tambah_manajemenuser'>Tambah</a>
                </div><!-- /.box-header -->
                <form role="form">
                    <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Blokir</th>
                        <th>Level</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    if ($row['foto'] == ''){ $foto ='blank.png'; }else{ $foto = $row['foto']; }
                    echo "<tr><td>$no</td>
                              <td>$row[username]</td>
                              <td>$row[nama_lengkap]</td>
                              <td>$row[email]</td>
                              <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='".base_url()."assets/backend/foto_user/$foto'></td>
                              <td>$row[blokir]</td>
                              <td>$row[level]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_manajemenuser/$row[username]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_manajemenuser/$row[username]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
                    </div> 
                </form>
          </div>
    </section>
  