<section class="content">            
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Kabupaten</h3>
              </div>
                    <div class="box">
                    </div>
                        <div class="box-header col-md-12">
                            <br>
                                <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>administrator/tambah_kab">Tambah</a>
                        </div>
                              <form role="form">
                                    <div class="card-body">
                                          <table id="example1" class="table table-bordered table-striped">
                                                      <thead>
                                                              <tr>
                                                                  <th style="width:20px">No</th>
                                                                  <th>Kabupaten</th>
                                                                  <th style="width:70px">Aksi</th>
                                                              </tr>
                                                      </thead>
                                                <tbody>
                                                      <?php 
                                                      $no = 1;
                                                      foreach ($record as $row){
                                              
                                                      echo "<tr>
                                                                <td data-title='No'>$no</td>
                                                                <td data-title='Kabupaten'>$row[kab]</td>
                                                                <td data-title='Aksi'>
                                                                    <center>
                                                                            <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/ubah_kab/$row[id_kab]' style='font-size: 0.6rem;'><span class='glyphicon glyphicon-edit'></span></a>
                                                                            <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/hapus_kab/$row[id_kab]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" style='font-size: 0.6rem;' ><span class='glyphicon glyphicon-remove'></span></a>
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