<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - Manage Expenses</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <link rel="shortcut icon" href="assets/images/fastcat.png" />
    <style>
      .tab-content{background-color: #ffffff;}
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
                  <a class="nav-link active" href="<?=site_url('manage-expenses')?>">List of Expenses</a>
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
            <a class="nav-link" href="">
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
              <h3 class="mb-0"> List of Expenses
              </h3>
            </div>
            <?php if(!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?> 
            <div class="tabs">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#all_expense"><span class="mdi mdi-book-open"></span>&nbsp;Rentals</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#utility"><span class="mdi mdi-clipboard-outline"></span>&nbsp;Utilities</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#consumables"><span class="mdi mdi-bulletin-board"></span>&nbsp;Consumables</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#pending"><span class="mdi mdi-bell-ring-outline"></span>&nbsp;Pending</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#overdue"><span class="mdi mdi-archive"></span>&nbsp;Overdue</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="all_expense">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%;">
                      <thead>
                        <th class="bg-primary text-white">Date Created</th>
                        <th class="bg-primary text-white">Type of Expense</th>
                        <th class="bg-primary text-white">Details</th>
                        <th class="bg-primary text-white">Amount</th>
                        <th class="bg-primary text-white">Total Amount</th>
                        <th class="bg-primary text-white">Lifespan</th>
                        <th class="bg-primary text-white">Due Date</th>
                        <th class="bg-primary text-white">Action</th>
                      </thead>
                      <tbody>
                        <?php foreach($rental as $row): ?>
                          <tr>
                            <td><?php echo $row->DateCreated ?></td>
                            <td><?php echo $row->Description ?></td>
                            <td><?php echo $row->Details ?></td>
                            <td><?php echo number_format($row->Amount,2) ?></td>
                            <td><?php echo number_format($row->TotalAmount,2) ?></td>
                            <td><?php echo $row->LifeSpan ?></td>
                            <td><?php echo $row->DueDate ?></td>
                            <td>
                              <a href="<?=site_url('edit-rental/')?><?php echo $row->rentalID ?>" class="btn btn-primary"><span class="mdi mdi-pencil-outline"></span>&nbsp;Edit</a>
                            </td>
                          </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="utility">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%;">
                      <thead>
                        <th class="bg-primary text-white">Date Created</th>
                        <th class="bg-primary text-white">Type of Expense</th>
                        <th class="bg-primary text-white">Payee</th>
                        <th class="bg-primary text-white">Details</th>
                        <th class="bg-primary text-white">Amount</th>
                        <th class="bg-primary text-white">Status</th>
                        <th class="bg-primary text-white">Action</th>
                      </thead>
                      <tbody>
                        <?php foreach($utility as $row): ?>
                        <tr>
                          <td><?php echo $row->DateCreated ?></td>
                          <td><?php echo $row->Description ?></td>
                          <td><?php echo $row->Payee ?></td>
                          <td><?php echo $row->Details ?></td>
                          <td><?php echo number_format($row->Amount,2) ?></td>
                          <td>
                            <?php if($row->Status==1){ ?>
                              <span class="badge bg-info text-white">ON PROCESS</span>
                            <?php }else if($row->Status==0){ ?>
                              <span class="badge bg-danger text-white">CANCELLED</span>
                            <?php }else{?>
                              <span class="badge bg-success text-white">ARCHIVE</span>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if($row->Status==1){ ?>
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              More<span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                <a class="dropdown-item" href="<?=site_url('edit-utility-expense/')?><?php echo $row->utilityID ?>">Edit</a>
                                <button type="button" class="dropdown-item cancel" value="<?php echo $row->utilityID ?>">Cancel</button>
                              </div>
                            </div>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="consumables">
                </div>
                <div class="tab-pane fade" id="pending">
                  <div class="table-responsive">
                    <table class="table" style="width:100%;">
                      <thead>
                        <th class="bg-primary text-white">Date Created</th>
                        <th class="bg-primary text-white">Type of Expense</th>
                        <th class="bg-primary text-white">Details</th>
                        <th class="bg-primary text-white">Amount</th>
                        <th class="bg-primary text-white">Due Date</th>
                        <th class="bg-primary text-white">Action</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2024-04-26</td>
                          <td>Service Fee</td>
                          <td>Sample of details here</td>
                          <td>50,000.00</td>
                          <td>2024-04-30</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary btn-sm">Select</button>
                              <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                <h6 class="dropdown-header">Action</h6>
                                <a class="dropdown-item" href="#">Upload Proof</a>
                                <a class="dropdown-item" href="#">Cancel</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="overdue">
                  <div class="table-responsive">
                    <table class="table" style="width:100%;">
                      <thead>
                        <th class="bg-primary text-white">Date Created</th>
                        <th class="bg-primary text-white">Type of Expense</th>
                        <th class="bg-primary text-white">Details</th>
                        <th class="bg-primary text-white">Amount</th>
                        <th class="bg-primary text-white">Due Date</th>
                        <th class="bg-primary text-white">Action</th>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
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
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script>
      $(document).ready( function () {
          $('.table').DataTable();
      });
      $(document).on('click','.cancel',function(){
        var confirmation = confirm('Do you want to cancel this expense?');
        if(confirmation)
        {
          $.ajax({
            url:"<?=site_url('cancel-expense')?>",method:"POST",
            data:{value:$(this).val()},success:function(response)
            {
              if(response==="success"){location.reload();}else{alert(response);}
            }
          });
        }
      });
    </script>
  </body>
</html>