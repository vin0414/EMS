<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - Generate Expenses</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
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
      .tab-content{background-color: #ffffff;}
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
            <a class="nav-link active" href="<?=site_url('generate-expense')?>">
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
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Expense Monitoring System</span>
              </h3>
            </div>
            <div class="tabs">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#all_expense"><span class="mdi mdi-book-open"></span>&nbsp;Generate Rent Expense</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#rent_expense"><span class="mdi mdi-clipboard-outline"></span>&nbsp;Rent Expenses</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="all_expense">
                  <form method="POST" class="row" id="frmGenerate">
                    <div class="col-12 form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label><b>Month</b></label>
                          <select name="month" id="month" class="form-control">
                            <option value="">Choose</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                        </div>
                        <div class="col-lg-3">
                          <label><b>Year</b></label>
                          <select name="year" id="year" class="form-control">
                            <option value="">Choose</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                          </select>
                        </div>
                        <div class="col-lg-2">
                          <label>&nbsp;</label>
                          <button type="submit" class="form-control btn btn-primary btn-sm" id="btnGenerate">Generate</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 form-group tableFixHead" style="height:400px;overflow-y:auto;font-size:13px;">
                      <table class="table-striped table-hover">
                        <thead>
                          <th>#</th>
                          <th>Payee</th>
                          <th>Details</th>
                          <th>Life</th>
                          <th>Beg. Balance</th>
                          <th>Amount</th>
                          <th>New Balance</th>
                        </thead>
                        <tbody id="tblexpenses">
                        </tbody>
                      </table>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="rent_expense">
                  <div class="tableFixHead" style="height:400px;overflow-y:auto;font-size:13px;">
                      <table class="table-striped table-hover">
                        <thead>
                          <th>Due Date</th>
                          <th>Type of Expense</th>
                          <th>Payee</th>
                          <th>Details</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>File(s)</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="tbl_rent_expense">
                        </tbody>
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

    <div class="modal fade" id="uploadModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Upload</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form method="POST" class="row" id="frmUpload" enctype="multipart/form-data">
              <input type="hidden" name="rentalID" id="rentalID"/>
              <div class="col-12 form-group">
                <label>Attachment</label>
                <input type="file" name="file" class="form-control"/>
              </div>
              <div class="col-12 form-group">
                <button type="submit" class="btn btn-primary" id="btnUpload">Upload File</button>
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
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script>
      $(document).ready(function(){
        loadRental();loadRentalExpense();
      });

      $(document).on('click','.upload',function(){
        var confirmation = confirm('Do you want to upload the proof of payment?');
        if(confirmation)
        {
          $('#uploadModal').modal('show');
          $('#rentalID').attr("Value",$(this).val());
        }
      });

      $('#frmUpload').on('submit',function(evt)
      {
        evt.preventDefault();
        $.ajax({
            url:"<?=site_url('upload-proof-file')?>",method:"POST",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
              $('#modal-loading').modal('show');
            },
            success:function(response)
            {
              $('#modal-loading').modal('hide');
              if(response==="success")
              {
                alert("Great! Successfully uploaded");
                loadRentalExpense();
                $('#uploadModal').modal('hide');
              }
              else
              {
                alert(response);
              }
            }
        });
      });

      $('#btnGenerate').on('click',function(e){
        e.preventDefault();
        var data = $('#frmGenerate').serialize();
        $('#modal-loading').modal('show');
        $.ajax({
          url:"<?=site_url('generate-rent-expense')?>",method:"POST",
          data:data,
          success:function(response)
          {
            $('#modal-loading').modal('hide');
            if(response==="success")
            {
              $('#frmGenerate')[0].reset();
              loadRental();
            }
            else
            {
              alert(response);
            }
          }
        });
      });

      function loadRental()
      {
        $('#tblexpenses').html("<tr><td colspan='7'><center>Loading...</center></td></tr>");
        $.ajax({
          url:"<?=site_url('all-rental-expense')?>",method:"GET",
          success:function(response)
          {
            if(response===""){
              $('#tblexpenses').html("<tr><td colspan='7'><center>No Data(s)</center></td></tr>");
            }
            else{
              $('#tblexpenses').html(response);
            }
          }
        });
      }

      function loadRentalExpense()
      {
        $('#tbl_rent_expense').html("<tr><td colspan='8'><center>Loading...</center></td></tr>");
        $.ajax({
          url:"<?=site_url('load-pending-rent-expense')?>",method:"GET",
          success:function(response)
          {
            if(response==="")
            {
              $('#tbl_rent_expense').html("<tr><td colspan='8'><center>No Record(s)</center></td></tr>");
            }
            else
            {
              $('#tbl_rent_expense').html(response);
            }
          }
        });
      }
    </script>
  </body>
</html>