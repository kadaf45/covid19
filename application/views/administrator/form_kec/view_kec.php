<section class="content">            
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Kecamatan</h3>
            </div>
                  <div class="box">
                  </div>  
                      <div class="box-header col-md-12">
                      <br>
                      <a class='float-right btn btn-primary' href='<?php echo base_url(); ?>administrator/tambah_kec'>Tambah</a>
                      </div>
                            <form role='form'>
                                  <div class='card-body'>
                                      <table id="example1" class="table table-bordered table-striped">
                                              <thead>
                                                    <tr>
                                                        <th style='width:20px'>No</th>
                                                        <th>Kabupaten</th>
                                                        <th>Kecamatan</th>
                                                        <th style='width:70px'>Aksi</th>
                                                    </tr>
                                              </thead>
                                                      <tbody>
                                                              <?php 
                                                              $no = 1;
                                                              foreach ($record as $row){
                                                              echo "<tr>
                                                                    <td data-title='No'><center>$no</center></td>
                                                                    <td data-title='Kabupaten'><center>$row[kab]</center></td>
                                                                    <td data-title='Kecamatan'><center>$row[kec]</center></td>
                                                                    <td data-title='Aksi'><center>
                                                                      <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/ubah_kec/$row[id_kec]' style='font-size: 0.6rem;'><span class='glyphicon glyphicon-edit'></span></a>
                                                                      <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/hapus_kec/$row[id_kec]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" style='font-size: 0.6rem;' ><span class='glyphicon glyphicon-remove'></span></a>
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