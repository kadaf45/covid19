<?php include "anu.php"; ?>
<div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Referensi Data Kasus API</h3>
              </div>
</div>
<div class="col-md-12">
    <div class="row">
      <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                <h3><?php echo array_sum($otg);?></h3>

                <p>TOTAL OTG</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                <h3><?php echo array_sum($a);?></h3>

                <p>TOTAL ODP</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo array_sum($b);?></h3>

                <p>TOTAL PDP</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo array_sum($c);?></h3>

                <p>TOTAL TERKONFIRMASI COVID-19</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $sembuh;?></h3>

                <p>TOTAL SEMBUH</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $dead;?></h3>

                <p>TOTAL MENINGGAL</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
    </div>
</div>