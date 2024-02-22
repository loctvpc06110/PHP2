<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý/</span> Phòng Học</h4>

    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Danh Sách Phòng</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên Phòng Học</th>
              <th>Quản Lý</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $i = 1;
            foreach ($data as $row):
              ?>
              <tr>
                <td><?= $i++?></td>
                <td><?= $row['RoomName']?></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" 
                        href="<?=ROOT_URL?>?url=RoomController/detail/<?= $row['RoomID'] ?>">
                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a onclick=" return confirm('Bạn có chắc rằng muốn xóa ?');" class="dropdown-item" 
                        href="<?=ROOT_URL?>?url=RoomController/delete/<?= $row['RoomID'] ?>">
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