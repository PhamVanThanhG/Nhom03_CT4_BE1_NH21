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
          <h1>CUSTOMERS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Customers</li>
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
        <h3 class="card-title">CUSTOMER DETAILS</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" title="add" style="background-color: green;">
            <a href="addcustomer.php" style="color: white;font-weight: bolder;">Add customer</a>
          </button>
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
              <th style="width: 10%">
                Customer_id
              </th>
              <th style="width: 20%">
                Username
              </th>
              <th style="width: 15%">
                Customer image
              </th>
              <th style="width: 17%">
                Email
              </th>
              <th style="width: 13%">
                Phone
              </th>
              <th style="width: 10%">
                Rank
              </th>
              <th style="width: 10%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllCustomer = $customer->getAllCustomer();
            foreach ($getAllCustomer as $value) :
            ?>
              <tr>
                <td>
                  <?php echo ($value['Cus_Id']); ?>
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
                    <img src="../images/<?php echo ($value['cus_img']); ?>" alt="Customer image" style="width: 170px; height: 150px;object-fit: cover;">
                  <?php
                  }
                  ?>
                </td>
                <td>
                  <?php echo ($value['Email']); ?>
                </td>
                <td>
                  <?php echo ($value['Phone']); ?>
                </td>
                <td>
                  <?php echo ($value['rank']); ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="detailCustomer.php?id=<?php echo($value['Cus_Id']) ?>" style="height: 30px; width: 80px;background-color: #353833;">
                  <i class="fas fa-info"></i> 
                    <span style="padding-left: 5px;">Info</span>
                  </a>
                  <br>
                  <a class="btn btn-info btn-sm" href="editcustomer.php?id=<?php echo($value['Cus_Id']) ?>" style="height: 30px; width: 80px;">
                    <i class="fas fa-pencil-alt">
                    </i>
                    <span style="padding-left: 5px;">Edit</span>
                  </a>
                  <br>
                  <a class="btn btn-danger btn-sm" href="deletecus.php?id=<?php echo $value['Cus_Id'] ?>" style="height: 30px; width: 80px;">
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