   <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a class="app-brand-link gap-2">
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

