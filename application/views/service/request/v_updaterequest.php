<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Data Service</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>ServiceRequest/updatedata">									

										<?php foreach ($request->result() as $ad): ?>

										<input type="hidden" name="id" value="<?php echo $ad->ID_service;?>">
										<input type="hidden" name="id_akun" value="<?php echo $this->session->userdata('ses_akun');?>">
										<input type="hidden" name="kode" value="<?php echo $ad->KODE_service;?>">
										<input type="hidden" name="tanggal" value="<?php echo $ad->tgl_request;?>">										
										<input type="hidden" name="status" value="<?php echo $ad->request_status;?>">	

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Customer <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="pelanggan" value="<?php echo $ad->nama_pelanggan;?>" id="first-name" class="form-control" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Perangkat <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nama" value="<?php echo $ad->request_nama;?>" id="first-name" class="form-control" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kerusakan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="rusak" id="first-name" value="<?php echo $ad->request_rusak;?>" class="form-control" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estimasi Biaya
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="biaya" id="first-name" value="<?php echo $ad->request_biaya;?>" class="form-control">
											</div>
										</div>

										<?php endforeach ?>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Simpan</button>
												<a href="<?php echo base_url() ?>ServiceRequest"><button class="btn btn-primary" type="button">Kembali</button></a>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- /page content -->