
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

<style type="text/css">
  img{
  max-width:180px;
}
</style>
<?php 


echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Status</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
                              $attributes = array('class'=>'form-horizontal','role'=>'form');
                              echo form_open_multipart('administrator/tambah_status',$attributes); 

                                  echo "

                                  <div class='col-md-12'>
                                            <div class='card-body'>
                                                <table class='table table-condensed table-bordered'>
                                                      <tbody>
                                                            <input type='hidden' name='id' id='id' value=''>
                                                                <tr>
                                                                      <th scope='row'>Status</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='status' id='status' required value=''>
                                                                        </td>
                                                                </tr>     
                                                                     
                                                                                                                             
                                                      </tbody>
                                                </table>
                                            </div>
                                    </div>  
                                  <div class='col-md-12'>
                                        <div class='box-footer'>
                                            <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                                            <a href='".base_url()."administrator/ref_status'>
                                            <button type='button' class='btn btn-info float-right'>Batal</button></a>    
                                        </div>

                                  </div>
                                  <br>
                          </div>
                      </div>
          </div>
      </section>";
             
            echo form_close();
