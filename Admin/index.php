<?php
$title = "Dashboard";
include("header.php");
$getStore = $store->getStore();
$getAllBuyHistory = $bills->getAllBuyHistory();



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php
                  $order = $bills->getOrder();
                  echo ($order[0][0])
                  ?></h3>

              <p>Orders delivered successfully</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo ($product->getSL()[0]['SL']) ?></h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="fas fa-hamburger"></i>
            </div>
            <a href="products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $customer->getSL()[0]['SL'] ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="customers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $bills->getProductSold()[0]['SL'] ?></h3>

              <p>Product solds</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="container" style="margin: 50px 0px;background-color: #a3d3a2;">
        <canvas id="myChart"></canvas>
      </div>

      <div style="background-color: #17a2b854;">
        <h4 style="font-weight: bolder; padding-top: 10px;">STORE'S INFORMATION</h4><br>
        <form action="editstore.php" method="post">
          <ul style="display: flex; list-style-type: none;">
            <li style="width: 45%;">
              <div class="form-group">
                <label for="inputName">Store name</label>
                <input type="text" id="inputName" class="form-control" name="Store_Name" value="<?php echo ($getStore[0]['Store_Name']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Location</label>
                <input type="text" id="inputName" class="form-control" name="Location" value="<?php echo ($getStore[0]['Location']) ?>" required>
              </div>
              <div class="form-group">
                <label for="inputName">Phone Number</label>
                <input type="tel" id="inputName" class="form-control" name="Phone_Number" value="<?php echo ($getStore[0]['Phone_Number']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="text" id="inputName" class="form-control" name="Email" value="<?php echo ($getStore[0]['Email']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Facebook</label>
                <input type="text" id="inputName" class="form-control" name="Facebook" value="<?php echo ($getStore[0]['Facebook']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Twitter</label>
                <input type="text" id="inputName" class="form-control" name="Twitter" value="<?php echo ($getStore[0]['Twitter']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Linkedin</label>
                <input type="text" id="inputName" class="form-control" name="Linkedin" value="<?php echo ($getStore[0]['Linkedin']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Instagram</label>
                <input type="text" id="inputName" class="form-control" name="Instagram" value="<?php echo ($getStore[0]['Instagram']) ?>" required style="width: 300px;">
              </div>
            </li>
            <li style="width: 55%; padding-left: 20px; padding-right: 10px;">
              <div class="form-group">
                <label for="inputName">Pinterest</label>
                <input type="text" id="inputName" class="form-control" name="Pinterest" value="<?php echo ($getStore[0]['Pinterest']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Opening day</label>
                <input type="text" id="inputName" class="form-control" name="Open_day" value="<?php echo ($getStore[0]['Opening day']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputName">Open time</label>
                <input type="text" id="inputName" class="form-control" name="Open_time" value="<?php echo ($getStore[0]['Open time']) ?>" required style="width: 300px;">
              </div>
              <div class="form-group">
                <label for="inputDescription">Short description</label>
                <textarea id="inputDescription" class="form-control" name="Short_Description" rows="2" required><?php echo ($getStore[0]['Short description']) ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Long Description</label>
                <textarea id="inputDescription" class="form-control" name="Long_Description" rows="6" required><?php echo ($getStore[0]['Long Description']) ?></textarea>
              </div>
              <br>
              <input type="submit" name="submitEdit" value="Edit store" class="btn btn-success float-right">
            </li>
          </ul>
        </form>
      </div>
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
        </section>
  </section>
  <!-- /.content -->
</div>
<?php
include("footer.php");
?>
<?php
if (isset($_SESSION['edit'])) {
  unset($_SESSION['edit']);
?>
  <script>
    alert("Change store information succesfully!");
  </script>
<?php
}
?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=initMap" async defer></script>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById("map"), {
      center: {
        lat: 21.0168864,
        lng: 105.7855574
      },
      zoom: 15
    });
  }
</script>