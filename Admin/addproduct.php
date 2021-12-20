<?php
  $title = "Products";
  include("header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD PRODUCTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">add product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="addpro.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product details</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" id="inputName" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Product_type</label>
                  <select id="inputStatus" class="form-control custom-select" name="type_id">
                    <?php
                    $getAllTypes = $product_type->getAllProductTypes();
                    foreach ($getAllTypes as $value) :
                    ?>
                      <option value=<?php echo ($value['Type_Id']) ?>><?php echo ($value['Type_Name']) ?></option>
                    <?php
                    endforeach;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Description</label>
                  <textarea id="summernote" id="inputDescription" class="form-control" name="desc" rows="4" required></textarea>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Image</label>
                  <div class="preview">
                    <img id="file-ip-1-preview" style="width: 150px;">
                  </div>
                  <input type="file" id="image" class="form-control" name="image" required onchange="showPreview(event)">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Price</label>
                  <input type="number" id="inputProjectLeader" class="form-control" name="price" required min="0">
                </div>
                <div class="form-group">
                  <label for="inputStatus">Feature</label>
                  <select id="inputStatus" class="form-control custom-select" name="feature">
                    <option value=1>True</option>
                    <option value=0>False</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" name="submit" value="Create new product" class="btn btn-success float-right">
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