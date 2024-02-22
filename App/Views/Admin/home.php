<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý/</span> Trang Chủ</h4>

    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Lịch Học Hôm Nay</h5>
      <div class="table-responsive text-nowrap" style="min-height: 25vh;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Ngày</th>
              <th>Khóa Học</th>
              <th>Lớp</th>
              <th>Phòng Học</th>
              <th>Giảng Viên</th>
              <th>Thời Gian</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $i = 1;
            foreach ($data['schedule'] as $row):
              ?>
              <tr>
                <td><?= $i++?></td>
                <td><?= $data['ngay']?></td>
                <td><?= $row['CourseName']?></td>
                <td><?= $row['ClassName']?></td>
                <td><?= $row['RoomName']?></td>
                <td><?= $row['FullName']?></td>
                <td><?= substr($row['StartTime'],0 ,5)?>-<?= substr($row['EndTime'],0 ,5)?></td>
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