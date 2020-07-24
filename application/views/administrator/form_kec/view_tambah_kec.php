<?php 
echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Tambah Kecamatan</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_kec',$attributes); 
          echo "
                  <div class='col-md-12'>
                      <div class='card-body'>
                          <table class='table table-condensed table-bordered'>
                                <tbody>
                                  <input type='hidden' name='id' value=''>
                    <tr>
                    <th scope='row'>Kabupaten</th>                
                    <td>
                      <select name='kab' class='form-control' id='kab' click required>
                      <option value='' selected>- Pilih Kabupaten -</option>";
                        foreach ($record as $row){
                          echo" <option value='$row[id_kab]'>$row[kab]</option>";                      }                                                
                          echo " </td></tr>";
                         
                      echo "                    
                    <tr>
                        <th scope='row'>Kecamatan</th>  
                          <td>
                            <input type='text' class='form-control' name='kec' required>
                          </td>
                    </tr>
                    
                                                                      
                  </tbody>
                  </table>
                  </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url()."administrator/ref_kec'><button type='button' class='btn btn-default float-right'>Batal</button></a>
                    
                  </div>
            <br>
                          </div>
                      </div>
          </div>
      </section>";
             
            echo form_close();
