<?php
$title = "Successful orders";
include("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="text-transform: uppercase;">Successful orders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Successful orders</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ORDERS DETAILS</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 8%" class="text-right">
                ID order
              </th>
              <th style="width: 9%">
                Day created
              </th>
              <th style="width: 9%">
                Day confirm
              </th>
              <th style="width: 15%; color: navy;">
                Customer username
              </th>
              <th style="width: 15%; color: navy;">
                Customer image
              </th>
              <th style="width: 10%; color: navy;">
                Phone
              </th>
              <th style="width: 9%">
                Total
              </th>
              <th style="width: 10%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllBill = $od->getAllBuyHistory();
            foreach ($getAllBill as $value) :
            ?>
              <tr>
                <td class="text-right">
                  <?php echo ($value['id']); ?>
                </td>
                <td>
                  <?php echo ($value['date_create']); ?>
                </td>
                <td>
                  <?php echo ($value['date_confirm']); ?>
                </td>
                <td>
                  <?php echo ($value['Username']); ?>
                </td>
                <td>
                  <?php
                  if ($value['cus_img'] == null) {
                    echo ("Customer have not added any pictures yet!");
                  } else {
                  ?>
                    <img src="../images/<?php echo ($value['cus_img']); ?>" alt="Customer image" style="width: 140px; height: 140px;object-fit: cover;">
                  <?php
                  }
                  ?>
                </td>
                <td>
                  <?php echo ($value['Phone']); ?>
                </td>
                <td>
                  <?php 
                  $total = $od->getTotalOrder($value['id']);
                  echo (number_format($total[0]['TongTien'])); ?> VND
                </td>
                <td class="project-actions text-center">
                  <a class="btn btn-info btn-sm" href="detailOrder.php?id=<?php echo ($value['id']) ?>" style="height: 30px; width: 90px;background-color: #353833;">
                    <i class="fas fa-info"></i>
                    <span style="padding-left: 5px;">Detail</span>
                  </a>
                </td>
              </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("footer.php");
?>
  <script>
    <?php
    if (isset($_SESSION['deliver'])) {
      if ($_SESSION['deliver'] == "being") {
    ?>
        alert("Orders are being delivered!");
      <?php
      } else {
      ?>
        alert("Order delivered successfully!");
    <?php
      }
      unset($_SESSION['deliver']);
    }
    ?>
  </script>