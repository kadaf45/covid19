<section class="content">            
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Kategori</h3>
              </div>
                    <div class="box">
                    </div>
                        <div class="box-header col-md-12">
                            <br>
                                <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>administrator/tambah_kategori">Tambah</a>
                        </div>
                              <form role="form">
                                    <div class="card-body">
                                          <table id="example1" class="table table-bordered table-striped">
                                                      <thead>
                                                              <tr>
                                                                  <th style="width:20px">No</th>
                                                                  <th>Kategori</th>
                                                                  <th>Deskirpsi Kategori</th>
                                                                  <th>Logo Kategori</th>
                                                                  <th style="width:70px">Aksi</th>
                                                              </tr>
                                                      </thead>
                                                <tbody>
                                                      <?php 
                                                      $no = 1;
                                                      foreach ($record as $row){
                                                        if ($row['img_kategori'] == ''){ $foto ='blank.png'; }else{ $foto = $row['img_kategori']; }
                                                      echo "<tr>
                                                                <td data-title='No'>$no</td>
                                                                <td data-title='Kategori'>$row[nm_kategori]</td>
                                                                <td data-title='Kategori'>$row[deskripsi_kategori]</td>
                                                                <td data-title='Kategori'><center><img style='border:1px solid #cecece' width='80px' class='img-box' src='".base_url()."assets/backend/kategori/$foto'></center></td>
                                                                <td data-title='Aksi'>
                                                                    <center>
                                                                            <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/ubah_kategori/$row[id_kategori]' style='font-size: 0.6rem;'><span class='glyphicon glyphicon-edit'></span></a>
                                                                            <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/hapus_kategori/$row[id_kategori]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" style='font-size: 0.6rem;' ><span class='glyphicon glyphicon-remove'></span></a>
                                                                    </center>
                                                                   
                                                                </td>
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