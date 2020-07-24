<?php 
   echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Ubah Pasien</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/ubah_pasien',$attributes); 
           echo "
                  <div class='col-md-12'>
                      <div class='card-body'>
                          <table class='table table-condensed table-bordered'>
                                <tbody>
                                  <input type='hidden' name='id' value='$rows[id_pasien]'>";
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
                            <select name='kec' class='form-control' id='kec'>";
                            if ($rows[id_kec]==0){
                        echo"

                            <option value='0' selected>- Pilih Kecamatan -</option>";}
                            foreach ($kec as $rowss) {
                        if($rows[id_kec]==$rowss[id_kec]){ 
                          echo" <option value='$rowss[id_kec]'selected>$rowss[kec]</option>";}
                          else{
                        echo" <option value='$rowss[id_kec]'>$rowss[kec]</option>";}
                                       }
                            echo "
                            </select>
                          </td>
                    </tr>
                    <tr>
                        <th scope='row'>Usia</th>  
                          <td>
                            <input type='text' class='form-control' value=$rows[usia] name='usia' required>
                          </td>
                    </tr>
                    <tr>
                        <th scope='row'>Jenis Kelamin</th>  
                          <td>
                            <select name='jk' class='form-control' id='jk'>";
                            if ($rows[id_jk]==0){
                        echo"
                      <option value='0' selected>- Pilih Jenis Kelamin -</option>";}
                        foreach ($jk as $rowsssx){
                          if($rows[id_jk]==$rowsssx[id_jk]){
                          echo" <option value='$rowsssx[id_jk]' selected>$rowsssx[jk]</option>";}      
                          else{
                        echo" <option value='$rowsssx[id_jk]'>$rowsssx[jk]</option>";}                   }
                        echo"
                            
                          </td>
                    </tr>

                    <tr>
                    <th scope='row'>Status</th>
                    <td>
                      <select name='status' class='form-control' id='status' click required>";
                      if ($rows[id_status]==0){
                        echo"
                      <option value='0' selected>- Pilih status -</option>";}
                        foreach ($status as $rowsss){
                          if($rows[id_status]==$rowsss[id_status]){
                          echo" <option value='$rowsss[id_status]' selected>$rowsss[status]</option>";}      
                          else{
                        echo" <option value='$rowsss[id_status]'>$rowsss[status]</option>";}                   }                       
                          echo " </td></tr>

                    <tr>
                        <th scope='row'>Jalur Penularan</th>  
                          <td>
                            <input type='text' class='form-control' value=$rows[jalurpenularan] name='jalurpenularan' required>
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
