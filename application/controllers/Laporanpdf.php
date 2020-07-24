<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'DINAS KESEHATAN KABUPATEN BANGKA BARAT',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DATA KASUS COVID-19',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(20,6,'Usia',1,0);
        $pdf->Cell(40,6,'Jenis Kelamin',1,0);
        $pdf->Cell(40,6,'Kecamatan',1,0);
        $pdf->Cell(50,6,'Status',1,1);
        $pdf->SetFont('Arial','',10);
        $no = 1;
        $pasien = $this->db->query("SELECT * FROM dat_pasien
JOIN ref_jk ON dat_pasien.id_jk = ref_jk.id_jk
JOIN ref_kab ON dat_pasien.id_kab = ref_kab.id_kab
JOIN ref_kec ON dat_pasien.id_kec = ref_kec.id_kec
JOIN ref_status ON dat_pasien.id_status = ref_status.id_status ORDER BY id_pasien ASC")->result();
        foreach ($pasien as $row){
            $pdf->Cell(10,6,$no,1,0);
            $pdf->Cell(20,6,$row->usia,1,0);
            $pdf->Cell(40,6,$row->jk,1,0);
            $pdf->Cell(40,6,$row->kec,1,0);
            $pdf->Cell(50,6,$row->status,1,1);
            $no++; 
        }
        $pdf->Output();
    }
}