<?php
if (isset($_GET['id'])) {
  $title = "Customers";
  include("header.php");
  $getCustomerById = $customer->getCustomerById($_GET['id']);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>EDIT CUSTOMER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="editcus.php?id=<?php echo ($_GET['id']) ?>" method="post" enctype="multipart/form-data">
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
                  <label for="inputName">Username</label>
                  <input type="text" id="inputName" class="form-control" name="Username" value="<?php echo ($getCustomerById[0]['Username']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Email</label>
                  <input type="text" id="inputName" class="form-control" name="Email" value="<?php echo ($getCustomerById[0]['Email']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Change Image</label>
                  <div class="preview">
                    <img id="file-ip-1-preview" style="width: 150px;" src="../images/<?php echo ($getCustomerById[0]['cus_img']) ?>">
                  </div>
                  <input type="file" id="image" class="form-control" name="image" onchange="showPreview(event)">
                </div>
                <div class="form-group">
                  <label for="inputName">Birthday</label>
                  <input type="date" id="inputName" class="form-control" name="Birthday" value="<?php echo ($getCustomerById[0]['Birthday']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Phone</label>
                  <input type="text" id="inputName" class="form-control" name="Phone" value="<?php echo ($getCustomerById[0]['Phone']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Province/city</label>
                  <input type="text" id="inputName" class="form-control" name="city" value="<?php echo ($getCustomerById[0]['province/city']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">District</label>
                  <input type="text" id="inputName" class="form-control" name="district" value="<?php echo ($getCustomerById[0]['district']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Wards</label>
                  <input type="text" id="inputName" class="form-control" name="wards" value="<?php echo ($getCustomerById[0]['wards']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Add address</label>
                  <input type="text" id="inputName" class="form-control" name="addAd" value="<?php echo ($getCustomerById[0]['add_Address']) ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Rank</label>
                  <select id="inputStatus" class="form-control custom-select" name="rank">
                    <option value="Bronze" <?php
                                            if ($getCustomerById[0]['rank'] == "Bronze") {
                                              echo ("selected");
                                            }
                                            ?>>Bronze</option>
                    <option value="Silver" <?php
                                            if ($getCustomerById[0]['rank'] == "Silver") {
                                              echo ("selected");
                                            }
                                            ?>>Silver</option>
                    <option value="Gold" <?php
                                          if ($getCustomerById[0]['rank'] == "Gold") {
                                            echo ("selected");
                                          }
                                          ?>>Gold</option>
                    <option value="Plantium" <?php
                                              if ($getCustomerById[0]['rank'] == "Plantium") {
                                                echo ("selected");
                                              }
                                              ?>>Plantium</option>
                    <option value="Diamond" <?php
                                              if ($getCustomerById[0]['rank'] == "Diamond") {
                                                echo ("selected");
                                              }
                                              ?>>Diamond</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Comment about store</label>
                  <textarea id="inputDescription" class="form-control" name="cmt" rows="3" required><?php echo ($getCustomerById[0]['Comment']) ?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputName">Day created account</label>
                  <input type="date" id="inputName" class="form-control" name="daycreated" value="<?php echo ($getCustomerById[0]['DayCreate']) ?>" required>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" name="submit" value="Edit customer" class="btn btn-success float-right">
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