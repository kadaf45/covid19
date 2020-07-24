<?php 
echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Tambah Pasien</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_pasien',$attributes); 
          echo "
                  <div class='col-md-12'>
                      <div class='card-body'>
                          <table class='table table-condensed table-bordered'>
                                <tbody>
                                  <input type='hidden' name='id' value=''>
                    <tr>
                    <th scope='row'>Pilih Kabupaten</th>                
                    <td>
                      <select name='kab' class='form-control' id='kab' click required>
                      <option value='' selected>- Pilih Kabupaten -</option>";
                        foreach ($record as $row){
                          echo" <option value='$row[id_kab]'>$row[kab]</option>";                      }                                                
                          echo " </td></tr>";
                         
                      echo "                    
                    <tr>
                        <th scope='row'>Kecamatan (Auto)</th>  
                          <td>
                            <select name='kec' class='form-control' id='kec' click required>
                            <option value='' selected>- Pilih Kecamatan -</option></select>
                          </td>
                    </tr>
                    <tr>
                        <th scope='row'>Usia</th>  
                          <td>
                            <input type='text' class='form-control' name='usia' required>
                          </td>
                    </tr>
                    <tr>
                        <th scope='row'>Jenis Kelamin</th>  
                          <td>
                            <select name='jk' class='form-control' id='jk' required>
                            <option value='' selected>- Pilih Jenis Kelamin -</option>";
                            foreach ($jk as $row){
                          echo" <option value='$row[id_jk]'>$row[jk]</option>";                      }                                                
                          echo " </td></tr>";
                         
                      echo " 
                    
                            </select>
                          </td>
                    </tr>

                    <tr>
                    <th scope='row'>Status</th>
                    <td>
                      <select name='status' class='form-control' id='status' click required>
                      <option value='' selected>- Pilih status -</option>";
                        foreach ($rows as $row){
                          echo" <option value='$row[id_status]'>$row[status]</option>";                      }                                                
                          echo " </td></tr>

                    <tr>
                        <th scope='row'>Jalur Penularan</th>  
                          <td>
                            <input type='text' class='form-control' name='jalurpenularan' required>
                          </td>
                    </tr>
                    
                                                                      
                  </tbody>
                  </table>
                  </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url()."administrator/pasien'><button type='button' class='btn btn-default float-right'>Batal</button></a>
                    
                  </div>
            <br>
                          </div>
                      </div>
          </div>
      </section>";
             
            echo form_close();
