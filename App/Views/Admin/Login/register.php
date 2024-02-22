
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a class="app-brand-link gap-2">
                                <span>
                                    <img src="./Public/Assets/img/logo/eduslLogo.png" alt="Logo" width="110px">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">- Đăng Ký</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <form id="formAuthentication" class="mb-3" action="<?= ROOT_URL ?>?url=LoginController/create"
                            method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Họ Tên</label>
                                <input type="text" class="form-control" id="username" name="fullname"
                                    placeholder="Nhập tên của bạn" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Nhập email của bạn" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        Tôi đồng ý với
                                        <a href="javascript:void(0);">Chính Sách & Bảo Mật</a>
                                    </label>
                                </div>
                            </div>
                            
                            <button class="btn btn-primary d-grid w-100" type="submit" name="submit">Đăng Ký</button>
                        </form>

                        <p class="text-center">
                            <span>Bạn đã có tài khoản?</span>
                            <a href="<?= ROOT_URL ?>?url=LoginController/login">
                                <span> Đăng Nhập</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

   