<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - Settings</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <link rel="shortcut icon" href="assets/images/fastcat.png" />
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
            <a class="nav-link active" href="<?=site_url('settings')?>">
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
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Account Expense</span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border add">
                  <i class="mdi mdi-plus btn-icon-prepend"></i> Add Entry 
                </button>
              </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th class="bg-primary text-white">#</th>
                                <th class="bg-primary text-white">Details</th>
                                <th class="bg-primary text-white">GL Code</th>
                                <th class="bg-primary text-white">Action</th>
                            </thead>
                            <tbody>
                              <?php foreach($list as $row): ?>
                                <tr>
                                  <td><?php echo $row['expID'] ?></td>
                                  <td><?php echo $row['Description'] ?></td>
                                  <td><?php echo $row['GLCode'] ?></td>
                                  <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm">Select</button>
                                      <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                        <h6 class="dropdown-header">Action</h6>
                                        <button type="button" class="dropdown-item remove" value="<?php echo $row['expID'] ?>"><i class="mdi mdi-delete"></i>&nbsp;Delete</button>
                                        <button type="button" class="dropdown-item edit" value="<?php echo $row['expID'] ?>"><i class="mdi mdi-pencil-box-outline"></i>&nbsp;Edit</button>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
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
    <div class="modal fade" id="accountExpenseModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Account Expense</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form method="POST" class="row" id="frmAdd">
              <div class="col-12 form-group">
                <label>Details</label>
                <textarea class="form-control" name="details" style="height:150px;"></textarea>
              </div>
              <div class="col-12 form-group">
                <label>GL Code</label>
                <input type="text" class="form-control" name="glcode"/>
              </div>
              <div class="col-12 form-group">
                <button type="submit" class="btn btn-primary" id="btnSave">Save Entry</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Account Expense</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" id="output">
            
          </div>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script>
      $(document).ready( function () {
          $('.table').DataTable();
      });
      $('.add').on('click',function()
      {
        $('#accountExpenseModal').modal('show');
      });
      $('.edit').on('click',function()
      {
        var val = $(this).val();
        $.ajax({
          url:"<?=site_url('view-details')?>",method:"GET",
          data:{value:val},success:function(response){
            $('#editModal').modal('show');
            $('#output').html(response);
          }
        });
      });
      $(document).on('click','.remove',function(){
        var confirmation = confirm("Do you want to remove this selected item?");
        if(confirmation)
        {
          var val = $(this).val();
          $.ajax({
            url:"<?=site_url('remove-code')?>",method:"POST",
            data:{value:val},success:function(response){
              if(response==="success"){location.reload();}else{alert(response);}
            }
          });
        }
      })
      $('#btnSave').on('click',function(e){
        e.preventDefault();
        var data = $('#frmAdd').serialize();
        $.ajax({
          url:"<?=site_url('save-code')?>",method:"POST",data:data,success:function(response)
          {
            if(response==="success"){location.reload();}else{alert(response);}
          }
        });
      });
      $(document).on('click','.update',function(e){
        e.preventDefault();
        var data = $('#editForm').serialize();
        $.ajax({
          url:"<?=site_url('modify-code')?>",method:"POST",data:data,success:function(response)
          {
            if(response==="success"){location.reload();}else{alert(response);}
          }
        });
      });
    </script>
  </body>
</html>