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
						<form class="form-horizontal form-label-left" action="<?php echo site_url('pengaduan/save_pengaduan');?>" method="post">
							<div class="form-group row ">
								<label class="control-label col-md-3 col-sm-3 ">Judul </label>
									<div class="col-md-9 col-sm-9 ">
										<input type="text" class="form-control" name="judul" placeholder="Judul">
									</div>
							</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kecamatan </label>
											<div class="col-md-9 col-sm-9 ">
												<select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option value="">No Selected</option>
                                                <?php foreach($kecamatan as $row):?>
                        							<option value="<?php echo $row->id_kecamatan;?>"><?php echo $row->nama_kecamatan;?></option>
                        						<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Desa </label>
											<div class="col-md-9 col-sm-9 ">
												<select class="select2_single form-control" tabindex="-1" id="desa" name="desa" required>
                                                <option value="">No Selected</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Alamat <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<textarea class="form-control" rows="2" name="alamat" placeholder="Alamat" required></textarea>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Keterangan <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 ">
												<textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan" required></textarea>
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
										<div class="form-group">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<!-- <button type="button" class="btn btn-primary">Cancel</button>
												<button type="reset" class="btn btn-primary">Reset</button> -->
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
                        </div>
                        </div>
                        </div>
                        <script type="text/javascript" src="<?php echo base_url().'tema/bootstrap1/js/jquery-3.3.1.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'tema/bootsrtap1/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#kecamatan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('pengaduan/get_desa');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>';
                        }
                        $('#desa').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>