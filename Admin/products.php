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
          <h1>PRODUCTS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
        <h3 class="card-title">PRODUCT DETAILS</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" title="add" style="background-color: green;">
            <a href="addproduct.php" style="color: white;font-weight: bolder;">Add product</a>
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
              <th style="width: 1%">
                ID
              </th>
              <th style="width: 15%">
                Name
              </th>
              <th style="width: 5%">
                Type
              </th>
              <th style="width: 25%">
                Description
              </th>
              <th style="width: 8%" class="text-center">
                Images
              </th>
              <th style="width: 10%">
                Price
              </th>
              <th style="width: 4%" class="text-center">
                Sale
              </th>
              <th style="width: 3%" class="text-center">
                Feature
              </th>
              <th style="width: 5%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProduct = $product->getAllProducts();
            foreach ($getAllProduct as $value) :
            ?>
              <tr>
                <td><?php echo $value['Id'] ?>
                </td>
                <td>
                  <?php echo $value['Name'] ?>
                </td>
                <td>
                  <?php echo $value['Type_Name'] ?>
                </td>
                <td>
                  <div style="width: 300px; height: 90px; overflow: scroll;"><?php echo $value['Decription'] ?></div>
                </td>
                <td>
                  <img src="../images/<?php echo $value['image'] ?>" alt="" style="width: 150px;object-fit: cover;">
                </td>
                <td>
                  <?php echo number_format($value['Price']) ?> VND
                </td>
                <td>
                  <?php echo $value['Sale'] ?>%
                </td>
                <td>
                  <?php if ($value['Feature'] == 0) {
                    echo "None";
                  } else {
                    echo "Yes";
                  }
                  ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="editproduct.php?id=<?php echo $value['Id'] ?>" style="height: 30px; width: 80px;">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <br>
                  <a class="btn btn-danger btn-sm" href="deletepro.php?id=<?php echo $value['Id'] ?>" style="height: 30px; width: 80px;">
                    <i class="fas fa-trash">
                    </i>
                    Delete
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
