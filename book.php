<?php
require "header.php";
if (!isset($_SESSION['cus_id'])) {
  header("Location: index.php");
}
$getCustomerById = $cus->getCustomerById($_SESSION['cus_id']);
?>

<!-- book section -->
<section class="book_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        My personal information
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <form action="editcus.php?id=<?php echo ($_SESSION['cus_id']) ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group" style="padding-bottom: 0;">
                <label for="inputName" style="font-weight: bolder;">Username</label>
                <input type="text" id="inputName" class="form-control" name="Username" value="<?php echo ($getCustomerById[0]['Username']) ?>" required>
              </div>
              <div class="form-group">
                <label for="inputName" style="font-weight: bolder;">Email</label>
                <input type="text" id="inputName" class="form-control" name="Email" value="<?php echo ($getCustomerById[0]['Email']) ?>" required>
              </div>
              <div class="form-group">
                <label for="inputClientCompany" style="font-weight: bolder;">Change Image</label>
                <div class="preview">
                  <img id="file-ip-1-preview" style="width: 150px;" src="images/<?php echo ($getCustomerById[0]['cus_img']) ?>" style="object-fit: cover;">
                </div>
                <input type="file" id="image" class="form-control" name="image" onchange="showPreview(event)">
              </div>
              <div class="form-group">
                <label for="inputName" style="font-weight: bolder;">Birthday</label>
                <input type="date" id="inputName" class="form-control" name="Birthday" value="<?php echo ($getCustomerById[0]['Birthday']) ?>" required>
              </div>
              <div class="form-group">
              <label for="inputName" style="font-weight: bolder;">Phone</label>
              <input type="text" id="inputName" class="form-control" name="Phone" value="<?php echo ($getCustomerById[0]['Phone']) ?>" required>
            </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form_container">
          <div class="card-body">
            <div class="form-group">
              <label for="inputName" style="font-weight: bolder;">Province/city</label>
              <input type="text" id="inputName" class="form-control" name="city" value="<?php echo ($getCustomerById[0]['province/city']) ?>" required>
            </div>
            <div class="form-group">
              <label for="inputName" style="font-weight: bolder;">District</label>
              <input type="text" id="inputName" class="form-control" name="district" value="<?php echo ($getCustomerById[0]['district']) ?>" required>
            </div>
            <div class="form-group">
              <label for="inputName" style="font-weight: bolder;">Wards</label>
              <input type="text" id="inputName" class="form-control" name="wards" value="<?php echo ($getCustomerById[0]['wards']) ?>" required>
            </div>
            <div class="form-group">
              <label for="inputName" style="font-weight: bolder;">Add address</label>
              <input type="text" id="inputName" class="form-control" name="addAd" value="<?php echo ($getCustomerById[0]['add_Address']) ?>" required>
            </div>
            <div class="form-group">
              <label for="inputStatus" style="font-weight: bolder;">Rank:</label> <?php echo $getCustomerById[0]['rank'] ?> <br><br>
              <label for="inputStatus" style="font-weight: bolder;">Day created:</label> <?php echo $getCustomerById[0]['DayCreate'] ?> <br><br>
              <label for="inputStatus" style="font-weight: bolder;">Total amount purchased:</label> <?php
              $getMoney = $cus->getMoneyAmoutByCusID($_SESSION['cus_id']);
              echo " ".number_format($getMoney[0]['Money'])." VND";
              ?> <br>
            </div>
          </div>
        </div>
        <div class="btn_box">
          <input type="submit" name="submit" value="Edit information" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </div>
  </div>
</section>
<!-- end book section -->

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