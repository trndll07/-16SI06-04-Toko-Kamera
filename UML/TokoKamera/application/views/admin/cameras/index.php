<main class="main">
<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Camera</li>
  <div class="ml-auto">
      <a class="btn btn-sm btn-success" href="<?php echo base_url(); ?>admin/cameras/create"><i class="fa fa-plus"></i> New Camera</a>
  </div>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
    <!-- /.card-->
    <div class="row">
      <!-- /.col-->
      <div class="col-lg-12">

        <div class="card">
          <div class="card-header">
            <i class="fa fa-user-o"></i> Camera Table</div>
          <div class="card-body">
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-search"></i> Search</button>
                  </span>
                  <input class="form-control" id="input1-group2" type="text" name="input1-group2" placeholder="Username">
                </div>
              </div>
            </div>
            <table class="table table-responsive-sm table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Merk</th>
                  <th>Tipe</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cameras as $camera) : ?>
                <tr>
                  <td><?php echo $camera['id_kamera']; ?></td>
                  <td><?php echo $camera['merk_kamera']; ?></td>
                  <td><?php echo $camera['tipe_kamera']; ?></td>
                  <td><?php echo $camera['kategori_kamera']; ?></td>
                  <td><?php echo $camera['harga_kamera']; ?></td>
                  <td>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>admin/cameras/delete/<?php echo $camera['id_kamera']; ?>"><i class="fa fa-ban"></i> Delete</a>
                    <a class="btn btn-sm btn-primary  " href="<?php echo base_url(); ?>admin/cameras/edit/<?php echo $camera['id_kamera']; ?>"><i class="fa fa-ban"></i> Edit</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#">Prev</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </div>
        </div>

      </div>
      <!-- /.col-->
    </div>
  </div>
</div>
</main>
</div>