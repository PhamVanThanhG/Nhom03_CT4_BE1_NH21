<?php
$title = "Sizes";
include("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sizes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sizes</li>
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
        <h3 class="card-title">Size details</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" title="add" style="background-color: green;">
            <a href="addSize.php" style="color: white;font-weight: bolder;">Add size</a>
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
              <th style="width: 20%">
                ID_Size
              </th>
              <th style="width: 20%">
                Size
              </th>
              <th style="width: 20%">
                Price
              </th>
              <th style="width: 40%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllSize = $size->getAllSizes();
            foreach ($getAllSize as $value) :
            ?>
              <tr>
                <td><?php echo $value['id'] ?>
                </td>
                <td>
                  <?php echo $value['size'] ?>
                </td>
                <td>
                  <?php echo $value['price'] ?>
                </td>
                <td class="project-actions text-center">
                  <a class="btn btn-info btn-sm" href="editsize.php?id=<?php echo $value['id'] ?>" style="height: 30px; width: 80px;">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deletesize.php?id=<?php echo $value['id'] ?>" style="height: 30px; width: 80px;">
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
if ($_SESSION['del'] == true) {
  ?>
    <script>
      alert("The type of product that you want to delete still exists products!");
    </script>
  <?php
  unset($_SESSION['del']);
  }
?>