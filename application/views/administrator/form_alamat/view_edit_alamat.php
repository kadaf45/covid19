<?php 
   echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Ubah Alamat</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/ubah_alamat',$attributes); 
           echo "
                  <div class='col-md-12'>
                      <div class='card-body'>
                          <table class='table table-condensed table-bordered'>
                                <tbody>
                                  <input type='hidden' name='id' value='$rows[id_alamat]'>";
                    echo"
                    <tr>
                    <th scope='row'>Kategori</th>                
                    <td>
                      <select name='kategori' class='form-control' id='kategori' click required>";
                      if ($rows[id_kategori]==0){
                      	echo"
                      <option value='0'selected>- Pilih Kategori -</option>";}
                      foreach ($record as $rowss) {
                     		if($rows[id_kategori]==$rowss[id_kategori]){                     					
                        echo" <option value='$rowss[id_kategori]'selected>$rowss[nm_kategori]</option>";} 
                       else{
                       	echo" <option value='$rowss[id_kategori]'>$rowss[nm_kategori]</option>";}
                       								 }
                   						                                                           
                          echo " </td></tr>";
                         
                      echo "                    
                    <tr>
                        <th scope='row'>Nama Aplikasi</th>  
                          <td>
                            <input type='text' class='form-control' name='nmaplikasi' value='$rows[nm_almt]' required>
                          </td>
                    </tr>
                    <tr>
                        <th scope='row'>Deskripsi Aplikasi</th>  
                          <td>
                            <input type='text' class='form-control' name='detail' value='$rows[detail]' required>
                          </td>
                    </tr> 

                    <tr>
                      <th scope='row'>URL</th>  
                        <td>
                          <input type='text' class='form-control' name='url' value='$rows[link]' required>
                        </td>
                    </tr> 
                    <tr>
                      
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
