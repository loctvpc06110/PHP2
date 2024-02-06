<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./Public/Assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Education System - LocTV</title>

<meta name="description" content="" />

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="./Public/Assets/img/edusl/edu.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./Public/Assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./Public/Assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./Public/Assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./Public/Assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./Public/Assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="./Public/Assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="./Public/Assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./Public/Assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                  <img src="./Public/Assets/img/logo/eduslLogo.png" alt="Logo" width="110px">
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Quên mật khẩu? 🔒</h4>
              <p class="mb-4">Nhập email của bạn và chúng tôi sẽ gửi cho bạn hướng dẫn để đặt lại mật khẩu của bạn</p>
              <form id="formAuthentication" class="mb-3" action="<?=ROOT_URL?>?url=LoginController/verify" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Nhập email của bạn"
                    autofocus
                  />
                </div>
                <button class="btn btn-primary d-grid w-100" name="submit">Gửi liên kết đặt lại</button>
              </form>
              <div class="text-center">
                <a href="<?= ROOT_URL?>?url=LoginController/login" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Trở về Đăng Nhập
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./Public/Assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./Public/Assets/vendor/libs/popper/popper.js"></script>
    <script src="./Public/Assets/vendor/js/bootstrap.js"></script>
    <script src="./Public/Assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./Public/Assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./Public/Assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
