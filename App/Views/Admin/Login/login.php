
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a class="app-brand-link gap-2">
                <span>
                <img src="./Public/Assets/img/logo/eduslLogo.png" alt="Logo" width="110px">
              </span>
                  <span class="app-brand-text demo text-body fw-bolder">- Đăng Nhập</span>
                </a>
              </div>
              <!-- /Logo -->
            
              <form id="formAuthentication" class="mb-3" action="<?=ROOT_URL?>?url=LoginController/loginAdmin" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Vui lòng nhập Email "
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Mật Khẩu</label>
                    <a href="<?= ROOT_URL ?>?url=LoginController/forgot">
                      <small>Quên mật khẩu?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Lưu tài khoản </label>
                  </div>
                </div>
                <?php 
                      if (isset($data['error'])){
                        if($data['error'] != ''){
                            ?>
                                <div class="mb-3 alert alert-danger">
                                    <?= $data['error']?>
                                </div>
                            <?php
                        }
                      }   
                    ?> 
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Đăng Nhập</button>
                </div>
              </form>

              <p class="text-center">
                <span>Bạn là người mới?</span>
                <a href="<?= ROOT_URL ?>?url=LoginController/register">
                  <span> Tạo tài khoản</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    