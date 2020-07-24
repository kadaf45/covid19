<section class="content">            
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Background</h3>
              </div>
                    <div class="box">
                    </div>
                        <div class="box-header col-md-12">
                            <br>
                                <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>administrator/tambah_background">Tambah</a>

                        </div>
                             

                              <form role="form">
                                    <div class="card-body">
                                          <table id="example1" class="table table-bordered table-striped ">
                                                      <thead>
                                                              <tr>
                                                                  <th style="width:20px">No</th>
                                                                  <th>Nama Background</th>
                                                                  <th>Background</th>
                                                                  <th style="width:70px">Aksi</th>
                                                              </tr>
                                                      </thead>
                                                <tbody>
                                                      <?php 
                                                      $no = 1;
                                                      foreach ($record as $row){
                                                        if ($row['img_background'] == ''){ $foto ='blank.png'; }else{ $foto = $row['img_background']; }
                                                      echo "<tr>
                                                                <td data-title='No'>$no</td>
                                                                <td data-title='Nama Background'>$row[nm_background]</td>
                                                                <td data-title='Background'><center><img style='border:1px solid #cecece' width='80px' class='img-box' src='".base_url()."assets/backend/background/$foto'></center></td>
                                                                <td data-title='Aksi'>
                                                                    <center>
                                                                            <a class='btn btn-success btn-xs' title='Ubah Data' href='".base_url()."administrator/ubah_background/$row[id_background]'><span class='glyphicon glyphicon-edit'></span>
                                                                            </a>
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