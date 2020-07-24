<script type="text/javascript">
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>


<?php 
  echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Edit Kasus</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
                              $attributes = array('class'=>'form-horizontal','role'=>'form');
                              echo form_open_multipart('administrator/ubah_kasus',$attributes); 

                                  echo "

                                  <div class='col-md-12'>
                                            <div class='card-body'>
                                                <table class='table table-condensed table-bordered'>
                                                      <tbody>
                                                            <input type='hidden' name='id' id='id' value='$rows[id_kasus]'>
                                                                <tr>
                                                                      <th scope='row'>Total ODP</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='total_odp' id='total_odp' required value='$rows[total_odp]'>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                      <th scope='row'>Total PDP</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='total_pdp' id='total_pdp' required value='$rows[total_pdp]'>
                                                                        </td>
                                                                </tr> 
                                                                <tr>
                                                                      <th scope='row'>Total Terkonfirmasi</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='total_terkonfirmasi' id='total_terkonfirmasi' required value='$rows[total_terkonfirmasi]'>
                                                                        </td>
                                                                </tr> 
                                                                <tr>
                                                                      <th scope='row'>Total Sembuh</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='total_sembuh' id='total_sembuh' required value='$rows[total_sembuh]'>
                                                                        </td>
                                                                </tr> 
                                                                <tr>
                                                                      <th scope='row'>Total Meninggal</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='total_meninggal' id='total_meninggal' required value='$rows[total_meninggal]'>
                                                                        </td>
                                                                </tr>                                                                             
                                                      </tbody>
                                                </table>
                                            </div>
                                    </div>  
                                  <div class='col-md-12'>
                                        <div class='box-footer'>
                                            <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                                            <a href='".base_url()."administrator/total_kasus'>
                                            <button type='button' class='btn btn-info float-right'>Batal</button></a>    
                                        </div>

                                  </div>
                                  <br>
                          </div>
                      </div>
          </div>
      </section>";
            echo form_close();
