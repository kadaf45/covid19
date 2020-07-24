

    <!-- Main content -->
<?php 
    echo "
    <section class='content'>

      <div class='card card-primary'>
              <div class='card-header'>
                <h3 class='card-title'>Identitas Website</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role='form'>
                <div class='card-body'>";
                  $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/identitaswebsite',$attributes); 
              echo"
                  <div class='row'>
                    <div class='col-md-6'>
                      <div class='form-group'>
                      <input type='hidden' name='id' value='$record[id_identitas]'>

                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Nama Website</span>
                      </div>
                      <input type='text' value='$record[nama_website]' class='form-control' aria-label='Nama Website' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Email</span>
                      </div>
                      <input type='text' value='$record[email]' class='form-control' aria-label='Email' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Domain</span>
                      </div>
                      <input type='text' value='$record[url]' class='form-control' aria-label='Domain' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>No Telp</span>
                      </div>
                      <input type='text' value='$record[no_telp]' class='form-control' aria-label='No Telp' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' id='inputGroup-sizing-sm'>Social Network</span>
                      </div>
                      <input type='text' value='$record[facebook]' class='form-control' aria-label='Social Network' aria-describedby='inputGroup-sizing-sm'>
                      </div>         
                      </div>
                      </div>           
                    <div class='col-md-6'>
                      <div class='form-group'>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Meta Diskripsi</span>
                      </div>
                      <input type='text' value='$record[meta_deskripsi]' class='form-control' aria-label='Meta Diskripsi' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Meta Keyword</span>
                      </div>
                      <input type='text' value='$record[meta_keyword]' class='form-control' aria-label='Meta Keyword' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Meta Diskripsi</span>
                      </div>
                      <input type='text' value='$record[meta_deskripsi]' class='form-control' aria-label='Meta Diskripsi' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Logo</span>
                      </div>
                      <input type='text' value='$record[meta_deskripsi]' class='form-control' aria-label='Logo' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      <div class='input-group input-group-sm mb-3'>
                      <div class='input-group-prepend'>
                      <span class='input-group-text' style='width: 106px;' id='inputGroup-sizing-sm'>Favicon</span>
                      </div>
                      <input type='text' value='$record[favicon]' class='form-control' aria-label='Favicon' aria-describedby='inputGroup-sizing-sm'>
                      </div>
                      

                    </div>
                  </div>
                </div>
              </form>

                <div class='card-footer'>
                  <button type='submit' class='btn btn-info'>Ubah</button>
                  <button type='submit' class='btn btn-default float-right'>Batal</button>
                </div>
      </div>

    </section>";
            echo form_close();
