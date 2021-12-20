<?php
$title = "Customers";
include("header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD CUSTOMERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">add customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="addcus.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Customer details</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" name="username" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" required>
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <div class="preview">
                    <img id="file-ip-1-preview" style="width: 150px;">
                  </div>
                <input type="file" id="image" class="form-control" name="image" required onchange="showPreview(event)">
              </div>
              <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" class="form-control" name="birthday" required>
              </div>
              <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" class="form-control" name="phone" required>
              </div>
              <div class="form-group">
                <label for="city">Province/city</label>
                <input type="text" id="city" class="form-control" name="city" required>
              </div>
              <div class="form-group">
                <label for="district">District</label>
                <input type="text" id="district" class="form-control" name="district" required>
              </div>
              <div class="form-group">
                <label for="wards">Wards</label>
                <input type="text" id="wards" class="form-control" name="wards" required>
              </div>
              <div class="form-group">
                <label for="addAd">Addtional address</label>
                <input type="text" id="addAd" class="form-control" name="addAd" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="submit" value="Create new customer" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include("footer.php");
?>
<script>
  function showPreview(event) {
    if (event.target.files.length > 0) {
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }
</script>