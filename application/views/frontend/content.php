<section>
 <div class="preloader">
        <div class="loader"><img src="<?php echo base_url(); ?>assets/backend/loader/loading.png" alt=""></div>
    </div>

    <div id="intro-video-container">
        <div class="caption">
            <br/>
            <br/>
            <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>assets/backend/header/header.png" alt=""></a> 
            <!-- <form id="w0" action="/search/filter" method="post">
                <input type="hidden" name="frontend-csrf" value="VnV4VlMyWEQUH0luZUszMTkSAS8GcGpwAg81IBlCExYdKiwdB0hoAQ==">
                <div class="input-group intro-searchform">
                    <input type="text" class="form-control" name="keywords" value="" size="50" placeholder="Apa yang Anda Cari?" required="" style="color:black;"> <span class="input-group-btn">
                        <button class="btn btn-success" style="background:#135297;" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form> -->
            <br/>
            <br/>
            <br/>
             <?php
                $no = 1; 
                $terbaru = $this->model_utama->view('ref_kategori');
                $terbaru1 = $this->model_utama->view('daf_alamat');
                
                ?>
            <div class="6111 cpanel colorfull">
                 <?php 
    foreach ($terbaru->result_array() as $r1) {
        if ($r1['img_kategori'] ==''){ $foto_slide = 'no-image.jpg'; }else{ $foto_slide = $r1['img_kategori']; }
        echo"
                <li>
                    <div class='cpanel-item'>
                        <a href='#' class='icon' data-toggle='modal' data-target='#$r1[nm_kategori]'>
                            <img src='".base_url()."assets/backend/kategori/$foto_slide' alt=''>
                        </a>
                            <div class='title'>$r1[nm_kategori]</div>
                            <div class='modal fade' id='$r1[nm_kategori]' style='display: none;' aria-hidden='true'>
                                <div class='modal-dialog'>     
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                              <h4 class='modal-title'>$r1[deskripsi_kategori]</h4>
                                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>×</span>
                                              </button>
                                        </div>
                                                <div class='modal-body'>
                                                ";
                                            foreach ($terbaru1->result_array() as $r2) {
                                                if ( $r1['id_kategori'] == $r2['id_kategori']){
                                                echo"
                                                	<table>
		                                                	<tr>
			                                                    <td>
			                                                    	<a href='$r2[link]' target='_blank'>$r2[nm_almt]</a>                          
			                                                    </td>
		                                                    </tr>
                                                    </table>

                                                                      ";
                                                $no++;
                                            }                   
                                                }
                                            echo"
                                                </div>
                                            <div class='modal-footer'></div>
                                    </div>
                                </div>
                            </div>            
                    </div>
                </li>";
                $no++;
                    } 
                 ?>
            </div>
            <ul class="600 cpanel colorfull">
            </ul>
            <ul class="5-60 cpanel colorfull" style="margin-left:110px;">
            </ul>
            <ul class="6-11-1 cpanel colorfull" style="margin-left:110px;">
            </ul>
            <ul class="6-17-1 cpanel colorfull" style="margin-left:110px;">
            </ul>
            <div class="clearfix"></div>
            <br/>
            <br/>
            <br/>
            <br/>
            <a href="http://portal.bangkabaratkab.go.id" target="_blank" class="enter-btn">MASUK WEB UTAMA</a>
        </div>

    </div>
</section>