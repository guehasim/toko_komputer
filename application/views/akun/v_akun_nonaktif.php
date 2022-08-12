        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">              
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Akun NonAktif</h2>
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
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Bidang</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($akun->result() as $ad): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $ad->nama_akun;?></td>
                          <td><?php echo $ad->username;?></td>
                          <td><?php echo base64_decode($ad->password);?></td>
                          <td>
                            <?php if ($ad->jenis_akun == 1): ?>
                              <?php echo "Admin";?>
                            <?php elseif($ad->jenis_akun == 2): ?>
                              <?php echo "Customer Service";?>
                            <?php else: ?>
                              <?php echo "Akun Abal-Abal"; ?>
                              
                            <?php endif ?>
                          </td>
                          <td>
                            <a href="<?php echo base_url() ?>Akun/update_status?us=<?php echo $ad->ID_akun;?>&uss=<?php echo $ad->status_akun;?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Aktifkan </a>
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

        