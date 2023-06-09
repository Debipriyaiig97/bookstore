<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        {{-- <a class="navbar-brand brand-logo" href="index.html"><img src="{{ url('/') }}/public/assets/admin/images/logo.svg" alt="logo" /></a> --}}
        {{-- <a class="navbar-brand brand-logo" href="{{ url('/') }}/admin/dashboard"><img src="{{url('/')}}/public/assets/images/home/iigvarcitylogo.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}/admin/dashboard"><img src="{{url('/')}}/public/assets/images/home/iigvarcitylogo.png" alt="logo" /></a> --}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-control-end mx-0"></i>
                    {{-- <span class="count"></span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <div class="preview-item-content text-center pt-3">
                        <h6 class="preview-subject font-weight-medium">{{ Auth::user()->name }}</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item logout-confirm" href="{{ route('admin.logout') }}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-danger">
                                <i class="icon-envelope mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-medium">Logout</h6>
                            <p class="font-weight-light small-text">
                                Click to logout
                            </p>
                        </div>
                    </a>
                </div>
            </li>
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
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="mdi mdi-multiplication"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles primary"></div>
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles pink"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>
    {{-- <div id="right-sidebar" class="settings-panel">
      <i class="settings-close mdi mdi-close"></i>
      <ul class="nav nav-tabs" id="setting-panel" role="tablist">
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
                          <i class="remove mdi mdi-close-circle-outline"></i>
                      </li>
                      <li>
                          <div class="form-check">
                              <label class="form-check-label">
              <input class="checkbox" type="checkbox">
              Prepare for presentation
            </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                      </li>
                      <li>
                          <div class="form-check">
                              <label class="form-check-label">
              <input class="checkbox" type="checkbox">
              Resolve all the low priority tickets due today
            </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                      </li>
                      <li class="completed">
                          <div class="form-check">
                              <label class="form-check-label">
              <input class="checkbox" type="checkbox" checked>
              Schedule meeting for next week
            </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                      </li>
                      <li class="completed">
                          <div class="form-check">
                              <label class="form-check-label">
              <input class="checkbox" type="checkbox" checked>
              Project review
            </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                      </li>
                  </ul>
              </div>
              <div class="events py-4 border-bottom px-3">
                  <div class="wrapper d-flex mb-2">
                      <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                      <span>Feb 11 2018</span>
                  </div>
                  <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                  <p class="text-gray mb-0">build a js based app</p>
              </div>
              <div class="events pt-4 px-3">
                  <div class="wrapper d-flex mb-2">
                      <i class="mdi mdi-circle-outline text-primary mr-2"></i>
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
                      <div class="profile"><img src="https://via.placeholder.com/100x100" alt="image"><span class="online"></span></div>
                      <div class="info">
                          <p>Thomas Douglas</p>
                          <p>Available</p>
                      </div>
                      <small class="text-muted my-auto">19 min</small>
                  </li>
                  <li class="list">
                      <div class="profile"><img src="https://via.placeholder.com/100x100" alt="image"><span class="offline"></span></div>
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
                      <div class="profile"><img src="https://via.placeholder.com/100x100" alt="image"><span class="online"></span></div>
                      <div class="info">
                          <p>Daniel Russell</p>
                          <p>Available</p>
                      </div>
                      <small class="text-muted my-auto">14 min</small>
                  </li>
                  <li class="list">
                      <div class="profile"><img src="https://via.placeholder.com/100x100" alt="image"><span class="offline"></span></div>
                      <div class="info">
                          <p>James Richardson</p>
                          <p>Away</p>
                      </div>
                      <small class="text-muted my-auto">2 min</small>
                  </li>
                  <li class="list">
                      <div class="profile"><img src="https://via.placeholder.com/100x100" alt="image"><span class="online"></span></div>
                      <div class="info">
                          <p>Madeline Kennedy</p>
                          <p>Available</p>
                      </div>
                      <small class="text-muted my-auto">5 min</small>
                  </li>
                  <li class="list">
                      <div class="profile"><img src="https://via.placeholder.com/100x100" alt="image"><span class="online"></span></div>
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
  </div> --}}
    <!-- partial -->

