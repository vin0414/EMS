<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - New Expense</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/fastcat.png" />
    <style>
      .tableFixHead thead th { position: sticky; top: 0; z-index: 1;color:#fff;background-color:#0275d8;}
			table  { border-collapse: collapse; width: 100%; }
			th, td { padding: 8px 16px;color:#000; }
			tbody{color:#000;}
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
                  <a class="nav-link active" href="<?=site_url('new-expense')?>">New Expense</a>
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
                  <li class="btn btn-primary text-white">Sign Out</li>
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
              <h3 class="mb-0"> Expense Sheet List</h3>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="tabs">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="pill" href="#rental"><span class="mdi mdi-square-inc-cash"></span>&nbsp;Rental Expense</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#utilities"><span class="mdi mdi-clipboard-outline"></span>&nbsp;Utilities</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#consumables"><span class="mdi mdi-bulletin-board"></span>&nbsp;Consumables</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="rental">
                      <button type="button" class="btn btn-sm bg-white btn-icon-text border" id="btnAdd">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Add Entry 
                      </button>
                      <form method="POST" class="row" id="frmExpense" action="" style="margin-top:10px;">
                        <div class="col-12 form-group tableFixHead" style="height:400px;overflow-y:auto;">
                          <table class="table-striped table-hover">
                            <thead>
                              <th>#</th>
                              <th>Date</th>
                              <th>Type of Expense</th>
                              <th>Details</th>
                              <th>Status</th>
                              <th>Action</th>
                            </thead>
                            <tbody id="tblexpenses">
                              <tr>
                                <td>
                                  <input type="checkbox" name="itemID[]" id="itemID" style="height:20px;width:18px;" checked/>
                                </td>
                                <td>2024-04-25</td>
                                <td>Rental Expense</td>
                                <td>Ticketing Office</td>
                                <th><span class="badge btn-warning text-white">NOT SUBMITTED</span></th>
                                <td>
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm">Select</button>
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                      <h6 class="dropdown-header">Action</h6>
                                      <a class="dropdown-item" href="#"><i class="mdi mdi-send"></i>&nbsp;Submit</a>
                                      <a class="dropdown-item" href="#"><i class="mdi mdi-delete"></i>&nbsp;Delete</a>
                                      <a class="dropdown-item" href="#"><i class="mdi mdi-pencil-box-outline"></i>&nbsp;Edit</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-12 form-group">
                          <button type="submit" class="btn btn-primary" id="btnSave"><i class="mdi mdi-content-save"></i>&nbsp;Submit All</button>
                          <button type="button" class="btn btn-danger" id="btndelete"><i class="mdi mdi-delete-variant"></i>&nbsp;Delete All</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="utilities">
                      <form method="POST" class="row" id="frmUtilities">
                        <div class="col-12 form-group">
                          <label>Type of Expense</label>
                          <select class="js-example-basic-single" name="expenses" style="width:100%;">
                            <option value="">Choose</option>
                            <?php foreach($account as $row):?>
                              <option value="<?php echo $row['expID'] ?>"><?php echo $row['Description'] ?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="col-12 form-group">
                          <label>Paid To</label>
                          <input type="text" class="form-control" name="payee"/>
                        </div>
                        <div class="col-12 form-group">
                          <label>Details</label>
                          <textarea class="form-control" name="details" style="height:150px;overflow-y:auto;"></textarea>
                        </div>
                        <div class="col-12 form-group">
                          <input type="checkbox" name="due_date_selection" id="due_date_selection" value="1" style="height:20px;width:18px;"/>&nbsp;Last Day of the Month?
                        </div>
                        <div class="col-12 form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>Day of the Month</label>
                              <input type="number" class="form-control" name="day_month" id="day_month"/>
                            </div>
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
                              <input type="text" class="form-control" name="amount" placeholder="0.00"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 form-group">
                          <button type="submit" class="btn btn-primary save">Save Entry</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="consumables">
                    </div>
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
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Rentals</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form method="POST" class="row" id="frmEntry">
              <div class="col-12 form-group">
                <label>Type of Expense</label>
                <select class="js-example-basic-single" name="expenses" style="width:100%;">
                  <option value="">Choose</option>
                  <?php foreach($account as $row):?>
                    <option value="<?php echo $row['expID'] ?>"><?php echo $row['Description'] ?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="col-12 form-group">
                <label>Paid To</label>
                <input type="text" class="form-control" name="payee"/>
              </div>
              <div class="col-12 form-group">
                <label>Details</label>
                <textarea class="form-control" name="details" style="height:150px;overflow-y:auto;"></textarea>
              </div>
              <div class="col-12 form-group">
              <input type="checkbox" name="due_date" id="due_date" value="1" style="height:20px;width:18px;"/>&nbsp;Last Day of the Month?
              </div>
              <div class="col-12 form-group">
                <div class="row">
                  <div class="col-lg-4">
                    <label>Day of the Month</label>
                    <input type="number" class="form-control" name="day_month" id="day"/>
                  </div>
                  <div class="col-lg-3">
                    <label>Life Span</label>
                    <input type="number" class="form-control" name="lifespan"/>
                  </div>
                  <div class="col-lg-5">
                    <label>Due Date</label>
                    <input type="date" class="form-control" name="expiration_date"/>
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
                    <input type="text" class="form-control" name="amount" placeholder="0.00"/>
                  </div>
                  <div class="col-lg-4">
                    <label>Total Amount</label>
                    <input type="text" class="form-control" name="total_amount" placeholder="0.00"/>
                  </div>
                </div>
              </div>
              <div class="col-12 form-group">
                <button type="submit" class="btn btn-primary" id="BtnSend">Save Entry</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="modal-loading" data-backdrop="static">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-body text-center">
					<div class="spinner-border"></div>
					<div>Loading</div>
				</div>
				</div>
			</div>
		</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- endinject -->
    <script>
      $('#btnAdd').on('click',function()
      {
        $('#myModal').modal('show');
      });
      
      $('#due_date_selection').change(function(){
        if (!$(this).prop("checked")) {
          $('#day_month').attr("disabled",false);
        }
        else
        {
          $('#day_month').attr("disabled",true);
        }
      });

      $('#due_date').change(function(){
        if (!$(this).prop("checked")) {
          $('#day').attr("disabled",false);
        }
        else
        {
          $('#day').attr("disabled",true);
        }
      });
      $('#frmEntry').on('submit',function(e)
      {
        e.preventDefault();
        var data = $(this).serialize();
        $('#modal-loading').modal('show');
        $.ajax({
          url:"<?=site_url('save-rental-entry')?>",method:"POST",
          data:data,success:function(response)
          {
            $('#modal-loading').modal('hide');
            if(response==="success")
            {
              alert("Great! Successfully submitted");
              $('#frmEntry')[0].reset();
            }
            else
            {
              alert(response);
            }
          }
        });
      });

      $('#frmUtilities').on('submit',function(e)
      {
        e.preventDefault();
        var data = $('#frmUtilities').serialize();
        $('#modal-loading').modal('show');
        $.ajax({
          url:"<?=site_url('save-expense')?>",method:"POST",
          data:data,success:function(response)
          {
            $('#modal-loading').modal('hide');
            if(response==="success")
            {
              alert("Great! Successfully submitted");
              $('#frmUtilities')[0].reset();
            }
            else
            {
              alert(response);
            }
          }
        });
      });
    </script>
  </body>
</html>