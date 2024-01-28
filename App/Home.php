<?php
namespace App;
class Home {
    
    public function index(): string {
        return <<<FORM
            <form action="/upload" method="post" enctype="multipart/form-data">
                <input type="file" name="receipt"/>
                <button type="submit" name="submit">Upload</button>
            </form>
    FORM;
    }

    public function upload() {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        if(isset($_POST["submit"])) {
            echo "<pre>";
            // var_dump($_FILES);
            $oldName = $_FILES["receipt"]["name"];
            // echo $oldName;
            $file_extention = pathinfo($oldName, PATHINFO_EXTENSION);
            // echo $file_extention;
            $newName = "users_" . date("YmdHis"). "." . $file_extention;
            // echo $newName;
            $filePart = "Uploads"."/".$newName;
            // echo $filePart;
            $file = $_FILES["receipt"]["tmp_name"];
            if(move_uploaded_file($file, $filePart)){
                echo "File Đã Được Tải Lên";
            }
            else{
                echo "File Tải Lên Không Thành Công !";
            }
        }
    }

}
?>