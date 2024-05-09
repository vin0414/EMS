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
      ::-webkit-scrollbar-track {
        background: #f1f1f1; 
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888; 
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555; 
      }
      ::-webkit-scrollbar {
          height: 4px;              /* height of horizontal scrollbar ← You're missing this */
          width: 4px;               /* width of vertical scrollbar */
          border: 1px solid #d5d5d5;
        }
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
            <a class="nav-link" href="<?=site_url('rent-expense')?>">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Rental Expense</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('expense-report')?>">
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
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border add" id="btnAdd">
                  <i class="mdi mdi-plus btn-icon-prepend"></i> Add Entry 
                </button>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <form method="POST" class="row" id="frmExpense" action="" style="margin-top:10px;">
                  <div class="col-12 form-group tableFixHead" style="height:400px;overflow-y:auto;font-size:13px;">
                    <table class="table-striped table-hover">
                      <thead>
                        <th>#</th>
                        <th>Date</th>
                        <th>Type of Expense</th>
                        <th>Details</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="tblexpenses">
                      </tbody>
                    </table>
                  </div>
                  <div class="col-12 form-group">
                    <button type="submit" class="btn btn-primary" id="btnSave" disabled><i class="mdi mdi-content-save"></i>&nbsp;Submit All</button>
                    <button type="button" class="btn btn-danger" id="btnDelete" disabled><i class="mdi mdi-delete-variant"></i>&nbsp;Delete All</button>
                  </div>
                </form>
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
                <select class="js-example-basic-single" name="expenses" id="expenses" style="width:100%;">
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
                    <label>Life</label>
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
      $(document).ready(function(){
        loadRentals();
      });
      function loadRentals()
      {
        $('#tblexpenses').html("<tr><td colspan='7'><center>Loading...</center></td></tr>");
        $.ajax({
          url:"<?=site_url('list-rentals')?>",method:"GET",
          success:function(response)
          {
            if(response==="")
            {
              $('#tblexpenses').html("<tr><td colspan='7'><center>No Record(s)</center></td></tr>");
              $('#btnSave').attr("disabled",true);
              $('#btnDelete').attr("disabled",true);
            }
            else
            {
              $('#tblexpenses').html(response);
              $('#btnSave').attr("disabled",false);
              $('#btnDelete').attr("disabled",false);
            }
          }
        });
      }
      $('#btnSave').on('click',function(e){
          e.preventDefault();
          var confirmation = confirm("Do you want to submit all items?");
          if(confirmation)
          {
            var data = $('#frmExpense').serialize();
            $.ajax({
              url:"<?=site_url('send-all')?>",method:"POST",
              data:data,success:function(response)
              {
                $('#modal-loading').modal('hide');
                if(response==="success")
                {
                  loadRentals();
                }
                else
                {
                  alert(response);
                }
              }
            });
          }
      });
      $('#btnDelete').on('click',function(e){
        e.preventDefault();
        var confirmation = confirm("Do you want to delete all items?");
        if(confirmation)
        {
          var data = $('#frmExpense').serialize();
          $('#modal-loading').modal('show');
          $.ajax({
            url:"<?=site_url('delete-all')?>",method:"POST",
            data:data,success:function(response)
            {
              $('#modal-loading').modal('hide');
              if(response==="success")
              {
                loadRentals();
              }
              else
              {
                alert(response);
              }
            }
          });
        }
      });
      $(document).on('click','.deleteItem',function(){
        var confirmation = confirm("Do you want to delete this item?");
        if(confirmation)
        {
          $.ajax({
            url:"<?=site_url('delete-item')?>",method:"POST",
            data:{value:$(this).val()},success:function(response)
            {
              if(response==="success")
              {
                loadRentals();
              }
              else
              {
                alert(response);
              }
            }
          });
        }
      });
      $(document).on('click','.sendItem',function(){
        var confirmation = confirm("Do you want to send this selected item?");
        if(confirmation)
        {
          $.ajax({
            url:"<?=site_url('send-item')?>",method:"POST",
            data:{value:$(this).val()},success:function(response)
            {
              if(response==="success")
              {
                loadRentals();
              }
              else
              {
                alert(response);
              }
            }
          });
        }
      });
      $('#btnAdd').on('click',function(){$('#myModal').modal('show');});
    

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
              loadRentals();
              $('#myModal').modal('hide');
              document.getElementById('expenses').selectedIndex = 0;
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