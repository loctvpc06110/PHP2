<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý/</span> Người Dùng</h4>

    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Danh Sách Người Dùng</h5>
      <div class="table-responsive text-nowrap" style="min-height: 25vh;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Họ Và Tên</th>
              <th>Email</th>
              <th>Chức Vụ</th>
              <th>Quản Lý</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $id = 1;
            foreach ($data as $row): ?>
              <tr>
                <td>
                  <?= $id++ ?>
                </td>
                <td>
                  <?= $row['FullName'] ?>
                </td>
                <td>
                  <?= $row['Email'] ?>
                </td>
                <td>
                  <?= $row['Role'] ?>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="<?= ROOT_URL?>?url=UserController/update/<?= $row['UserID']?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a onclick=" return confirm('Bạn có chắc rằng muốn xóa ?');" class="dropdown-item" 
                      href="<?=ROOT_URL?>?url=UserController/delete/<?= $row['UserID'] ?>">
                      <i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php
            endforeach;
            ?>

          </tbody>
        </table>
      </div>
    </div>
    <!--/ Hoverable Table rows -->

  </div>
  <!-- / Content -->