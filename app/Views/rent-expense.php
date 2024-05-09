<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - Rent Expense Report</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/fastcat.png" />
    <style>
      .tableFixHead thead th { position: sticky; top: 0; z-index: 1;color:#fff;background-color:#0275d8;border:2px solid blue;}
			table  { border-collapse: collapse; width: 100%;}
			th, td { padding: 8px 16px;color:#000;}
			tbody{color:#000;border:2px solid blue;}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="/"><img src="assets/images/fastcat.png" alt="logo"/></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="/"><img src="assets/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/pic-1.png" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2">Henry Klein</span>
                <span class="font-weight-light">System Developer</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-server menu-icon"></i>
              <span class="menu-title">Manage Expenses</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('new-expense')?>">New Expense</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('upload')?>">Upload Contract</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('manage-expenses')?>">List of Expenses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('contracts')?>">Contracts</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('generate-expense')?>">
              <i class="mdi mdi-buffer menu-icon"></i>
              <span class="menu-title">Generate</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Reports</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?=site_url('rent-expense')?>">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Rental Expense</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Expense Report</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-receipt menu-icon"></i>
              <span class="menu-title">Bills Payable</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Others</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('settings')?>">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <ul class="mt-4 pl-0">
                  <li class="btn bg-primary text-white">Sign Out</li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-earth"></i> English </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="#"> French </a>
                  <a class="dropdown-item" href="#"> Spain </a>
                  <a class="dropdown-item" href="#"> Latin </a>
                  <a class="dropdown-item" href="#"> Japanese </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/pic-1.png" />
                  <span class="profile-name">Henry Klein</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Rent Expense</span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print 
                </button>
              </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card bg-warning">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                <p class="mb-0 color-card-head">Total Contract Expenses</p>
                                <h2 class="text-white"><?php echo number_format($contract,2) ?></h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-poll bg-inverse-icon-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-danger">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                <p class="mb-0 color-card-head">Balances</p>
                                <h2 class="text-white"><?php echo number_format($balance,2) ?></h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-poll bg-inverse-icon-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-primary">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                <p class="mb-0 color-card-head">Pending</p>
                                <h2 class="text-white"><?php echo number_format($pending,2) ?></h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-poll bg-inverse-icon-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-success">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                <p class="mb-0 color-card-head">Paid</p>
                                <h2 class="text-white"><?php echo number_format($paid,2) ?></h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-poll bg-inverse-icon-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="tableFixHead" style="font-size:13px;">
              <table class="table-bordered table-striped">
                <thead>
                  <th>Payee Details</th>
                  <th>Total Contract</th>
                  <th>Balance</th>
                  <th>Jan</th>
                  <th>Feb</th>
                  <th>Mar</th>
                  <th>Apr</th>
                  <th>May</th>
                  <th>Jun</th>
                  <th>Jul</th>
                  <th>Aug</th>
                  <th>Sept</th>
                  <th>Oct</th>
                  <th>Nov</th>
                  <th>Dec</th>
                  <th>Total</th>
                </thead>
                <tbody>
                  <?php foreach($expense as $row): ?>
                    <tr>
                      <td><?php echo $row->Payee ?></td>
                      <td><?php echo number_format($row->TotalAmount,2) ?></td>
                      <td><?php echo number_format($row->TotalAmount-$row->Total,2) ?></td>
                      <td><?php echo number_format($row->Jan,2) ?></td>
                      <td><?php echo number_format($row->Feb,2) ?></td>
                      <td><?php echo number_format($row->Mar,2) ?></td>
                      <td><?php echo number_format($row->Apr,2) ?></td>
                      <td><?php echo number_format($row->May,2) ?></td>
                      <td><?php echo number_format($row->Jun,2) ?></td>
                      <td><?php echo number_format($row->Jul,2) ?></td>
                      <td><?php echo number_format($row->Aug,2) ?></td>
                      <td><?php echo number_format($row->Sept,2) ?></td>
                      <td><?php echo number_format($row->Oct,2) ?></td>
                      <td><?php echo number_format($row->Nov,2) ?></td>
                      <td><?php echo number_format($row->Dis,2) ?></td>
                      <td><?php echo number_format($row->Total,2) ?></td>
                    </tr>
                  <?php endforeach;?>
                  <?php foreach($total_rent as $row): ?>
                    <tr style="font-weight:bold;border:2px solid blue;">
                      <td colspan='3'>Total</td>
                      <td><?php echo number_format($row->Jan,2) ?></td>
                      <td><?php echo number_format($row->Feb,2) ?></td>
                      <td><?php echo number_format($row->Mar,2) ?></td>
                      <td><?php echo number_format($row->Apr,2) ?></td>
                      <td><?php echo number_format($row->May,2) ?></td>
                      <td><?php echo number_format($row->Jun,2) ?></td>
                      <td><?php echo number_format($row->Jul,2) ?></td>
                      <td><?php echo number_format($row->Aug,2) ?></td>
                      <td><?php echo number_format($row->Sept,2) ?></td>
                      <td><?php echo number_format($row->Oct,2) ?></td>
                      <td><?php echo number_format($row->Nov,2) ?></td>
                      <td><?php echo number_format($row->Dis,2) ?></td>
                      <td><?php echo number_format($row->Total,2) ?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
          </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © APFC <?php echo date('Y') ?></span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>