<?php
                $no = 1;
                $status1 = 1;
                $status2 = 2;
                $status3 = 3;
                $status4 = 4;
                $status5 = 5;
                $status6 = 6;
                $status7 = 7;
                $prosespantau = $this->model_utama->view_where('dat_pasien', array('id_status' => $status1))->num_rows();
                $selesaipantau = $this->model_utama->view_where('dat_pasien', array('id_status' => $status2))->num_rows();
                $prosesawas = $this->model_utama->view_where('dat_pasien', array('id_status' => $status3))->num_rows();
                $negatif = $this->model_utama->view_where('dat_pasien', array('id_status' => $status4))->num_rows();
                $sembuh = $this->model_utama->view_where('dat_pasien', array('id_status' => $status5))->num_rows();
                $dead = $this->model_utama->view_where('dat_pasien', array('id_status' => $status6))->num_rows();
                $positif = $this->model_utama->view_where('dat_pasien', array('id_status' => $status7))->num_rows();

                $a=array($prosespantau,$selesaipantau);
                $b=array($prosesawas,$negatif);
                $c=array($sembuh,$dead,$positif);


                $kec1 =1;
                $kec2 =2;
                $kec3 =3;
                $kec4 =4;
                $kec5 =5;
                $kec6 =6;
                $kec7 =0;

                $pp1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status1))->num_rows();
                $pp2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status1))->num_rows();
                $pp3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status1))->num_rows();
                $pp4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status1))->num_rows();
                $pp5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status1))->num_rows();
                $pp6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status1))->num_rows();
                $pp7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status1))->num_rows();

                $sp1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status2))->num_rows();
                $sp2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status2))->num_rows();
                $sp3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status2))->num_rows();
                $sp4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status2))->num_rows();
                $sp5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status2))->num_rows();
                $sp6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status2))->num_rows();
                $sp7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status2))->num_rows();

                $pw1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status3))->num_rows();
                $pw2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status3))->num_rows();
                $pw3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status3))->num_rows();
                $pw4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status3))->num_rows();
                $pw5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status3))->num_rows();
                $pw6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status3))->num_rows();
                $pw7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status3))->num_rows();

                $n1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status4))->num_rows();
                $n2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status4))->num_rows();
                $n3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status4))->num_rows();
                $n4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status4))->num_rows();
                $n5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status4))->num_rows();
                $n6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status4))->num_rows();
                $n7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status4))->num_rows();

                $s1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status5))->num_rows();
                $s2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status5))->num_rows();
                $s3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status5))->num_rows();
                $s4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status5))->num_rows();
                $s5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status5))->num_rows();
                $s6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status5))->num_rows();
                $s7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status5))->num_rows();

                $m1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status6))->num_rows();
                $m2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status6))->num_rows();
                $m3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status6))->num_rows();
                $m4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status6))->num_rows();
                $m5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status6))->num_rows();
                $m6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status6))->num_rows();
                $m7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status6))->num_rows();

                $pos1 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec1, 'id_status' => $status7))->num_rows();
                $pos2 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec2, 'id_status' => $status7))->num_rows();
                $pos3 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec3, 'id_status' => $status7))->num_rows();
                $pos4 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec4, 'id_status' => $status7))->num_rows();
                $pos5 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec5, 'id_status' => $status7))->num_rows();
                $pos6 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec6, 'id_status' => $status7))->num_rows();
                $pos7 = $this->model_utama->view_where('dat_pasien', array('id_kec' => $kec7, 'id_status' => $status7))->num_rows();

                $d=array($pp1,$pp2,$pp3,$pp4,$pp5,$pp6,$pp7);
                $e=array($sp1,$sp2,$sp3,$sp4,$sp5,$sp6,$sp7);
                $f=array($pw1,$pw2,$pw3,$pw4,$pw5,$pw6,$pw7);
                $g=array($n1,$n2,$n3,$n4,$n5,$n6,$n7);
                $h=array($s1,$s2,$s3,$s4,$s5,$s6,$s7);
                $i=array($m1,$m2,$m3,$m4,$m5,$m6,$m7);
                $j=array($pos1,$pos2,$pos3,$pos4,$pos5,$pos6,$pos7);

                
?>