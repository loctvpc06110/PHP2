<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Chỉnh Sửa /</span> Lịch Học</h4>

        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Chỉnh Sửa Thông Tin Lịch Học</h5>
                <div class="card-body">
                    <?php $dataSchedule = $data['Schedule']; ?>
                    <form method="post" action="<?= ROOT_URL ?>?url=ScheduleController/edit/<?= $dataSchedule['ClassSchID']?>">
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Phòng Học</label>
                            <select name="Room" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <?php
                                foreach($data['Room'] as $row):
                                ?>
                                    <option value="<?= $row['RoomID']?>"
                                    <?= $dataSchedule['RoomID'] == $row['RoomID'] ? 'selected' : ''?>
                                    >
                                        <?= $row['RoomName']?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Lớp Học</label>
                            <select name="Class" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <?php
                                foreach($data['Class'] as $row):
                                ?>
                                    <option value="<?= $row['ClassID']?>"
                                    <?= $dataSchedule['ClassID'] == $row['ClassID'] ? 'selected' : ''?>
                                    >
                                        <?= $row['ClassName']?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Khóa Học</label>
                            <select name="Course" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <?php
                                foreach($data['Course'] as $row):
                                ?>
                                    <option value="<?= $row['CourseID']?>"
                                    <?= $dataSchedule['CourseID'] == $row['CourseID'] ? 'selected' : ''?>
                                    >
                                        <?= $row['CourseName']?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Giáo Viên</label>
                            <select name="Teacher" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <?php
                                foreach($data['User'] as $row):
                                ?>
                                    <option value="<?= $row['UserID']?>"
                                    <?= $dataSchedule['TeacherId'] == $row['UserID'] ? 'selected' : ''?>
                                    >
                                        <?= $row['FullName']?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Giờ Bắt Đầu</label>
                            <input name="StartTime" type="time" class="form-control" id="exampleFormControlInput1"
                            value="<?= $dataSchedule['StartTime']?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Giờ Kết Thúc</label>
                            <input name="EndTime" type="time" class="form-control" id="exampleFormControlInput1"
                            value="<?= $dataSchedule['EndTime']?>">
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