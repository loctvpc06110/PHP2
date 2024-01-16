<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span>
                <img src="./Public/Assets/img/logo/eduslLogo.png" alt="Logo" width="180px">
              </span>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Quản lý</span></li>
            <!-- Forms -->

            <!-- Tables -->
            <li class="menu-item">
              <a href="?page=user-list" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Tables">Thông Tin Người Dùng</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-bookmark-star"></i>
                <div data-i18n="Form Elements">Lớp Học</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="?page=class-list" class="menu-link">
                    <div data-i18n="Basic Inputs">Danh Sách Các Lớp</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="?page=class-add" class="menu-link">
                    <div data-i18n="Input groups">Thêm Lớp Mới</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-html5"></i>
                <div data-i18n="Form Elements">Khóa Học</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="?page=course-list" class="menu-link">
                    <div data-i18n="Basic Inputs">Các Khóa Học</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="?page=course-add" class="menu-link">
                    <div data-i18n="Input groups">Thêm Khóa Học Mới</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-door-open"></i>
                <div data-i18n="Form Layouts">Phòng Học</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="?page=room-list" class="menu-link">
                    <div data-i18n="Vertical Form">Xem Phòng Học</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="?page=room-add" class="menu-link">
                    <div data-i18n="Horizontal Form">Thêm Phòng Học Mới</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Form Elements">Lịch Học</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="?page=schudule-list" class="menu-link">
                    <div data-i18n="Basic Inputs">Xem Lịch Học</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="?page=schudule-add" class="menu-link">
                    <div data-i18n="Input groups">Thêm Lịch Học Mới</div>
                  </a>
                </li>
              </ul>
            </li>
           
          </ul>
        </aside>
<!-- / Menu -->