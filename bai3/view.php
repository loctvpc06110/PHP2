<?php 
    if(isset($_POST['checkEmail'])){
    if($user){
        echo $user['name'];
    }else{
        echo 'Email chưa đc đăng ký !';
    }
}
?>
<form method="post">
    <input type="email" name="email">
    <input type="submit" name="checkEmail" value="Check">
</form>