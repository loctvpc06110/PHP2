<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Chỉnh Sửa/</span> Cấp quyền tài khoản</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Thông Tin Người Dùng</h5>
                
                    </div>
                    <div class="card-body">
                      <form action="<?= ROOT_URL?>?url=UserController/edit/<?= $data['UserID']?>" method="post">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Chức Vụ</label>
                            <select name="role" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option value="Quản Trị viên" <?= ($data['Role'] == 'Quản Trị viên') ? 'selected' : '' ?>>Quản Trị viên</option>
                                <option value="Giáo Viên" <?= ($data['Role'] == 'Giáo Viên') ? 'selected' : '' ?>>Giáo Viên</option>
                                <option value="Sinh Viên" <?= ($data['Role'] == 'Sinh Viên') ? 'selected' : '' ?>>Sinh Viên</option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <button name="submit" type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->