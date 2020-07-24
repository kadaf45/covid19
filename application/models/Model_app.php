<?php 
class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_ordering_limitd($table,$order,$ordering,$baris,$dari){
        $this->db->select('DISTINCT *');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_two($table1,$table2,$table3,$field,$field1,$order,$ordering){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.'.$field.'='.$table1.'.'.$field);
        $this->db->join($table3, $table3.'.'.$field1.'='.$table1.'.'.$field1); 
        // $this->db->where($table2.'.'.$field1.'='.$table3.'.'.$field1); //pengalihan join 2 field
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_three($table1,$table2,$table3,$table4,$field,$field1,$field2,$order,$ordering){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.'.$field.'='.$table1.'.'.$field);
        $this->db->join($table3, $table3.'.'.$field1.'='.$table1.'.'.$field1); 
        $this->db->join($table4, $table4.'.'.$field2.'='.$table1.'.'.$field2); 
        // $this->db->where($table2.'.'.$field1.'='.$table3.'.'.$field1); //pengalihan join 2 field
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_four($table1,$table2,$table3,$table4,$table5,$field,$field1,$field2,$field3,$order,$ordering){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.'.$field.'='.$table1.'.'.$field);
        $this->db->join($table3, $table3.'.'.$field1.'='.$table1.'.'.$field1); 
        $this->db->join($table4, $table4.'.'.$field2.'='.$table1.'.'.$field2); 
        $this->db->join($table5, $table5.'.'.$field3.'='.$table1.'.'.$field3); 
        // $this->db->where($table2.'.'.$field1.'='.$table3.'.'.$field1); //pengalihan join 2 field
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_five($table1,$table2,$table3,$table4,$table5,$table6,$field,$field1,$field2,$field3,$field4,$order,$ordering){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.'.$field.'='.$table1.'.'.$field);
        $this->db->join($table3, $table3.'.'.$field1.'='.$table2.'.'.$field1); 
        $this->db->join($table4, $table4.'.'.$field2.'='.$table3.'.'.$field2); 
        $this->db->join($table5, $table5.'.'.$field1.'='.$table2.'.'.$field1); 
        $this->db->join($table6, $table6.'.'.$field4.'='.$table5.'.'.$field4); 
        // $this->db->where($table2.'.'.$field1.'='.$table3.'.'.$field1); //pengalihan join 2 field
        $this->db->order_by($table6.'.'.$order,$ordering);
        return $this->db->get()->result_array();
    }

     public function view_join_six($table1,$table2,$table3,$table4,$table5,$table6,$table7,$field,$field1,$field2,$field3,$field4,$field5,$field6,$field7,$field8,$order,$ordering){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.'.$field.'='.$table1.'.'.$field);
        $this->db->join($table3, $table3.'.'.$field1.'='.$table2.'.'.$field1); 
        $this->db->join($table4, $table4.'.'.$field2.'='.$table3.'.'.$field2); 
        $this->db->join($table5, $table5.'.'.$field1.'='.$table2.'.'.$field1); 
        $this->db->join($table6, $table6.'.'.$field4.'='.$table5.'.'.$field4); 
        $this->db->join($table7, $table7.'.'.$field.'='.$table1.'.'.$field);
        $this->db->where($table7.'.'.$field6.'='.$table2.'.'.$field6); //pengalihan join 2 field
        $this->db->where($table7.'.'.$field3.'='.$table3.'.'.$field3); //pengalihan join 2 field
        $this->db->where($table7.'.'.$field7.'='.$table5.'.'.$field7); //pengalihan join 2 field
        $this->db->where($table7.'.'.$field8.'='.$table6.'.'.$field8); //pengalihan join 2 field
        $this->db->order_by($table7.'.'.$order,$ordering);
        return $this->db->get()->result_array();
    }

     public function view_join_nine($table1,$table2,$table3,$table4,$table5,$table6,$table7,$table8,$table9,$field,$field1,$field2,$field3,$field4,$field5,$field6,$field7,$order,$ordering){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.'.$field.'='.$table1.'.'.$field);
        $this->db->join($table3, $table3.'.'.$field1.'='.$table1.'.'.$field1); 
        $this->db->join($table4, $table4.'.'.$field2.'='.$table1.'.'.$field2); 
        $this->db->join($table5, $table5.'.'.$field3.'='.$table1.'.'.$field3); 
        $this->db->join($table6, $table6.'.'.$field4.'='.$table1.'.'.$field4); 
        $this->db->join($table7, $table7.'.'.$field5.'='.$table1.'.'.$field5); 
        $this->db->join($table8, $table8.'.'.$field6.'='.$table1.'.'.$field6); 
        $this->db->join($table9, $table6.'.'.$field7.'='.$table1.'.'.$field7); 
        // $this->db->where($table2.'.'.$field1.'='.$table3.'.'.$field1); //pengalihan join 2 field
        $this->db->order_by($table9.'.'.$order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where1($table1,$table2,$table3,$field,$field1,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where2($table1,$table2,$table3,$table4,$field,$field1,$field2,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1);
        $this->db->join($table4, $table1.'.'.$field2.'='.$table4.'.'.$field2);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where3($table1,$table2,$table3,$table4,$table5,$field,$field1,$field2,$field3,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1);
        $this->db->join($table4, $table1.'.'.$field2.'='.$table4.'.'.$field2);
        $this->db->join($table5, $table1.'.'.$field3.'='.$table5.'.'.$field3);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function lastaccess(){
        return $this->db->query("SELECT DISTINCT DATE_FORMAT(tanggal, '%d %M %Y') AS tgl FROM dat_pasien ORDER BY tanggal DESC LIMIT 1");
    }

    function tahun(){
            $tahun= date('Y');
            return $tahun;
    }

    function ambil_kec1($postData){
        $response = array();
        if($postData['id_kab']){
            $this->db->select('*');
            $this->db->from('ref_kab');
            $this->db->join('ref_kec','ref_kec.id_kab = ref_kab.id_kab');
            $this->db->where('ref_kab.id_kab', $postData['id_kab']);
            $q = $this->db->get();
            $response = $q->result_array();

        }
        return $response;
    }

    }