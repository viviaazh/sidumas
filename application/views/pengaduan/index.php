<?php if ($this->session->flashdata('flash-data') != null) { ?>
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= $this->session->flashdata('flash-data'); ?>
    </div>
<?php } ?>
<div class="right_col" role="main">
<a href="<?= base_url(); ?>pengaduan/add_new" class="btn btn-primary">Tambah Data</a>
<!-- <button type="button" class="btn btn-primary">Tambah Data</button> -->
          <!-- <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->
<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Judul</th>
                          <th>Kecamatan</th>
                          <th>Desa</th>
                          <!-- <th>Keterangan</th> -->
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
	      				        $no = 1;
	      				        foreach ($pengaduan->result() as $row):
	      					      // $no++;
	      			        ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row->judul; ?></td>
                          <td><?= $row->nama_kecamatan; ?></td>
                          <td><?= $row->nama_desa; ?></td>
                          <!-- <td><?= $row->keterangan; ?></td> -->
                          <td><span class="badge badge-warning"><?= $row->status; ?></span></td>
                          <td>
                            <!-- <button type="button" class="">Primary</button> -->
                            <a href="<?= base_url(); ?>pengaduan/detail/<?= $row->id_pengaduan; ?>" class="btn btn-round btn-info">Detail</a>
                            <a href="<?= base_url(); ?>pengaduan/get_edit/<?= $row->id_pengaduan; ?>" class="btn btn-round btn-warning">Update</a>
                            <a href="<?= base_url(); ?>pengaduan/delete/<?= $row->id_pengaduan; ?>" class="btn btn-round btn-danger" onclick="return confirm('Yakin Data ini akan dihapus?')">Hapus</a>
                        </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
            </div>
            