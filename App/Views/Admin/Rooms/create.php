<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thêm /</span> Phòng Học</h4>

        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Thêm Phòng Học</h5>
                <form class="card-body" method="post" action="<?= ROOT_URL ?>?url=RoomController/store">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên Cho Phòng Học</label>
                        <input name="RoomName" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="VD: P-101" />
                    </div>

                    <div class="mb-3">
                        <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->