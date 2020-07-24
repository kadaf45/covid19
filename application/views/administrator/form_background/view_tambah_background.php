<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style type="text/css">
    img {
        max-width: 180px;
    }
</style>
<?php


echo " <section class='content'>
          <div class='card card-primary'>
                <div class='card-header'>
                  <h3 class='card-title'>Tambah Background</h3>
                </div>
                      <div class='box'>
                          <div class='box-header'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/tambah_background', $attributes);

echo "

                                  <div class='col-md-12'>
                                            <div class='card-body'>
                                                <table class='table table-condensed table-bordered'>
                                                      <tbody>
                                                            <input type='hidden' name='id' value=''>
                                                                <tr>
                                                                      <th scope='row'>Nama Background</th>                
                                                                        <td>
                                                                            <input type='text' class='form-control' name='nmbackground' required>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pilih File Background</th>                
                                                                        <td>
                                                                            <input type='file' class='form-control' name='gambar' onchange='readURL(this);'' / required >
                                                                        </td>
                                                                </tr> 
                                                                <tr>                 
                                                                <th scope='row'>Background Dipilih</th> 
                                                                <td for='id'>
                                                                <img id='blah' src='http://placehold.it/180' alt='your image' />

                                                                </td> 
                                                                </tr>                                  
                                                      </tbody>
                                                </table>
                                            </div>
                                    </div>  
                                  <div class='col-md-12'>
                                        <div class='box-footer'>
                                            <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                                            <a href='" . base_url() . "administrator/background'>
                                            <button type='button' class='btn btn-info float-right'>Batal</button></a>    
                                        </div>

                                  </div>
                                  <br>
                          </div>
                      </div>
          </div>
      </section>";

echo form_close();
