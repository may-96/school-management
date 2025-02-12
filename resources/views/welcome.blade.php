<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>School Management System</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="author" content="Phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />
 <!-- [Font] Family -->
<link rel="stylesheet" href="../assets/fonts/inter/inter.css" id="main-font-link" />
<!-- [phosphor Icons] https://phosphoricons.com/ -->
<link rel="stylesheet" href="../assets/fonts/phosphor/duotone/style.css" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="../assets/fonts/feather.css" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="../assets/fonts/fontawesome.css" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="../assets/fonts/material.css" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" />
<script src="../assets/js/tech-stack.js"></script>
<link rel="stylesheet" href="../assets/css/style-preset.css" />

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->  
    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <div class="auth-header row">
            {{-- <div class="col my-1">
              <a href="#"><img src="../assets/images/logo-dark.svg" alt="img" /></a>
            </div>
            <div class="col-auto my-1">
              <h5 class="m-0 text-muted f-w-500">Step <b class="h5" id="auth-active-slide">1</b> to 5</h5>
            </div> --}}
          </div>
          <div class="card my-5">
            <div class="card-body">
            
              <div class="tab-content">
                <div class="tab-pane show active" id="auth-1" role="tabpanel" aria-labelledby="auth-tab-1">
                  <div class="text-center">
                    <h3 class="text-center mb-3">Welcome to the School</h3>
                    <p class="mb-4">Login or Sign Up</p>
                    <div class="d-grid my-3">
                      <a href="{{ route('auth.login') }}" class="btn mt-2 btn-light-primary bg-light text-muted"><span> Login</span></a>
                      <a href="{{ route('auth.register') }}" class="btn mt-2 btn-light-primary bg-light text-muted"><span> Sign Up</span></a>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
          <div class="auth-footer">
            <p class="m-0 w-100 text-center"
              >By signing up, you confirm to have read School Management System <a href="#">Privacy Policy</a> and agree to the
              <a href="#">Terms of Service</a>.</p
            >
          </div>
        </div>
        <div class="auth-sidecontent">
          <div class="p-3 px-lg-5 text-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                  <h5 class="text-white mb-0">Allie Grater</h5>
                  <p class="text-white text-opacity-50">@alliegrater</p>
                  <div class="star f-20 my-4">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                  </div>
                  <p class="text-white"
                    >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                    not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                    customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                  >
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                  <h5 class="text-white mb-0">Allie Grater</h5>
                  <p class="text-white text-opacity-50">@alliegrater</p>
                  <div class="star f-20 my-4">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                  </div>
                  <p class="text-white"
                    >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                    not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                    customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                  >
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/user/avatar-3.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                  <h5 class="text-white mb-0">Allie Grater</h5>
                  <p class="text-white text-opacity-50">@alliegrater</p>
                  <div class="star f-20 my-4">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                  </div>
                  <p class="text-white"
                    >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                    not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                    customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                  >
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/user/avatar-4.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                  <h5 class="text-white mb-0">Allie Grater</h5>
                  <p class="text-white text-opacity-50">@alliegrater</p>
                  <div class="star f-20 my-4">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                  </div>
                  <p class="text-white"
                    >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                    not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                    customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                  >
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/user/avatar-5.jpg" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                  <h5 class="text-white mb-0">Allie Grater</h5>
                  <p class="text-white text-opacity-50">@alliegrater</p>
                  <div class="star f-20 my-4">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                  </div>
                  <p class="text-white"
                    >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                    not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                    customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                  >
                </div>
              </div>
              <div class="carousel-indicators position-relative mt-3">
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- [Page Specific JS] start -->
    <!-- Sweet Alert -->
    <script src="../assets/js/plugins/sweetalert2.all.min.js"></script>
    <script>
      document.querySelector('.auth-conf').addEventListener('click', function () {
        Swal.fire({
          icon: 'success',
          title: 'Account created successfully'
        });
      });

      function change_tab(tab_name) {
        var someTabTriggerEl = document.querySelector('a[href="' + tab_name + '"]');
        document.querySelector('#auth-active-slide').innerHTML = someTabTriggerEl.getAttribute('data-slide-index');
        var actTab = new bootstrap.Tab(someTabTriggerEl);
        actTab.show();
      }

      const inputElements = [...document.querySelectorAll('input.code-input')];

      inputElements.forEach((ele, index) => {
        ele.addEventListener('keydown', (e) => {
          // if the keycode is backspace & the current field is empty
          // focus the input before the current. Then the event happens
          // which will clear the "before" input box.
          if (e.keyCode === 8 && e.target.value === '') inputElements[Math.max(0, index - 1)].focus();
        });
        ele.addEventListener('input', (e) => {
          // take the first character of the input
          // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
          // but I'm willing to overlook insane security code practices.
          const [first, ...rest] = e.target.value;
          e.target.value = first ?? ''; // first will be undefined when backspace was entered, so set the input to ""
          const lastInputBox = index === inputElements.length - 1;
          const didInsertContent = first !== undefined;
          if (didInsertContent && !lastInputBox) {
            // continue to input the rest of the string
            inputElements[index + 1].focus();
            inputElements[index + 1].value = rest.join('');
            inputElements[index + 1].dispatchEvent(new Event('input'));
          }
        });
      });
    </script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>


    <script src="../assets/js/plugins/i18next.min.js"></script>
    <script src="../assets/js/plugins/i18nextHttpBackend.min.js"></script>

    <script src="../assets/js/icon/custom-font.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/multi-lang.js"></script>
    <script src="../assets/js/plugins/feather.min.js"></script>
 
    
    <script>
      layout_change('light');
    </script>
      
    <script>
      change_box_container('false');
    </script>
     
    <script>
      layout_caption_change('true');
    </script>
     
    <script>
      layout_rtl_change('false');
    </script>
     
    <script>
      preset_change('preset-1');
    </script>
     
    <script>
      main_layout_change('vertical');
    </script>
    
 <div class="pct-c-btn">
  <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
    <i class="ph-duotone ph-gear-six"></i>
  </a>
