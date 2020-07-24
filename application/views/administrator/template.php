<?php 
if ($this->session->level==''){
    redirect(base_url());
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Selamat Datang</title>

   <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/lte/css/adminlte.min.css">
<!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/datatables/datatables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/style.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/lte/plugin/fontawesome/css/all.min.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap4/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap4/css/glyphicon.css">
 <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include "main-header.php"; ?>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include "menu-admin.php"; ?>
  </aside>

  <div class="content-wrapper">
    <section class="content">
            <?php echo $contents; ?>
        </section>
  </div>

  <footer class="main-footer">
    <?php include "footer.php"; ?>
  </footer>
</div>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/chart.js/Chart.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/backend/lte/plugin/jquery/jquery.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url(); ?>assets/backend/lte/js/adminlte.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/backend/datatables/DataTables/js/jquery.dataTables.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/backend/datatables/datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/bootstrap4/js/bootstrap.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#kab').change(function(){
    var id_kab=$(this).val();
    $.ajax({
      url : "<?php echo base_url(); ?>Administrator/ambil_kec",
      method : "POST",
      data : {id_kab: id_kab},
      dataType : 'json',
      success: function(response){
        var html = '';
        var i;
        if (response){
          $("#kec").empty();
          
          for(i=0; i<response.length; i++){
            html += '<option value='+response[i].id_kec+'>'+response[i].kec+'</option>';
          }
          $("#kec").append(html);
        }
      }
    });
  });
  });
</script>

</body>
</html>
<?php } ?>