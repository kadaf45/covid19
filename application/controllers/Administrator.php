<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	public function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->model_app->cek_login($username,$password,'users');
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level'],
                                   'id_session'=>$row['id_session']));

				redirect('administrator/home');
			}else{
				$data['title'] = 'Username atau Password salah!';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In COVID-19';
			$this->load->view('administrator/view_login',$data);
		}
	}

    function reset_password(){
        if (isset($_POST['submit'])){
            $usr = $this->model_app->edit('users', array('id_session' => $this->input->post('id_session')));
            if ($usr->num_rows()>=1){
                if ($this->input->post('a')==$this->input->post('b')){
                    $data = array('password'=>hash("sha512", md5($this->input->post('a'))));
                    $where = array('id_session' => $this->input->post('id_session'));
                    $this->model_app->update('users', $data, $where);

                    $row = $usr->row_array();
                    $this->session->set_userdata('upload_image_file_manager',true);
                    $this->session->set_userdata(array('username'=>$row['username'],
                                       'level'=>$row['level'],
                                       'id_session'=>$row['id_session']));
                    redirect('administrator/home');
                }else{
                    $data['title'] = 'Password Tidak sama!';
                    $this->load->view('administrator/view_reset',$data);
                }
            }else{
                $data['title'] = 'Terjadi Kesalahan!';
                $this->load->view('administrator/view_reset',$data);
            }
        }else{
            $this->session->set_userdata(array('id_session'=>$this->uri->segment(3)));
            $data['title'] = 'Reset Password';
            $this->load->view('administrator/view_reset',$data);
        }
    }

    function lupapassword(){
        if (isset($_POST['lupa'])){
            $email = strip_tags($this->input->post('email'));
            $cekemail = $this->model_app->edit('users', array('email' => $email))->num_rows();
            if ($cekemail <= 0){
                $data['title'] = 'Alamat email tidak ditemukan';
                $this->load->view('administrator/view_login',$data);
            }else{
                $iden = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
                $usr = $this->model_app->edit('users', array('email' => $email))->row_array();
                $this->load->library('email');

                $tgl = date("d-m-Y H:i:s");
                $subject      = 'Lupa Password ...';
                $message      = "<html><body>
                                    <table style='margin-left:25px'>
                                        <tr><td>Halo $usr[nama_lengkap],<br>
                                        Seseorang baru saja meminta untuk mengatur ulang kata sandi Anda di <span style='color:red'>$iden[url]</span>.<br>
                                        Klik di sini untuk mengganti kata sandi Anda.<br>
                                        Atau Anda dapat copas (Copy Paste) url dibawah ini ke address Bar Browser anda :<br>
                                        <a href='".base_url()."administrator/reset_password/$usr[id_session]'>".base_url()."administrator/reset_password/$usr[id_session]</a><br><br>

                                        Tidak meminta penggantian ini?<br>
                                        Jika Anda tidak meminta kata sandi baru, segera beri tahu kami.<br>
                                        Email. $iden[email], No Telp. $iden[no_telp]</td></tr>
                                    </table>
                                </body></html> \n";
                
                $this->email->from($iden['email'], $iden['nama_website']);
                $this->email->to($usr['email']);
                $this->email->cc('');
                $this->email->bcc('');

                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();
                
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $data['title'] = 'Password terkirim ke '.$usr['email'];
                $this->load->view('administrator/view_login',$data);
            }
        }else{
            redirect('administrator');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('');
    }

    function home(){
        if ($this->session->level=='admin'){
            $data['title'] = title();
            $data['description'] = description();
            $data['keywords'] = keywords();
		  $this->template->load('administrator/template','administrator/view_home_admin',$data);
        }else{
          $data['title'] = title();
          $data['users'] = $this->model_app->view_where('users',array('username'=>$this->session->username))->row_array();
          $data['modul'] = $this->model_app->view_join_one('users','users_modul','id_session','id_umod','DESC');
          $this->template->load('administrator/template','administrator/view_home_users',$data);
        }
	}

    function identitaswebsite(){
    cek_session_akses('identitaswebsite',$this->session->id_session);
    if (isset($_POST['submit'])){
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('j');
            $hasil=$this->upload->data();


            if ($hasil['file_name']==''){
                $data = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                    'email'=>$this->db->escape_str($this->input->post('b')),
                    'url'=>$this->db->escape_str($this->input->post('c')),
                    'facebook'=>$this->input->post('d'),
                    'no_telp'=>$this->db->escape_str($this->input->post('f')),
                    'meta_deskripsi'=>$this->input->post('g'),
                    'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                    'maps'=>$this->input->post('i'));
            }else{
                $data = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                    'email'=>$this->db->escape_str($this->input->post('b')),
                    'url'=>$this->db->escape_str($this->input->post('c')),
                    'facebook'=>$this->input->post('d'),
                    'no_telp'=>$this->db->escape_str($this->input->post('f')),
                    'meta_deskripsi'=>$this->input->post('g'),
                    'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                    'favicon'=>$hasil['file_name'],
                    'maps'=>$this->input->post('i'));
            }
            $where = array('id_identitas' => $this->input->post('id'));
            $this->model_app->update('identitas', $data, $where);

            redirect('administrator/identitaswebsite');
        }else{
            $proses = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
            $data = array('record' => $proses);
            $this->template->load('administrator/template','administrator/form_identitas/view_identitas',$data);
        }
    }

    function tambah_manajemenuser(){
        cek_session_akses('manajemenuser',$this->session->id_session);
        $id = $this->session->username;
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }else{
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }
            $this->model_app->insert('users',$data);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              $sess = md5($this->input->post('a')).'-'.date('YmdHis');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$sess,
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

            redirect('administrator/edit_manajemenuser/'.$this->input->post('a'));
        }else{
            $proses = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
            $data = array('record' => $proses);
            $this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
        }
    }

    function edit_manajemenuser(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            if($this->session->level=='admin'){
                $where = array('username' => $this->input->post('id'));
            }elseif ($this->session->username==$this->input->post('id')){
                $where = array('username' => $this->session->username);
            }
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

            redirect('administrator/edit_manajemenuser/'.$this->input->post('id'));
        }else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
                $this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
            }else{
                redirect('administrator/edit_manajemenuser/'.$this->session->username);
            }
        }
    }

    function delete_manajemenuser(){
        cek_session_akses('manajemenuser',$this->session->id_session);
        $id = array('username' => $this->uri->segment(3));
        $this->model_app->delete('users',$id);
        redirect('administrator/manajemenuser');
    }

    function delete_akses(){
        cek_session_admin();
        $id = array('id_umod' => $this->uri->segment(3));
        $this->model_app->delete('users_modul',$id);
        redirect('administrator/edit_manajemenuser/'.$this->uri->segment(4));
    }

    

    // Controller Modul Modul

    function manajemenmodul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('modul','id_modul','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('modul',array('username'=>$this->session->username),'id_modul','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_modul/view_modul',$data);
    }

    function tambah_manajemenmodul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $this->model_app->insert('modul',$data);
            redirect('administrator/manajemenmodul');
        }else{
            $this->template->load('administrator/template','administrator/mod_modul/view_modul_tambah');
        }
    }

    function edit_manajemenmodul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $where = array('id_modul' => $this->input->post('id'));
            $this->model_app->update('modul', $data, $where);
            redirect('administrator/manajemenmodul');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('modul', array('id_modul' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('modul', array('id_modul' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_modul/view_modul_edit',$data);
        }
    }

    function delete_manajemenmodul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_modul' => $this->uri->segment(3));
        }else{
            $id = array('id_modul' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('modul',$id);
        redirect('administrator/manajemenmodul');
    }

    function kategori(){
       cek_session_akses('kategori',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_ordering('ref_kategori','id_kategori','ASC');
    }else{
        $data['record'] = $this->model_app->view_where_ordering('ref_kategori',array('username'=>$this->session->username),'id_kategori','ASC');
    }
    $this->template->load('administrator/template','administrator/form_kategori/view_kategori',$data);
    }

    function tambah_kategori(){
    cek_session_akses('kategori',$this->session->id_session);
    if (isset($_POST['submit'])){
          $config['upload_path'] = 'assets/backend/kategori/';
          $config['allowed_types'] = 'png';
          $config['max_size'] = '3000'; // kb
          $this->load->library('upload', $config);
          $this->upload->do_upload('img_kategori');
          $gbr = $this->upload->data();

          if ($gbr['file_name']==''){
                  $data = array('id_kategori'=>$this->db->escape_str($this->input->post('id')),
                                'nm_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                'deskripsi_kategori'=>$this->db->escape_str($this->input->post('subkategori')),
                                'username'=>$this->session->username);
                }else{
                 $data = array('id_kategori'=>$this->db->escape_str($this->input->post('id')),
                                'nm_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                'deskripsi_kategori'=>$this->db->escape_str($this->input->post('subkategori')),
                                'img_kategori'=>$gbr['file_name'],
                                'username'=>$this->session->username);
                }
                $this->model_app->insert('ref_kategori',$data);
                redirect('administrator/kategori');
        }else{
             $proses = $this->model_app->view_ordering('ref_kategori','id_kategori','ASC');
             $data = array('record' => $proses);
             $this->template->load('administrator/template','administrator/form_kategori/view_tambah_kategori',$data);
        }
    }

    function ubah_kategori(){
        cek_session_akses('kategori',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
             $row =$this->model_app->view_where('ref_kategori',array('id_kategori'=>$this->input->post('id')))->row();
             $config['upload_path'] = 'assets/backend/kategori/';
             $config['allowed_types'] = 'png';
             $config['max_size'] = '3000'; // kb
             $this->load->library('upload', $config);
             // 'img_kategori is value post name file'
             $this->upload->do_upload('img_kategori');
             $gbr = $this->upload->data();

            if ($gbr['file_name']==''){
                  $data = array('id_kategori'=>$this->db->escape_str($this->input->post('id')),
                                'nm_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                'deskripsi_kategori'=>$this->db->escape_str($this->input->post('subkategori')),
                                'username'=>$this->session->username);
                }else{
                 $data = array('id_kategori'=>$this->db->escape_str($this->input->post('id')),
                                'nm_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                'deskripsi_kategori'=>$this->db->escape_str($this->input->post('subkategori')),
                                'img_kategori'=>$gbr['file_name'],
                                'username'=>$this->session->username);
                  unlink('assets/backend/kategori/'.$row->img_kategori);
                }
                 $where = array('id_kategori' => $this->input->post('id'));
                
                 $this->model_app->update('ref_kategori', $data, $where);
                 redirect('administrator/kategori');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('ref_kategori', array('id_kategori' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('ref_kategori', array('id_kategori' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/form_kategori/view_edit_kategori',$data);
        }
    }

    function hapus_kategori(){
        cek_session_akses('kategori',$this->session->id_session);
        $id =$this->model_app->view_where('ref_kategori',array('id_kategori'=>$this->uri->segment(3)))->row_array();
        unlink('assets/backend/kategori/'.$id['img_kategori']);
        $this->model_app->delete('ref_kategori',$id);
        redirect('administrator/kategori');
    }

    function daf_alamat(){
       cek_session_akses('alamat',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_join_one('ref_kategori','daf_alamat','id_kategori','id_alamat','ASC');
    }else{
        $data['record'] = $this->model_app->view_where_ordering('daf_alamat',array('username'=>$this->session->username),'id_alamat','ASC');
    }
    $this->template->load('administrator/template','administrator/form_alamat/view_alamat',$data);
    }

    function tambah_alamat(){
    cek_session_akses('alamat',$this->session->id_session);
        if (isset($_POST['submit'])){
                $data = array('id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                'id_alamat'=>$this->db->escape_str($this->input->post('id')),
                                'nm_almt'=>$this->db->escape_str($this->input->post('nmaplikasi')),
                                'link'=>$this->db->escape_str($this->input->post('url')),
                                'detail'=>$this->db->escape_str($this->input->post('detail')),
                                'username'=>$this->session->username);
                $this->model_app->insert('daf_alamat',$data);
                redirect('administrator/daf_alamat');
        }else{
             $proses = $this->model_app->view_ordering('ref_kategori','id_kategori','ASC');
             $data = array('record' => $proses);
             $this->template->load('administrator/template','administrator/form_alamat/view_tambah_alamat',$data);
             }
    }

    function ubah_alamat(){
        cek_session_akses('alamat',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
                   $data = array('id_kategori'=>$this->db->escape_str($this->input->post('kategori')),
                                'id_alamat'=>$this->db->escape_str($this->input->post('id')),
                                'nm_almt'=>$this->db->escape_str($this->input->post('nmaplikasi')),
                                'link'=>$this->db->escape_str($this->input->post('url')),
                                'detail'=>$this->db->escape_str($this->input->post('detail')),
                                'username'=>$this->session->username);
            $where = array('id_alamat' => $this->input->post('id'));
            $this->model_app->update('daf_alamat', $data, $where);
            redirect('administrator/daf_alamat');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('daf_alamat', array('id_alamat' => $id))->row_array();
                 $proses1 = $this->model_app->view_ordering('ref_kategori','id_kategori','ASC');
            }else{
                $proses = $this->model_app->edit('daf_alamat', array('id_alamat' => $id, 'username' => $this->session->username))->row_array();
                $proses1 = $this->model_app->view_ordering('ref_kategori','id_kategori','ASC');
            }
            $data = array('rows' => $proses,'record' =>$proses1);
            $this->template->load('administrator/template','administrator/form_alamat/view_edit_alamat',$data);
        }
    }

    function hapus_alamat(){
        cek_session_akses('alamat',$this->session->id_session);
        $id = array('id_alamat' => $this->uri->segment(3));
        $this->model_app->delete('daf_alamat',$id);
        redirect('administrator/daf_alamat');
    }

    function background(){
       cek_session_akses('background',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_ordering('ref_background','id_background','ASC');
    }else{
        $data['record'] = $this->model_app->view_where_ordering('ref_background',array('username'=>$this->session->username),'id_background','ASC');
    }
    $this->template->load('administrator/template','administrator/form_background/view_background',$data);
    }

    function tambah_background(){
    cek_session_akses('background',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'assets/backend/background/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $gbr = $this->upload->data();
            //         //compress gambar
            // $config['image_library']='gd2';
            // $config['source_image']='assets/backend/background/'.$gbr['file_name'];
            // $config['create_thumb']= FALSE;
            // $config['maintain_ratio']= FALSE;
            // $config['quality']= '50%';
            // $config['width']= 1024;
            // $config['height']= 786;
            // $config['new_image']= 'assets/backend/background/'.$gbr['file_name'];
            // $this->load->library('image_lib', $config);
            // $this->image_lib->resize();
          
               if ($gbr['file_name']==''){
                  $data = array('id_background'=>$this->db->escape_str($this->input->post('id')),
                                'nm_background'=>$this->db->escape_str($this->input->post('nmbackground')),
                                'username'=>$this->session->username);
                }else{
                  $data = array('id_background'=>$this->db->escape_str($this->input->post('id')),
                                'nm_background'=>$this->db->escape_str($this->input->post('nmbackground')),
                                'img_background'=>$gbr['file_name'],
                                'username'=>$this->session->username);
                }
                $this->model_app->insert('ref_background',$data);
                redirect('administrator/background');
        }else{
             $proses = $this->model_app->view_ordering('ref_background','id_background','ASC');
             $data = array('record' => $proses);
             $this->template->load('administrator/template','administrator/form_background/view_tambah_background',$data);
             }
    }

    function ubah_background(){
    cek_session_akses('background',$this->session->id_session);
    $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
        	$row =$this->model_app->view_where('ref_background',array('id_background'=>$this->input->post('id')))->row();
            $config['upload_path'] = 'assets/backend/background/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $gbr = $this->upload->data();
            //         //compress gambar
            // $config['image_library']='gd2';
            // $config['source_image']='assets/backend/background/'.$gbr['file_name'];
            // $config['create_thumb']= FALSE;
            // $config['maintain_ratio']= FALSE;
            // $config['quality']= '50%';
            // $config['width']= 1024;
            // $config['height']= 786;
            // $config['new_image']= 'assets/backend/background/'.$gbr['file_name'];
            // $this->load->library('image_lib', $config);
            // $this->image_lib->resize();
          
               if ($gbr['file_name']==''){
                  $data = array('id_background'=>$this->db->escape_str($this->input->post('id')),
                                'nm_background'=>$this->db->escape_str($this->input->post('nmbackground')),
                                'username'=>$this->session->username);
                }else{
                  $data = array('id_background'=>$this->db->escape_str($this->input->post('id')),
                                'nm_background'=>$this->db->escape_str($this->input->post('nmbackground')),
                                'img_background'=>$gbr['file_name'],
                                'username'=>$this->session->username);
                   unlink('assets/backend/background/'.$row->img_background);
                }
                 $where = array('id_background' => $this->input->post('id'));
                
                $this->model_app->update('ref_background',$data,$where);
                redirect('administrator/background');
        }else{
        	 if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('ref_background', array('id_background' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('ref_background', array('id_background' => $id, 'username' => $this->session->username))->row_array();
            }
             $data = array('rows' => $proses);
             $this->template->load('administrator/template','administrator/form_background/view_edit_background',$data);
             }
    }

    function ref_status(){
       cek_session_akses('ref_status',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_ordering('ref_status','id_status','ASC');
    }else{
        $data['record'] = $this->model_app->view_where_ordering('ref_status',array('username'=>$this->session->username),'id_status','ASC');
    }
    $this->template->load('administrator/template','administrator/form_status/view_status',$data);
    }

    function tambah_status(){
    cek_session_akses('ref_status',$this->session->id_session);
    if (isset($_POST['submit'])){
          

                  $data = array('id_status'=>$this->db->escape_str($this->input->post('id')),
                                'status'=>$this->db->escape_str($this->input->post('status')),
                                'username'=>$this->session->username);
                
                $this->model_app->insert('ref_status',$data);
                redirect('administrator/ref_status');
        }else{
             $proses = $this->model_app->view_ordering('ref_status','id_status','ASC');
             $data = array('record' => $proses);
             $this->template->load('administrator/template','administrator/form_status/view_tambah_status',$data);
        }
    }

    function ubah_status(){
        cek_session_akses('ref_status',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
             $row =$this->model_app->view_where('ref_status',array('id_status'=>$this->input->post('id')))->row();
             

            
                  $data = array('id_status'=>$this->db->escape_str($this->input->post('id')),
                                'status'=>$this->db->escape_str($this->input->post('status')),
                                'username'=>$this->session->username);
                
                 $where = array('id_status' => $this->input->post('id'));
                
                 $this->model_app->update('ref_status', $data, $where);
                 redirect('administrator/ref_status');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('ref_status', array('id_status' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('ref_status', array('id_status' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/form_status/view_edit_status',$data);
        }
    }

    function hapus_status(){
        cek_session_akses('ref_status',$this->session->id_session);
        $id =$this->model_app->view_where('ref_status',array('id_status'=>$this->uri->segment(3)))->row_array();
        $this->model_app->delete('ref_status',$id);
        redirect('administrator/ref_status');
    }


// Kab
    function ref_kab(){
       cek_session_akses('ref_kab',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
    }else{
        $data['record'] = $this->model_app->view_where_ordering('ref_kab',array('username'=>$this->session->username),'id_kab','ASC');
    }
    $this->template->load('administrator/template','administrator/form_kab/view_kab',$data);
    }

    function tambah_kab(){
    cek_session_akses('ref_kab',$this->session->id_session);
    if (isset($_POST['submit'])){
          

                  $data = array('id_kab'=>$this->db->escape_str($this->input->post('id')),
                                'kab'=>$this->db->escape_str($this->input->post('kab')),
                                'username'=>$this->session->username);
                
                $this->model_app->insert('ref_kab',$data);
                redirect('administrator/ref_kab');
        }else{
             $proses = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
             $data = array('record' => $proses);
             $this->template->load('administrator/template','administrator/form_kab/view_tambah_kab',$data);
        }
    }

    function ubah_kab(){
        cek_session_akses('ref_kab',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
             $row =$this->model_app->view_where('ref_kab',array('id_kab'=>$this->input->post('id')))->row();
             

            
                  $data = array('id_kab'=>$this->db->escape_str($this->input->post('id')),
                                'kab'=>$this->db->escape_str($this->input->post('kab')),
                                'username'=>$this->session->username);
                
                 $where = array('id_kab' => $this->input->post('id'));
                
                 $this->model_app->update('ref_kab', $data, $where);
                 redirect('administrator/ref_kab');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('ref_kab', array('id_kab' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('ref_kab', array('id_kab' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/form_kab/view_edit_kab',$data);
        }
    }

    function hapus_kab(){
        cek_session_akses('ref_kab',$this->session->id_session);
        $id =$this->model_app->view_where('ref_kab',array('id_kab'=>$this->uri->segment(3)))->row_array();
        $this->model_app->delete('ref_kab',$id);
        redirect('administrator/ref_kab');
    }



// Kec
    function ref_kec(){
       cek_session_akses('ref_kec',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_join_one('ref_kab','ref_kec','id_kab','id_kec','ASC');
    }else{
        $data['record'] = $this->model_app->view_join_where('ref_kab','ref_kec','id_kab',array('username'=>$this->session->username),'id_kec','ASC');
    }
    $this->template->load('administrator/template','administrator/form_kec/view_kec',$data);
    }

    function tambah_kec(){
    cek_session_akses('ref_kec',$this->session->id_session);
    if (isset($_POST['submit'])){
          

                  $data = array('id_kab'=>$this->db->escape_str($this->input->post('kab')),
                                'id_kec'=>$this->db->escape_str($this->input->post('id')),
                                'kec'=>$this->db->escape_str($this->input->post('kec')),
                                'username'=>$this->session->username);
                
                $this->model_app->insert('ref_kec',$data);
                redirect('administrator/ref_kec');
        }else{
             $proses = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
             $data = array('record' => $proses);
             $this->template->load('administrator/template','administrator/form_kec/view_tambah_kec',$data);
        }
    }

    function ubah_kec(){
        cek_session_akses('ref_kec',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
             $row =$this->model_app->view_where('ref_kec',array('id_kec'=>$this->input->post('id')))->row();
             

            
                  $data = array('id_kab'=>$this->db->escape_str($this->input->post('kab')),
                                'id_kec'=>$this->db->escape_str($this->input->post('id')),
                                'kec'=>$this->db->escape_str($this->input->post('kec')),
                                'username'=>$this->session->username);
                
                 $where = array('id_kec' => $this->input->post('id'));
                
                 $this->model_app->update('ref_kec', $data, $where);
                 redirect('administrator/ref_kec');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('ref_kec', array('id_kec' => $id))->row_array();
                 $proses1 = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
            }else{
                $proses = $this->model_app->edit('ref_kec', array('id_kec' => $id, 'username' => $this->session->username))->row_array();
                $proses1 = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
            }
            $data = array('rows' => $proses, 'record' => $proses1);
            $this->template->load('administrator/template','administrator/form_kec/view_edit_kec',$data);
        }
    }

    function hapus_kec(){
        cek_session_akses('ref_kec',$this->session->id_session);
        $id =$this->model_app->view_where('ref_kec',array('id_kec'=>$this->uri->segment(3)))->row_array();
        $this->model_app->delete('ref_kec',$id);
        redirect('administrator/ref_kec');
    }
  
  // Pasien
 function pasien(){
       cek_session_akses('pasien',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_join_four('dat_pasien','ref_kab','ref_kec','ref_status','ref_jk','id_kab','id_kec','id_status','id_jk','id_pasien','ASC');
    }else{
        $data['record'] = $this->model_app->view_join_where3('dat_pasien','ref_kab','ref_kec','ref_jk','id_kab','id_kec','id_jk',array('username'=>$this->session->username),'id_pasien','ASC');
    }
    $this->template->load('administrator/template','administrator/form_pasien/view_pasien',$data);
    }

    function tambah_pasien(){
    cek_session_akses('pasien',$this->session->id_session);
    if (isset($_POST['submit'])){
          
                  $data = array('id_kab'=>$this->db->escape_str($this->input->post('kab')),
                                'id_kec'=>$this->db->escape_str($this->input->post('kec')),
                                'usia'=>$this->db->escape_str($this->input->post('usia')),
                                'id_jk'=>$this->db->escape_str($this->input->post('jk')),
                                'id_status'=>$this->db->escape_str($this->input->post('status')),
                                'jalurpenularan'=>$this->db->escape_str($this->input->post('jalurpenularan')),
                                'hari'=>hari_ini(date('w')),
                                'tanggal'=>date('Y-m-d'),
                                'jam'=>date('H:i:s'),
                                'username'=>$this->session->username);
                
                $this->model_app->insert('dat_pasien',$data);
                redirect('administrator/pasien');
        }else{
             $proses = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
             $proses1 = $this->model_app->view_ordering('ref_status','id_status','ASC');
             $proses2 = $this->model_app->view_ordering('ref_jk','id_jk','ASC');
             $data = array('record' => $proses, 'rows' => $proses1, 'jk' => $proses2);
             $this->template->load('administrator/template','administrator/form_pasien/view_tambah_pasien',$data);
        }
    }

    function ubah_pasien(){
        cek_session_akses('pasien',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
             $row = $this->model_app->view_where('dat_pasien',array('id_pasien'=>$this->input->post('id')))->row();
             

            
                  $data = array('id_kab'=>$this->db->escape_str($this->input->post('kab')),
                                'id_kec'=>$this->db->escape_str($this->input->post('kec')),
                                'usia'=>$this->db->escape_str($this->input->post('usia')),
                                'id_jk'=>$this->db->escape_str($this->input->post('jk')),
                                'id_status'=>$this->db->escape_str($this->input->post('status')),
                                'jalurpenularan'=>$this->db->escape_str($this->input->post('jalurpenularan')),
                                'hari'=>hari_ini(date('w')),
                                'tanggal'=>date('Y-m-d'),
                                'jam'=>date('H:i:s'),
                                'username'=>$this->session->username);
                
                 $where = array('id_pasien' => $this->input->post('id'));
                
                 $this->model_app->update('dat_pasien', $data, $where);
                 redirect('administrator/pasien');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('dat_pasien', array('id_pasien' => $id))->row_array();
                 $proses1 = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
                 $proses2 = $this->model_app->view_ordering('ref_status','id_status','ASC');
                 $proses3 = $this->model_app->view_ordering('ref_kec','id_kec','ASC');
                 $proses4 = $this->model_app->view_ordering('ref_jk','id_jk','ASC');
                 
            }else{
                $proses = $this->model_app->edit('dat_pasien', array('id_pasien' => $id, 'username' => $this->session->username))->row_array();
                $proses1 = $this->model_app->view_ordering('ref_kab','id_kab','ASC');
                $proses2 = $this->model_app->view_ordering('ref_status','id_status','ASC');
                $proses3 = $this->model_app->view_ordering('ref_kec','id_kec','ASC');
                $proses4 = $this->model_app->view_ordering('ref_jk','id_jk','ASC');
            }
            $data = array('rows' => $proses, 'record' => $proses1, 'status' => $proses2, 'kec' => $proses3, 'jk' => $proses4);
            $this->template->load('administrator/template','administrator/form_pasien/view_edit_pasien',$data);
        }
    }

    function hapus_pasien(){
        cek_session_akses('pasien',$this->session->id_session);
        $id =$this->model_app->view_where('dat_pasien',array('id_pasien'=>$this->uri->segment(3)))->row_array();
        $this->model_app->delete('dat_pasien',$id);
        redirect('administrator/pasien');
    }

    function ambil_kec(){
        $postData = $this->input->post();
        $data = $this->model_app->ambil_kec1($postData);
        echo json_encode($data);
    }

    // kasus
    function total_kasus(){
       cek_session_akses('total_kasus',$this->session->id_session);
       if ($this->session->level=='admin'){
        $data['record'] = $this->model_app->view_ordering('total_kasus','id_kasus','ASC');
    }else{
        $data['record'] = $this->model_app->view_where_ordering('total_kasus',array('username'=>$this->session->username),'id_kasus','ASC');
    }
    $this->template->load('administrator/template','administrator/form_kasus/view_kasus',$data);
    }

    function ubah_kasus(){
        cek_session_akses('total_kasus',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
             $row =$this->model_app->view_where('total_kasus',array('id_kasus'=>$this->input->post('id')))->row();
             

            
                  $data = array('id_kasus'=>$this->db->escape_str($this->input->post('id')),
                                'total_odp'=>$this->db->escape_str($this->input->post('total_odp')),
                                'total_pdp'=>$this->db->escape_str($this->input->post('total_pdp')),
                                'total_terkonfirmasi'=>$this->db->escape_str($this->input->post('total_terkonfirmasi')),
                                'total_sembuh'=>$this->db->escape_str($this->input->post('total_sembuh')),
                                'total_meninggal'=>$this->db->escape_str($this->input->post('total_meninggal')),
                                'username'=>$this->session->username);
                
                 $where = array('id_kasus' => $this->input->post('id'));
                
                 $this->model_app->update('total_kasus', $data, $where);
                 redirect('administrator/total_kasus');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('total_kasus', array('id_kasus' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('total_kasus', array('id_kasus' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/form_kasus/view_edit_kasus',$data);
        }
    }

    function download(){
        cek_session_akses('download',$this->session->id_session);
        $data['record'] = $this->model_app->view_ordering('download','id_download','DESC');
        $this->template->load('administrator/template','administrator/form_download/view_download',$data);
    }

    function tambah_download(){
        cek_session_akses('download',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'assets/front/file/';
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
            $config['max_size'] = '25000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }else{
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_file'=>$hasil['file_name'],
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }
            $this->model_app->insert('download',$data);
            redirect('administrator/download');
        }else{
            $this->template->load('administrator/template','administrator/form_download/view_download_tambah');
        }
    }

    function edit_download(){
        cek_session_akses('download',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/files/';
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
            $config['max_size'] = '25000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')));
            }else{
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_file'=>$hasil['file_name']);
            }
            $where = array('id_download' => $this->input->post('id'));
            $this->model_app->update('download', $data, $where);
            redirect('administrator/download');
        }else{
            $proses = $this->model_app->edit('download', array('id_download' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/form_download/view_download_edit',$data);
        }
    }

    function delete_download(){
        cek_session_akses('download',$this->session->id_session);
        $id = array('id_download' => $this->uri->segment(3));
        $this->model_app->delete('download',$id);
        redirect('administrator/download');
    }


}
