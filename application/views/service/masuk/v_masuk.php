        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>

            <div class="clearfix"></div>
            <div>
              <?php echo $this->session->flashdata('msg'); ?>
            </div> 

            <div class="row">              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Service Masuk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode</th>
                          <th>Tanggal Masuk</th>
                          <th>Perangkat</th>
                          <th>Kerusakan</th>
                          <th>Serial Number</th>
                          <th>Kelengkapan</th>
                          <th>DP</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($masuk->result() as $ad): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $ad->KODE_service;?></td>
                          <td><?php echo date('d M Y', strtotime($ad->masuk_tgl));?></td>
                          <td><?php echo $ad->request_nama;?></td>
                          <td><?php echo $ad->request_rusak;?></td>
                          <td><?php echo $ad->masuk_serial;?></td>
                          <td><?php echo $ad->masuk_kelengkapan;?></td>
                          <td>Rp. <?php echo number_format($ad->masuk_biaya_dp);?></td>
                          <td>
                            <a href="<?php echo base_url() ?>ServiceMasuk/getdata?us=<?php echo $ad->ID_service;?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit Data </a>
                            <a href="<?php echo base_url() ?>ServiceProses/update_status_proses?us=<?php echo $ad->ID_service; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Service Proses </a>
                            <a href="<?php echo base_url() ?>ServiceRequest/update_status_cancel?us=<?php echo $ad->ID_service;?>" class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Cancel </a>                                                     
                          </td>
                        </tr>
                        
                    <?php endforeach ?>
                      </tbody>
                    </table>
					
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        