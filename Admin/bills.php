<?php
$title = "Bills";
include("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>BILLS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Bills</li>
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
        <h3 class="card-title">BILL DETAILS</h3>
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
              <th style="width: 7%" class="text-right">
                ID Bill
              </th>
              <th style="width: 9%">
                Day created
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
              <th style="width: 7%; color: navy;">
                Rank
              </th>
              <th style="width: 13%">
                State
              </th>
              <th style="width: 10%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllBill = $bills->getAllBill();
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
                  <?php echo ($value['Username']); ?>
                </td>
                <td>
                  <?php
                  if ($value['cus_img'] == null) {
                    echo ("Customer have not added any pictures yet!");
                  } else {
                  ?>
                    <img src="../images/<?php echo ($value['cus_img']); ?>" alt="Customer image" style="width: 140px; height: 140px;">
                  <?php
                  }
                  ?>
                </td>
                <td>
                  <?php echo ($value['Phone']); ?>
                </td>
                <td>
                  <?php echo ($value['rank']); ?>
                </td>
                <td>
                  <?php echo ($value['state']); ?>
                </td>
                <td class="project-actions text-center">
                  <a class="btn btn-info btn-sm" href="detailCustomer.php?id=<?php echo ($value['Cus_Id']) ?>" style="height: 30px; width: 90px;background-color: #353833;">
                    <i class="fas fa-info"></i>
                    <span style="padding-left: 5px;">Info</span>
                  </a>
                  <br>
                  <a class="btn btn-info btn-sm" href="editcustomer.php?id=<?php echo ($value['Cus_Id']) ?>" style="height: 30px; width: 90px;">
                    <i class="fas fa-truck"></i>
                    </i>
                    <span style="padding-left: 5px;">Deliver</span>
                  </a>
                  <br>
                  <a class="btn btn-danger btn-sm" href="deletecus.php?id=<?php echo $value['Cus_Id'] ?>" style="height: 30px; width: 90px;">
                    <i class="fas fa-trash">
                    </i>
                    <span style="padding-left: 5px;">Delete</span>
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