<main class="main">
<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url(); ?>admin/lenses">Lenses</a>
  </li>
  <li class="breadcrumb-item active">New Lenses</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
    <!-- /.card-->
    <div class="row">
      <!-- /.col-->
      <div class="col-lg-12">

	    <div class="card">
	      <div class="card-header">
	        <strong>Lenses</strong> Form</div>
	      <div class="card-body">
			<?php echo form_open_multipart('admin/lenses/create'); ?>
	          <div class="form-group row">
	            <label class="col-md-3 col-form-label" for="hf-email">Merk</label>
	            <div class="col-md-9">
	              <input class="form-control" type="text" name="merk" placeholder="Merk">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label class="col-md-3 col-form-label" for="hf-email">File</label>
	            <div class="col-md-9">
	              <input type="file" class="btn btn-sm btn-primary " name="file">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label class="col-md-3 col-form-label" for="hf-email">Tipe</label>
	            <div class="col-md-9">
	              <input class="form-control" type="text" name="tipe" placeholder="Tipe">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label class="col-md-3 col-form-label" for="hf-email">Kategori</label>
	            <div class="col-md-9">
	              <input class="form-control" type="text" name="kategori" placeholder="Kategori">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label class="col-md-3 col-form-label" for="hf-email">Deskripsi</label>
	            <div class="col-md-9">
	              <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label class="col-md-3 col-form-label" for="hf-email">Harga</label>
	            <div class="col-md-9">
	              <input class="form-control" type="text" name="harga" placeholder="Harga">
	            </div>
	          </div>
	          <?php echo validation_errors(); ?>
	      </div>
	      <div class="card-footer">
	        <button class="btn btn-sm btn-primary" type="submit">
	          <i class="fa fa-dot-circle-o"></i> Submit</button>
	      </div>
	      <?php echo form_close(); ?>
	    </div>

      </div>
      <!-- /.col-->
    </div>
  </div>
</div>
</main>
</div>