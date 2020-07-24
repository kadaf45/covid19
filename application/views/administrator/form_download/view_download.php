<section class="content">            
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Download File</h3>
              </div>
                    <div class="box">
                    </div>
                        <div class="box-header col-md-12">
                            <br>
                                <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>administrator/tambah_download">Tambah</a>
                        </div>

                        <form role="form">
                                    <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Judul</th>
                        <th>Link</th>
                        <th>Hits</th>
                        <th>Tanggal</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    $tgl_Posting = tgl_indo($row['tgl_posting']);
                    echo "<tr><td>$no</td>
                              <td>$row[judul]</td>
                              <td><a title='$row[nama_file]' target='_BLANK' href='".base_url()."download/file/$row[nama_file]'>Download</a></td>
                              <td>$row[hits] Kali</td>
                              <td>$tgl_Posting</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_download/$row[id_download]' style='font-size: 0.6rem;'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_download/$row[id_download]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" style='font-size: 0.6rem;'><span class='glyphicon glyphicon-remove'></span></a>
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