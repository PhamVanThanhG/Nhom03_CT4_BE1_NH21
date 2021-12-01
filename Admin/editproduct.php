<?php
if (isset($_GET['id'])) {
  $title = "Products";
  include("header.php");
  $getProductByid = $product->getProductById($_GET['id']);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>EDIT PRODUCTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="editpro.php?id=<?php echo ($_GET['id']) ?>" method="post" enctype="multipart/form-data">
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
                  <input type="text" id="inputName" class="form-control" name="name" value="<?php echo ($getProductByid[0]['Name']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Product_type</label>
                  <select id="inputStatus" class="form-control custom-select" name="type_id">
                    <?php
                    $getAllTypes = $product_type->getAllProductTypes();
                    foreach ($getAllTypes as $value) :
                    ?>
                      <option value=<?php echo ($value['Type_Id']) ?> <?php
                                                                      if ($getProductByid[0]['Type_Id'] == $value['Type_Id']) {
                                                                        echo ("selected");
                                                                      }
                                                                      ?>><?php echo ($value['Type_Name']) ?></option>
                    <?php
                    endforeach;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Description</label>
                  <textarea id="inputDescription" class="form-control" name="desc" rows="4" required><?php echo ($getProductByid[0]['Decription']) ?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Change Image</label>
                  <div class="preview">
                    <img id="file-ip-1-preview" style="width: 150px;" src="../images/<?php echo ($getProductByid[0]['image']) ?>">
                  </div>
                  <input type="file" id="image" class="form-control" name="image" onchange="showPreview(event)">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Price</label>
                  <input type="number" id="inputProjectLeader" class="form-control" name="price" value="<?php echo ($getProductByid[0]['Price']) ?>" required min="0">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Sale: (%)</label>
                  <input type="number" id="inputProjectLeader" class="form-control" name="sale" value="<?php echo ($getProductByid[0]['Sale']) ?>" required min="0" max="100">
                </div>
                <div class="form-group">
                  <label for="inputStatus">Feature</label>
                  <select id="inputStatus" class="form-control custom-select" name="feature">
                    <option value=1 <?php
                                    if ($getProductByid[0]['Feature'] == 1) {
                                      echo ("selected");
                                    }
                                    ?>>True</option>
                    <option value=0 <?php
                                    if ($getProductByid[0]['Feature'] == 0) {
                                      echo ("selected");
                                    }
                                    ?>>False</option>
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
            <input type="submit" name="submit" value="Edit product" class="btn btn-success float-right">
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
<?php
} else {
  header("location: products.php");
}
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