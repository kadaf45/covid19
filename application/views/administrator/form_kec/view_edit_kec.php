<?php 
   echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Ubah Kecamatan</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/ubah_kec',$attributes); 
           echo "
                  <div class='col-md-12'>
                      <div class='card-body'>
                          <table class='table table-condensed table-bordered'>
                                <tbody>
                                  <input type='hidden' name='id' value='$rows[id_kec]'>";
                    echo"
                    <tr>
                    <th scope='row'>Kabupaten</th>                
                    <td>
                      <select name='kab' class='form-control' id='kab' click required>";
                      if ($rows[id_kab]==0){
                      	echo"
                      <option value='0'selected>- Pilih Kabupaten -</option>";}
                      foreach ($record as $rowss) {
                     		if($rows[id_kab]==$rowss[id_kab]){                     					
                        echo" <option value='$rowss[id_kab]'selected>$rowss[kab]</option>";} 
                       else{
                       	echo" <option value='$rowss[id_kab]'>$rowss[kab]</option>";}
                       								 }
                   						                                                           
                          echo " </td></tr>";
                         
                      echo "                    
                    <tr>
                        <th scope='row'>Kecamatan</th>  
                          <td>
                            <input type='text' class='form-control' name='kec' value='$rows[kec]' required>
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
