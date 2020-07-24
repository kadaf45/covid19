<?php
// include'config/koneksi.php';
$link = mysqli_connect("localhost", "root", "","ex_covid");
$hasil = mysqli_query($link, "SELECT * FROM total_kasus");

if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["total_kasus"] = array();
  while($x = mysqli_fetch_array($hasil)){
    $h['Kode_wilayah'] = $x["Kode_wilayah"];
    $h['total_odp'] = $x["total_odp"];
    $h['total_pdp'] = $x["total_pdp"];
    $h['total_terkonfirmasi'] = $x["total_terkonfirmasi"];
    $h['total_sembuh'] = $x["total_sembuh"];
    $h['total_meninggal'] = $x["total_meninggal"];
    array_push($response["total_kasus"], $h);
  }
  echo json_encode($response);
}else {
  $response["message"]="tidak ada data";
  echo json_encode($response);
}
mysqli_close($link);
?>