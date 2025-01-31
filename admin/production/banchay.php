<?php
    require_once("../../backend/filterAdmin.php");
    require_once("../../repository/orderRepository.php");

    $orderRepository = new OrderRepository();

    $orderList = $orderRepository->getAll();
    include("../../connect.php");
    $sql = "SELECT * FROM contacts LIMIT 5"; 
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>ADMIN Controler | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="css/shoe.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../../index.php" class="site_title"><i class="fa fa-home" aria-hidden="true"></i> <span>HOME</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> <?php require_once("../../backend/filterWithCookieAdmin.php") ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>HUS STORE - ADMIN</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-paw"></i> Quản Lý <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="shoe.php">Quản Lý Sản Phẩm</a></li>
                      <li><a href="order.php">Quản Lý Đơn Hàng</a></li>
                      <li><a href="user.php">Quản Lý User</a></li>
                    </ul>
                  </li>
                
                  <li><a><i class="fa fa-money"></i> Sản phẩm bán chạy<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="banchay.php">Biểu đồ bán chạy</a></li>
                    <li><a href="Khovoucher.php">Thêm Voucher</a></li>
                     
                    </ul>
                  </li>

                  <li><a><i class="fa fa-line-chart"></i> Biểu Đồ Doanh Thu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="truycap.php">Lượt truy cập</a></li>
                      <li><a href="price.php">Doanh Thu</a></li>
                      <li><a href="price_month.php">Doanh Thu Theo Tháng</a></li>
                 
                    </ul>
                  </li>

                </ul>
                
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php require_once("../../backend/filterWithCookieAdmin.php") ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">
                            <?php
                            if ($result->num_rows > 0) {
                                echo $result->num_rows.'+'; // Hiển thị tổng số hàng
                            } else {
                                echo '0';
                            }
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <li class="nav-item">
                                    <a class="dropdown-item">
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> 
                                        <span>
                                            <span><?php echo $row['NAME']; ?></span>
                                            <span class="time"><?php echo date('H:i', strtotime($row['created_at'])); ?></span>
                                        </span>
                                        <span class="message">
                                            <?php echo $row['message']; ?>
                                        </span>
                                    </a>
                                </li>
                        <?php
                            }
                        } else {
                            echo '<li class="nav-item"><a class="dropdown-item">No messages</a></li>';
                        }
                        ?>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item" href="see_all_alerts.php"> <!-- Điều hướng đến trang hiển thị tất cả các thông báo -->
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                   </a>
                                </div>
                              </li>
                          </ul>
                     </li>
              </ul>
            </nav>
          </div>
        </div>


        <div class="right_col" role="main">
            <p style="font-size: 30px; text-align: center;">Sản Phẩm Bán Chạy</p>
          <table id="tableShoe">
            <tr>  
         <!-- <th class="text-center" style="min-width:150px">Tên Sản Phẩm</th>
              <th class="text-center" style="min-width:100px">Số Lượng</th> -->
            </tr>
            <?php
                  $i=1;
                  foreach($orderList as $order){
              ?>
            <tr>
                <!-- <td><?php echo $order['name']?></td>        
                <td><?php echo $order['quantity']?></td> -->
                   
            </tr>
            <?php
                  }
            ?>
        </table>
                <!-- Thêm thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Thẻ canvas cho biểu đồ số lượng -->
<canvas id="quantityBarChart" width="400" height="200"></canvas>

<?php
        // ... (previous PHP code)

        $orderList = $orderRepository->getAll();

        // Khởi tạo mảng để lưu trữ dữ liệu số lượng của từng sản phẩm
        $quantityData = array();

        foreach ($orderList as $order) {
            $productName = $order['name'];
            $quantity = $order['quantity'];

            // Nếu sản phẩm đã tồn tại trong mảng, thì cộng dồn số lượng
            if (array_key_exists($productName, $quantityData)) {
                $quantityData[$productName] += $quantity;
            } else {
                // Nếu sản phẩm chưa tồn tại, thêm mới vào mảng
                $quantityData[$productName] = $quantity;
            }
        }

        // Chuyển mảng thành JSON để sử dụng trong mã JavaScript
        $quantityDataJson = json_encode($quantityData);
    ?>
    <!-- Mã JavaScript để vẽ biểu đồ số lượng -->
    <script>
    var quantityData = <?php echo $quantityDataJson; ?>;

    // Trích xuất tên sản phẩm và số lượng từ mảng dữ liệu
    var productNames = Object.keys(quantityData);
    var quantities = Object.values(quantityData);

    // Tạo biểu đồ cột
    var ctxBar = document.getElementById('quantityBarChart').getContext('2d');
    var barColors = quantities.map(function(quantity) {
        // Nếu số lượng lớn hơn 20, trả về màu đỏ, ngược lại là màu mặc định
        return quantity > 19 ? 'red' : 'rgba(75, 192, 192, 0.7)';
    });

    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Số Lượng',
                data: quantities,
                backgroundColor: barColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Số Lượng' // Mô tả trục tung
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tên Sản Phẩm' // Mô tả trục hành
                    }
                    
                }
                
            }
        }
    });
</script>

        </div>
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- HUScons -->
    <script src="../vendors/HUScons/HUScons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
