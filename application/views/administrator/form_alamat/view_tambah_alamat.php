<?php 
echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Tambah Alamat</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_alamat',$attributes); 
          echo "
                  <div class='col-md-12'>
                      <div class='card-body'>
                          <table class='table table-condensed table-bordered'>
                                <tbody>
                                  <input type='hidden' name='id' value=''>
                    <tr>
                    <th scope='row'>Kategori</th>                
                    <td>
                      <select name='kategori' class='form-control' id='kategori' click required>
                      <option value='' selected>- Pilih Kategori -</option>";
                        foreach ($record as $row){
                          echo" <option value='$row[id_kategori]'>$row[nm_kategori]</option>";                      }                                                
                          echo " </td></tr>";
                         
                      echo "                    
                    <tr>
                        <th scope='row'>Nama Aplikasi</th>  
                          <td>
                            <input type='text' class='form-control' name='nmaplikasi' required>
                          </td>
                    </tr>
                    <tr>
                        <th scope='row'>Deskripsi Aplikasi</th>  
                          <td>
                            <input type='text' class='form-control' name='detail' required>
                          </td>
                    </tr> 

                    <tr>
                      <th scope='row'>URL</th>  
                        <td>
                          <input type='text' class='form-control' name='url' required>
                        </td>
                    </tr> 
                                                                      
                  </tbody>
                  </table>
                  </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url()."administrator/daf_alamat'><button type='button' class='btn btn-default float-right'>Batal</button></a>
                    
                  </div>
            <br>
                          </div>
                      </div>
          </div>
      </section>";
             
            echo form_close();
