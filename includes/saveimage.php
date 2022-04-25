<?Php
include 'init.php';
if ($_REQUEST['image_name']) {
    $profile_id = $_REQUEST['profile_id'];
    $image_name = $_REQUEST['image_name'];
    $final_image =  str_replace('Rotate Image', '', $image_name);
    $degrees = -90;  //change this to be whatever degree of rotation you want
    //header('Content-type: image/jpeg');
    $imaage_size = ['150','350','800'];
    for ($i = 0; $i < count($imaage_size); $i++) {
       echo $filename = "../uploads/$imaage_size[$i]/".trim($final_image);  //this is the original file
        $source = imagecreatefromjpeg($filename);
        $rotate = imagerotate($source,$degrees,0);
        imagejpeg($rotate,$filename); //save the new image
        imagedestroy($source); //free up the memory
        imagedestroy($rotate);  //free up the memory
    }
    echo "image updated";
}

if  ($_REQUEST['delete_images']) {
    $data = ['profile_id'=>$_REQUEST['profile_id'],'delete_images'=>$_REQUEST['delete_images']];
    $request = user::find_image_by_name($data);

}
?>