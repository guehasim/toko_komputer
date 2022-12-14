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
                    <h2>Data Pengeluaran Service</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <a href="<?php echo base_url() ?>ServicePengeluaran/newkeluar"><button type="button" class="btn btn-success">Pengeluaran Baru</button></a>
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Pengeluaran</th>
                          <th>Biaya</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($pengeluaran->result() as $ad): ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo date('d M y', strtotime($ad->tgl_pengeluaran));?></td>
                          <td><?php echo $ad->nama_pengeluaran;?></td>
                          <td><?php echo number_format($ad->biaya_pengeluaran,0);?></td>                          
                          <td><?php echo $ad->keterangan_pengeluaran;?></td>
                          <td>
                            <a href="<?php echo base_url() ?>ServicePengeluaran/get_keluar?us=<?php echo $ad->ID_pengeluaran; ?>"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>              
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_pengeluaran;?>"><i class="fa fa-trash-o"></i>  Delete</button>                                                     
                          </td>
                        </tr>

                        <!-- modal delete -->
                        <div class="modal fade" id="hapus-info-<?php echo $ad->ID_pengeluaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content edit-dialog-modal">
                              <form class="form-validate form-horizontal " id="register_form" action="<?php echo base_url(); ?>ServicePengeluaran/hapus_keluar" method="post">    
                                <?php
                                  $this->load->helper("form");
                                ?>
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Hapus Data Pengeluaran Service</h4>                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?php echo $ad->ID_pengeluaran;?>">
                                  Apakah anda benar mau menghapus data di tanggal "<?php echo date('d M y', strtotime($ad->tgl_pengeluaran));?>" untuk "<?php echo $ad->nama_pengeluaran;?>" ini?
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  Delete</button>
                                  <button class="btn btn-default btn-sm" data-dismiss="modal" type="button">Cancel</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- end modal delete-->
                        
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

        