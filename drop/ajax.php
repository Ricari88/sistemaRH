<?php
//$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];

$file_type = 'txt';
 
//if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
if($file_type != "txt"){
    echo "false";
    return;
}
 
if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
}
 
$filename = time().'_'.$_FILES['file']['name'];
 
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$filename);
 
echo 'uploads/'.$filename;
die;

?>