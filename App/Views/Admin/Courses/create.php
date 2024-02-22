<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thêm /</span> Khóa Học</h4>

        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Thêm Khóa Học</h5>
                <div class="card-body">
                    <form method="post" action="<?= ROOT_URL ?>?url=CourseController/store">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tên Khóa Học</label>
                            <input name="CourseName" type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Tên lớp VD: WEB + 3 số" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mô tả về khóa học</label>
                            <textarea name="Description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ngày Bắt Đầu</label>
                            <input name="StartDate" type="date" id="startDate" class="form-control" id="dateInput" name="dateInput"
                                >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ngày Kết Thúc</label>
                            <input name="EndDate" type="date" id="endDate" class="form-control" id="exampleFormControlInput1"
                                >
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
                        <div class=" mb-3">
                            <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->