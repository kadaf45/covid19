<section class="content">            
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Alamat Website</h3>
            </div>
                  <div class="box">
                  </div>  
                      <div class="box-header col-md-12">
                      <br>
                      <a class='float-right btn btn-primary' href='<?php echo base_url(); ?>administrator/tambah_alamat'>Tambah</a>
                      </div>
                            <form role='form'>
                                  <div class='card-body'>
                                      <table id="example1" class="table table-bordered table-striped">
                                              <thead>
                                                    <tr>
                                                        <th style='width:20px'>No</th>
                                                        <th>Kategori</th>
                                                        <th>Nama Aplikasi</th>
                                                        <th>URL</th>
                                                        <th style='width:70px'>Aksi</th>
                                                    </tr>
                                              </thead>
                                                      <tbody>
                                                              <?php 
                                                              $no = 1;
                                                              foreach ($record as $row){
                                                              echo "<tr>
                                                                    <td data-title='No'><center>$no</center></td>
                                                                    <td data-title='Kategori'><center>$row[nm_kategori]</center></td>
                                                                    <td data-title='Nama Aplikasi'><center>$row[nm_almt]</center></td>
                                                                    <td data-title='URL'><center>$row[link]</center></td>
                                                                    
                                                                    <td data-title='Aksi'><center>
                                                                      <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/ubah_alamat/$row[id_alamat]' style='font-size: 0.6rem;'><span class='glyphicon glyphicon-edit'></span></a>
                                                                      <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/hapus_alamat/$row[id_alamat]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" style='font-size: 0.6rem;' ><span class='glyphicon glyphicon-remove'></span></a>
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