<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - Edit Rental Expense</title>
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="/assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="shortcut icon" href="/assets/images/fastcat.png" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="/"><img src="/assets/images/fastcat.png" alt="logo"/></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="/"><img src="/assets/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="/assets/images/faces/pic-1.png" alt="profile" />
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
            <div class="collapse show" id="ui-basic">
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
                  <a class="nav-link active" href="">Edit Rental Expense</a>
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
            <div class="row">
              <div class="col-lg-2 form-group"></div>
              <div class="col-lg-8 form-group">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title"><i class="mdi mdi-pencil-outline"></i> Edit Rental Expense</div>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('fail'); ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" class="row" id="frmEntry">
                        <div class="col-12 form-group">
                            <label>Type of Expense</label>
                            <select class="js-example-basic-single" name="expenses" id="expenses" style="width:100%;">
                            <option value="">Choose</option>
                            <?php foreach($account as $row):?>
                                <option value="<?php echo $row['expID'] ?>"><?php echo $row['Description'] ?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <label>Paid To</label>
                            <input type="text" class="form-control" name="payee" value="<?=$rent['Payee']?>"/>
                        </div>
                        <div class="col-12 form-group">
                            <label>Details</label>
                            <textarea class="form-control" name="details" style="height:150px;overflow-y:auto;"><?=$rent['Details']?></textarea>
                        </div>
                        <div class="col-12 form-group">
                        <?php if($rent['LastDay']==1){ ?>
                            <input type="checkbox" name="due_date" id="due_date" value="1" style="height:20px;width:18px;" checked/>&nbsp;Last Day of the Month?
                        <?php }else{ ?>
                            <input type="checkbox" name="due_date" id="due_date" value="1" style="height:20px;width:18px;"/>&nbsp;Last Day of the Month?
                        <?php } ?>
                        </div>
                        <div class="col-12 form-group">
                            <div class="row">
                            <div class="col-lg-4">
                                <label>Day of the Month</label>
                                <input type="number" class="form-control" value="<?=$rent['Day']?>" name="day_month" id="day"/>
                            </div>
                            <div class="col-lg-3">
                                <label>Life Span</label>
                                <input type="number" class="form-control" value="<?=$rent['LifeSpan']?>" name="lifespan"/>
                            </div>
                            <div class="col-lg-5">
                                <label>Due Date</label>
                                <input type="date" class="form-control" value="<?=$rent['DueDate']?>" name="expiration_date"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <div class="row">
                            <div class="col-lg-4">
                                <label>Mode of Payment</label>
                                <select class="form-control" name="mode_payment">
                                <option value="">Choose</option>
                                <option>Cash</option>
                                <option>Check</option>
                                <option>Credit</option>
                                <option>Bank</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount" value="<?=$rent['Amount']?>" placeholder="0.00"/>
                            </div>
                            <div class="col-lg-4">
                                <label>Total Amount</label>
                                <input type="text" class="form-control" name="total_amount" value="<?=$rent['TotalAmount']?>" placeholder="0.00"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" class="btn btn-primary" id="BtnSend">Save Changes</button>
                        </div>
                    </form>
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
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/vendors/select2/select2.min.js"></script>
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <script src="/assets/js/select2.js"></script>
    <!-- endinject -->
    <script>
    $('#due_date').change(function(){
        if (!$(this).prop("checked")) {
          $('#day').attr("disabled",false);
          document.getElementById('day').value=0;
        }
        else
        {
          $('#day').attr("disabled",true);
          document.getElementById('day').value=0;
        }
      });
    </script>
  </body>
</html>