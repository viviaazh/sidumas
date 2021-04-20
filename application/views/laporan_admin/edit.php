
<div class="right_col" role="main">
    <div class="">
	    <div class="page-title">
			<div class="title_left">
				<h3>Form Elements</h3>
			</div>
        </div>
        <div class="clearfix"></div>
			<div class="row">
                <div class="col-md-6 col-sm-16">
					<div class="x_panel">
						<div class="x_title">
							<h2>Form Basic Elements <small>different form elements</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Settings 1</a>
										<a class="dropdown-item" href="#">Settings 2</a>
									</div>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
						<br />
						<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php echo site_url('laporan_admin/edit');?>" method="post">
                        <input type="hidden" name="id_laporanadmin" value="<?=$laporan_admin['id_laporanadmin'];?>">
                            <div class="form-group row ">
								<label class="control-label col-md-3 col-sm-3 ">Judul </label>
									<div class="col-md-9 col-sm-9 ">
										<input type="text" class="form-control" name="judul" placeholder="Judul" value="<?= $laporan_admin['judul'];?>">
									</div>
							</div>
                            <div class="form-group row ">
								<label class="control-label col-md-3 col-sm-3 ">Upload File </label>
									<div class="col-md-9 col-sm-9 ">
										<input type="file" name="res">
									</div>
							</div>
                                        <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Keterangan <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<textarea class="form-control" rows="3" name="ket_berkas" placeholder="Keterangan" required></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Status <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<div class="radio">
													<label>
														<input type="radio" class="flat" checked="" id="optionsRadios1" name="status" value="Sedang diverifikasi" <?php echo set_radio('status', 'Sedang diverifikasi', true); ?> > Sedang diverifikasi
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" class="flat" value="option2" id="optionsRadios2" name="status" value="Diterima" <?php echo set_radio('status', 'Diterima'); ?> > Diterima
													</label>
												</div>
											</div>
										</div>
										<div class="ln_solid"></div>
                                        <!-- <input type="hidden" name="id_laporanadmin" value="<?php echo $id_laporanadmin?>" > -->
										<div class="form-group">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<!-- <button type="button" class="btn btn-primary">Cancel</button>
												<button type="reset" class="btn btn-primary">Reset</button> -->
												<button type="submit" class="btn btn-success" name="edit">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
                        </div>
                        </div>
                        </div>