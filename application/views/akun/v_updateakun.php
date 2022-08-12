<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Update Akun</h2>
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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>Akun/update_akun">

										<?php foreach ($akun->result() as $ad): ?>

										<input type="hidden" value="<?php echo $ad->ID_akun;?>" name="id">
										
										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nama" id="first-name" class="form-control" value="<?php echo $ad->nama_akun;?>" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="user" id="first-name" class="form-control" value="<?php echo $ad->username;?>" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="pass" id="first-name" class="form-control" value="<?php echo base64_decode($ad->password);?>" required>
											</div>
										</div>

										<div class="item form-group form-check">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bidang<span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-6 ">
												<select class="form-control" name="jenis" required>
													<?php if ($ad->jenis_akun == 1): ?>
														<option value="1">Admin</option>
														<option value="2">Customer Service</option>
													<?php elseif($ad->jenis_akun == 2): ?>
														<option value="2">Customer Service</option>
														<option value="1">Admin</option>	
													<?php else: ?>
														<option </option>
														<option value="2">Customer Service</option>
														<option value="1">Admin</option>
													<?php endif ?>
												</select>
											</div>
										</div>

										<?php endforeach ?>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-info">Simpan</button>
												<a href="<?php echo base_url() ?>Akun"><button class="btn btn-primary" type="button">Kembali</button></a>
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