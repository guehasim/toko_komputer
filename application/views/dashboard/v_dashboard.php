<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php 

$masukan;
$keluar;

foreach ($pemasukan as $ms) {
  $masukan = $ms->total;
}

foreach ($pengeluaran as $kl) {
  $keluar = $kl->total;
}

$total = $masukan-$keluar;
 ?>



<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">

            <div class="col-md-2 col-sm-4  tile_stats_count">
              
              <span class="count_top"><i class="fa fa-file"></i> Service Request </span>

              <?php foreach ($request as $lis): ?>
              <div class="count blue"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>

            <div class="col-md-2 col-sm-4  tile_stats_count">
              
              <span class="count_top"><i class="fa fa-file"></i> Service Masuk </span>

              <?php foreach ($masuk as $lis): ?>
              <div class="count blue"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>

            <div class="col-md-2 col-sm-4  tile_stats_count">
              
              <span class="count_top"><i class="fa fa-file"></i> Service Proses </span>

              <?php foreach ($proses as $lis): ?>
              <div class="count blue"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>

            <div class="col-md-2 col-sm-4  tile_stats_count">
              
              <span class="count_top"><i class="fa fa-file"></i> Service Selesai </span>

              <?php foreach ($selesai as $lis): ?>
              <div class="count blue"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>

            <div class="col-md-2 col-sm-4  tile_stats_count">
              
              <span class="count_top"><i class="fa fa-file"></i> Service Diterima </span>

              <?php foreach ($terima as $lis): ?>
              <div class="count blue"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>



            <div class="col-md-4 col-sm-4  tile_stats_count">

              <span class="count_top"><i class="fa fa-money"></i> Pemasukan </span>

              <?php foreach ($pemasukan as $lis): ?>
              <div class="count blue"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Pengeluaran </span>

              <?php foreach ($pengeluaran as $lis): ?>
              <div class="count red"><?php echo number_format($lis->total);?></div>                
              <?php endforeach ?>

            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total </span>

              <div class="count green"><?php echo number_format($total);?></div>                

            </div>
          </div>
        </div>
      </div>
          <!-- /top tiles -->