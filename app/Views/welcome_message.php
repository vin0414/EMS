<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>EMS - Expense Monitoring System</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
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
            <a class="nav-link" href="">
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
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email 
                </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print 
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Total Expenses</p>
                            <h2 class="text-white">8,753.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-poll bg-inverse-icon-warning"></i>
                        </div>
                        <h6 class="text-white">18.33% Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Monthly Expenses</p>
                            <h2 class="text-white">5,300.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-poll bg-inverse-icon-danger"></i>
                        </div>
                        <h6 class="text-white">13.21% Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">For Payment</p>
                            <h2 class="text-white">1,753.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cash bg-inverse-icon-primary"></i>
                        </div>
                        <h6 class="text-white">67.98% Since last month</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Monthly Expenses</h5>
                        <p class="text-muted"> Show overview jan 2018 - Dec 2019 <a class="text-muted font-weight-medium pl-2" href="#"><u>See Details</u></a>
                        </p>
                      </div>
                      <div class="col-sm-5 text-md-right">
                        <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                          <i class="mdi mdi-download btn-icon-prepend"></i>Download</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Earnings</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$5,300</h3>
                                <p class="text-success m-0">-310 avg. sales</p>
                              </div>
                              <div id="earningChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Product Sold</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$9,100</h3>
                                <p class="text-danger m-0">-310 avg. sales</p>
                              </div>
                              <div id="productChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Orders</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$4,354</h3>
                                <p class="text-success m-0">-310 avg. sales</p>
                              </div>
                              <div id="orderChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12">
                        <div class="flot-chart-wrapper">
                          <div id="flotChart" class="flot-chart">
                            <canvas class="flot-base"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Recent Expenses</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                            <th>Expense</th>
                            <th>Details</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="assets/images/faces/face1.jpg" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> Cecelia Cooper </p>
                                  <small> Payment on hold</small>
                                </div>
                              </div>
                            </td>
                            <td>Angular Admin</td>
                            <td>
                              <div class="badge badge-inverse-success"> Completed </div>
                            </td>
                            <td>$ 77.99</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="assets/images/faces/face10.jpg" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> Victor Watkins </p>
                                  <small>Email verified</small>
                                </div>
                              </div>
                            </td>
                            <td>Angular Admin</td>
                            <td>
                              <div class="badge badge-inverse-success"> Completed </div>
                            </td>
                            <td>$245.30</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="assets/images/faces/face11.jpg" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> Ada Burgess </p>
                                  <small>Email verified</small>
                                </div>
                              </div>
                            </td>
                            <td>One page html</td>
                            <td>
                              <div class="badge badge-inverse-danger"> Completed </div>
                            </td>
                            <td>$ 160.25</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="assets/images/faces/face13.jpg" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> Dollie Lynch </p>
                                  <small>Email verified</small>
                                </div>
                              </div>
                            </td>
                            <td>Wordpress</td>
                            <td>
                              <div class="badge badge-inverse-success"> Declined </div>
                            </td>
                            <td>$ 123.21</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="assets/images/faces/face16.jpg" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> Harry Holloway </p>
                                  <small>Payment on process</small>
                                </div>
                              </div>
                            </td>
                            <td>VueJs Application</td>
                            <td>
                              <div class="badge badge-inverse-danger"> Declined </div>
                            </td>
                            <td>$ 150.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <a class="text-black mt-3 d-block pl-4" href="#">
                      <span class="font-weight-medium h6">View all order history</span>
                      <i class="mdi mdi-chevron-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title font-weight-medium">Expenses </div>
                    <div class="d-flex flex-wrap border-bottom py-2 border-top justify-content-between">
                      <img class="survey-img mb-lg-3" src="assets/images/dashboard/img_3.jpg" alt="" />
                      <div class="pt-2">
                        <h5 class="mb-0">Villa called Archagel</h5>
                        <p class="mb-0 text-muted">St, San Diego, CA</p>
                        <h5 class="mb-0">$600/mo</h5>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap border-bottom py-2 justify-content-between">
                      <img class="survey-img mb-lg-3" src="assets/images/dashboard/img_1.jpg" alt="" />
                      <div class="pt-2">
                        <h5 class="mb-0">Luxury villa in Hermo</h5>
                        <p class="mb-0 text-muted">Glendale, CA</p>
                        <h5 class="mb-0">$900/mo</h5>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap border-bottom py-2 justify-content-between">
                      <img class="survey-img mb-lg-3" src="assets/images/dashboard/img_2.jpg" alt="" />
                      <div class="pt-2">
                        <h5 class="mb-0">House on the Clarita</h5>
                        <p class="mb-0 text-muted">Business Survey</p>
                        <h5 class="mb-0">$459/mo</h5>
                      </div>
                    </div>
                    <a class="text-black mt-3 d-block font-weight-medium h6" href="#">View all <i class="mdi mdi-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-8 col-md-6 grid-margin stretch-card">
                <div class="card card-invoice">
                  <div class="card-body">
                    <h4 class="card-title pb-3">Pending invoices</h4>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face2.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>06 Jan 2019</span>
                              <h6 class="mb-1 mb-sm-0">Isabel Cross</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-info">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face3.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>18 Mar 2019</span>
                              <h6 class="mb-1 mb-sm-0">Carrie Parker</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-primary">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face11.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>10 Apr 2019</span>
                              <h6 class="mb-1 mb-sm-0">Don Bennett</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-warning">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face3.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>18 Mar 2019</span>
                              <h6 class="mb-1 mb-sm-0">Carrie Parker</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-info">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <!--datepicker-->
                <div class="card">
                  <div class="card-body">
                    <div id="inline-datepicker" class="datepicker table-responsive"></div>
                  </div>
                </div>
                <!--datepicker ends-->
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
  </body>
</html>