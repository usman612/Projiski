<?php
session_start();
require 'classes/user.php';
$obj = new User;
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$random_string = generateRandomString();	
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "images/".$random_string.$_FILES['userImage']['name'];
$testpath = $random_string.$_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
$obj->updateImage($testpath,$_SESSION['userid']);	
?>
<img src="<?php echo $targetPath; ?>" width="200px" height="200px" class="upload-preview" />
<?php
}
}
}
?>