</div>
<div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Settings</h5>
    <button type="button" class="btn btn-icon btn-link-danger ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"
      ><i class="ti ti-x"></i
    ></button>
  </div>
  <div class="pct-body customizer-body">
    <div class="offcanvas-body py-0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="pc-dark">
            <h6 class="mb-1">Theme Mode</h6>
            <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
            <div class="row theme-color theme-layout">
              <div class="col-4">
                <div class="d-grid">
                  <button
                    class="preset-btn btn active"
                    data-value="true"
                    onclick="layout_change('light');"
                    data-bs-toggle="tooltip"
                    title="Light"
                  >
                    <svg class="pc-icon text-warning">
                      <use xlink:href="#custom-sun-1"></use>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button class="preset-btn btn" data-value="false" onclick="layout_change('dark');" data-bs-toggle="tooltip" title="Dark">
                    <svg class="pc-icon">
                      <use xlink:href="#custom-moon"></use>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button
                    class="preset-btn btn"
                    data-value="default"
                    onclick="layout_change_default();"
                    data-bs-toggle="tooltip"
                    title="Automatically sets the theme based on user's operating system's color scheme."
                  >
                    <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                      <i class="ph-duotone ph-cpu"></i>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Theme Contrast</h6>
          <p class="text-muted text-sm">Choose theme contrast</p>
          <div class="row theme-contrast">
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn"
                  data-value="true"
                  onclick="layout_theme_contrast_change('true');"
                  data-bs-toggle="tooltip"
                  title="True"
                >
                  <svg class="pc-icon">
                    <use xlink:href="#custom-mask"></use>
                  </svg>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn active"
                  data-value="false"
                  onclick="layout_theme_contrast_change('false');"
                  data-bs-toggle="tooltip"
                  title="False"
                >
                  <svg class="pc-icon">
                    <use xlink:href="#custom-mask-1-outline"></use>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Custom Theme</h6>
          <p class="text-muted text-sm">Choose your primary theme color</p>
          <div class="theme-color preset-color">
            <a href="#!" data-bs-toggle="tooltip" title="Blue" class="active" data-value="preset-1"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i class="ti ti-checks"></i></a>
            <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i class="ti ti-checks"></i></a>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Theme layout</h6>
          <p class="text-muted text-sm">Choose your layout</p>
          <div class="theme-main-layout d-flex align-center gap-1 w-100">
            <a href="#!" data-bs-toggle="tooltip" title="Vertical" class="active" data-value="vertical">
              <img src="../assets/images/customizer/caption-on.svg" alt="img" class="img-fluid" />
            </a>
            <a href="#!" data-bs-toggle="tooltip" title="Horizontal" data-value="horizontal">
              <img src="../assets/images/customizer/horizontal.svg" alt="img" class="img-fluid" />
            </a>
            <a href="#!" data-bs-toggle="tooltip" title="Color Header" data-value="color-header">
              <img src="../assets/images/customizer/color-header.svg" alt="img" class="img-fluid" />
            </a>
            <a href="#!" data-bs-toggle="tooltip" title="Compact" data-value="compact">
              <img src="../assets/images/customizer/compact.svg" alt="img" class="img-fluid" />
            </a>
            <a href="#!" data-bs-toggle="tooltip" title="Tab" data-value="tab">
              <img src="../assets/images/customizer/tab.svg" alt="img" class="img-fluid" />
            </a>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Sidebar Caption</h6>
          <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
          <div class="row theme-color theme-nav-caption">
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn-img btn active"
                  data-value="true"
                  onclick="layout_caption_change('true');"
                  data-bs-toggle="tooltip"
                  title="Caption Show"
                >
                  <img src="../assets/images/customizer/caption-on.svg" alt="img" class="img-fluid" />
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn-img btn"
                  data-value="false"
                  onclick="layout_caption_change('false');"
                  data-bs-toggle="tooltip"
                  title="Caption Hide"
                >
                  <img src="../assets/images/customizer/caption-off.svg" alt="img" class="img-fluid" />
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="pc-rtl">
            <h6 class="mb-1">Theme Layout</h6>
            <p class="text-muted text-sm">LTR/RTL</p>
            <div class="row theme-color theme-direction">
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn-img btn active"
                    data-value="false"
                    onclick="layout_rtl_change('false');"
                    data-bs-toggle="tooltip"
                    title="LTR"
                  >
                    <img src="../assets/images/customizer/ltr.svg" alt="img" class="img-fluid" />
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn-img btn"
                    data-value="true"
                    onclick="layout_rtl_change('true');"
                    data-bs-toggle="tooltip"
                    title="RTL"
                  >
                    <img src="../assets/images/customizer/rtl.svg" alt="img" class="img-fluid" />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item pc-box-width">
          <div class="pc-container-width">
            <h6 class="mb-1">Layout Width</h6>
            <p class="text-muted text-sm">Choose Full or Container Layout</p>
            <div class="row theme-color theme-container">
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn-img btn active"
                    data-value="false"
                    onclick="change_box_container('false')"
                    data-bs-toggle="tooltip"
                    title="Full Width"
                  >
                    <img src="../assets/images/customizer/full.svg" alt="img" class="img-fluid" />
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn-img btn"
                    data-value="true"
                    onclick="change_box_container('true')"
                    data-bs-toggle="tooltip"
                    title="Fixed Width"
                  >
                    <img src="../assets/images/customizer/fixed.svg" alt="img" class="img-fluid" />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-grid">
            <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

  </body>
  <!-- [Body] end -->
</html>
