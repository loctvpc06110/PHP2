<?php
    if (!isset($_SESSION['Admin'])){
        echo "<script>document.location='".ROOT_URL."?url=LoginController/login';</script>";
    }
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Chỉnh Sửa /</span> Lớp</h4>

        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Sửa Thông Tin Lớp Học</h5>
                <form class="card-body" method="post" action="<?= ROOT_URL ?>?url=ClassController/edit/<?=$data['ClassID']?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên Lớp Học</label>
                        <input type="text" name="ClassName" class="form-control" id="exampleFormControlInput1" value="<?=$data['ClassName']?>"/>
                    </div>
        
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->