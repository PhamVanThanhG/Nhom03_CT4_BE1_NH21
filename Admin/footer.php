  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script>
    var dss = document.getElementById('Dashboard');
    var products = document.getElementById('Products');
    var type = document.getElementById('ProductTypes');
    var cus = document.getElementById('Customers');
    var size = document.getElementById('Sizes');
    var topping = document.getElementById('Toppings');
    var bills = document.getElementById('Bills');
    var orders = document.getElementById('Successful orders');
    var ratings = document.getElementById('Ratings');
    dss.classList.remove('active');
    products.classList.remove('active');
    type.classList.remove('active');
    cus.classList.remove('active');
    size.classList.remove('active');
    topping.classList.remove('active');
    bills.classList.remove('active');
    orders.classList.remove('active');
    ratings.classList.remove('active');
    var hientai = document.getElementById('<?php echo $title ?>');
    hientai.classList.toggle('active');
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script>
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = 'black';

    let massPopChart = new Chart(myChart, {
      type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data: {
        labels: ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'VND',
          data: [
            0,
            <?php
            $year = (int) date('Y');
            for ($i = 1; $i < 13; $i++) {
              $tong = 0;
              foreach ($getAllBuyHistory as $value) {
                $date = date_create_from_format("d-m-Y", $value['date_confirm']);
                if ((int)date_format($date, "Y") == $year && (int)date_format($date, "m") == $i) {
                  $tong += $value['price'];
                }
              }
              echo $tong;
              if ($i != 12) {
                echo ",";
              }
            }
            ?>
          ],
          //backgroundColor:'green',
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 206, 86, 0.6)'
          ],
          borderWidth: 1,
          borderColor: 'black',
          hoverBorderWidth: 3,
          hoverBorderColor: '#000'
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Sales revenue in <?php echo getdate()['year'] ?>',
          fontSize: 30
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: '#000'
          }
        },
        layout: {
          padding: {
            left: 50,
            right: 0,
            bottom: 0,
            top: 0
          }
        },
        tooltips: {
          enabled: true
        }
      }
    });
  </script>
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
  <script>
    <?php
    if (isset($_SESSION['delete'])) {
      if ($_SESSION['delete'] == "wai") {
    ?>
        alert("Order has not been approved!");
      <?php
      } else {
      ?>
        alert("Orders are being delivered!");
    <?php
      }
      unset($_SESSION['delete']);
    }
    ?>
  </script>
  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
  </body>

  </html>