<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>The Brand</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ URL::to('/') }}/images/favicon.png" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/fontawesome/css/all.css">
  // for serchable table
  <style>
    body {
                padding: 20px 20px;
            }
        .results tr[visible='false'],
            .no-result {
                display: none;
            }

            .results tr[visible='true'] {
                display: table-row;
            }

            .counter {
                padding: 8px;
                color: #ccc;
            }
  </style>
   // for serchable table
</head>
<body>
    <div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      {{-- <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ URL::to('/') }}/images/logo.svg" class="mr-2" alt="logo"/></a> --}}
      <h3>The Brand</h3>
      {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ URL::to('/') }}/images/logo-mini.svg" alt="logo"/></a> --}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      
      <ul class="navbar-nav navbar-nav-right">
        
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{ URL::to('/') }}/images/admin/default.png" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
           
            <a class="dropdown-item" href="admin_logout">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    
    <div id="right-sidebar" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
              <div class="form-group d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
              </div>
            </form>
          </div>
          <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Team review meeting at 3.00 PM
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Resolve all the low priority tickets due today
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Schedule meeting for next week
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Project review
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
            </ul>
          </div>
          <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary mr-2"></i>
              <span>Feb 11 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
            <p class="text-gray mb-0">The total number of sessions</p>
          </div>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary mr-2"></i>
              <span>Feb 7 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
          </div>
        </div>
        <!-- To do section tab ends -->
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
          </div>
          <ul class="chat-list">
            <li class="list active">
              <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <div class="wrapper d-flex">
                  <p>Catherine</p>
                </div>
                <p>Away</p>
              </div>
              <div class="badge badge-success badge-pill my-auto mx-2">4</div>
              <small class="text-muted my-auto">23 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Sarah Graves</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">47 min</small>
            </li>
          </ul>
        </div>
        <!-- chat tab ends -->
      </div>
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/') }}/admin/user">Users</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/') }}/admin/product">Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/') }}/admin/order">Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/') }}/admin/add_to_cart">Add to Cart</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/') }}/admin/offer_discount">Offer Discount</a></li> --}}
                <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/') }}/admin/slider">Slider</a></li>
              </ul>
            </div>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="user_add">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Add User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product_add">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Add Product</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      
      @yield('content')

      
      </div>
      <!-- main-panel ends -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
      </footer>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ URL::to('/') }}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ URL::to('/') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ URL::to('/') }}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ URL::to('/') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{ URL::to('/') }}/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ URL::to('/') }}/js/off-canvas.js"></script>
  <script src="{{ URL::to('/') }}/js/hoverable-collapse.js"></script>
  <script src="{{ URL::to('/') }}/js/template.js"></script>
  <script src="{{ URL::to('/') }}/js/settings.js"></script>
  <script src="{{ URL::to('/') }}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ URL::to('/') }}/js/dashboard.js"></script>
  <script src="{{ URL::to('/') }}/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script src="{{ URL::to('/') }}/js/bootstrap.js" type="text/javascript"></script>
  <script src="{{ URL::to('/') }}/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="{{ URL::to('/') }}/js/jquery.min.js"></script>
</body>

</html>

