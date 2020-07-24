<section class="content">            
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Data Kasus</h3>
              </div>
                    <div class="box">
                    </div>
                        <div class="box-header col-md-12">
                            <!-- <br>
                                <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>administrator/tambah_status">Tambah</a> -->
                        </div>
                              <form role="form">
                                    <div class="card-body">
                                          <table id="example1" class="table table-bordered table-striped">
                                                      <thead>
                                                              <tr>
                                                                  <th style="width:20px">No</th>
                                                                  <th>Kode Wilayah</th>
                                                                  <th>Total ODP</th>
                                                                  <th>Total PDP</th>
                                                                  <th>Total Terkonfirmasi</th>
                                                                  <th>Total Sembuh</th>
                                                                  <th>Total Meninggal</th>
                                                                  <th style="width:70px">Aksi</th>
                                                              </tr>
                                                      </thead>
                                                <tbody>
                                                      <?php 
                                                      $no = 1;
                                                      foreach ($record as $row){
                                              
                                                      echo "<tr>
                                                                <td data-title='No'>$no</td>
                                                                <td data-title='kdwil'>$row[Kode_wilayah]</td>
                                                                <td data-title='totodp'>$row[total_odp]</td>
                                                                <td data-title='totpdp'>$row[total_pdp]</td>
                                                                <td data-title='totkonf'>$row[total_terkonfirmasi]</td>
                                                                <td data-title='totsem'>$row[total_sembuh]</td>
                                                                <td data-title='totmng'>$row[total_meninggal]</td>
                                                                <td data-title='Aksi'>
                                                                    <center>
                                                                            <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/ubah_kasus/$row[id_kasus]' style='font-size: 0.6rem;'><span class='glyphicon glyphicon-edit'></span></a>
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