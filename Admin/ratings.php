<?php
$title = "Ratings";
include("header.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>RATINGS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ratings</li>
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
        <h3 class="card-title">RATING DETAILS</h3>
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
              <th style="width: 10%" class="text-right">
                ID product
              </th>
              <th style="width: 15%">
                Name
              </th>
              <th style="width: 13%" class="text-center">
                Images
              </th>
              <th style="width: 10%">
                Price
              </th>
              <th style="width: 4%" class="text-center">
                Sale
              </th>
              <th style="width: 10%">
                Star
              </th>
              <th style="width: 5%" class="text-center">
                Reviews
              </th>
              <th style="width: 5%" class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProduct = $rating->getAllRatingProduct();
            foreach ($getAllProduct as $value) :
            ?>
              <tr>
                <td class="text-center"><?php echo $value['id_product'] ?>
                </td>
                <td>
                  <?php echo $value['Name'] ?>
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
                  <img src="../images/<?php echo $value['star'] ?>sao.jpg" alt="" style="width: 150px;height: 150;  object-fit: cover;">
                </td>
                <td class="text-center">
                  <?php echo $value['reivew'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="detailBill.php?id=<?php echo ($value['id_product']) ?>" style="height: 30px; width: 90px;background-color: #353833;">
                    <i class="fas fa-info"></i>
                    <span style="padding-left: 5px;">Details</span>
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