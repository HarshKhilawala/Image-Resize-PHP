<?php
 
if($_POST && $_FILES){
    $ext = end(explode(".",$_FILES['imageFile']['name']));
 
    $upload_dir = "images/";
    $img = $_POST['hidden_data'];
    if($ext == "png" || $ext == "PNG"){
        $img = str_replace('data:image/png;base64,', '', $img);
    }elseif($ext == "jpg" || $ext == "JPG" || $ext=="jpeg" || $ext =="JPEG"){
        $img = str_replace('data:image/jpeg;base64,', '', $img);
    }
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = $upload_dir . mktime() . ".".end(explode(".",$_FILES['imageFile']['name']));
    $success = file_put_contents($file, $data);
    print $success ? "<img src=".$file." border='0' />" : 'Unable to save the file.'; exit;
}else{
    print "Unable to process request"; exit;
}
 
?>