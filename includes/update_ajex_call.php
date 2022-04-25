<?php
include 'init.php';
/**
 * Created by PhpStorm.
 * User: wdyog
 * Date: 06-01-2019
 * Time: 04:44 PM
 */
// Update personal data here.
if (isset($_REQUEST['name'])) {
    $name = $_POST['name'];
    $gotra = $_POST['gotra'];
    $dob = $_POST['date'].'/'.$_POST['month'].'/'.$_POST['year'];
    $birthTime = $_POST['birthTime'];
    $manglik = $_POST['manglik'];
    $height_f = $_POST['height_f'];
    $height_i = $_POST['height_i'];
    $maritalStatus = $_POST['maritalStatus'];
    $profileBy = $_POST['profileBy'];
    $hobbies = $_POST['hobbies'];
}

if (isset($_REQUEST['mobile']) OR isset($_REQUEST['mobile_2'])) {
    $data = ['mobile'=>$_REQUEST['mobile'],'mobile_2' => $_REQUEST['mobile_2'],'email' => $_REQUEST['email'],'id'=>$_REQUEST['id']];
    $update = user::update_contact_details($data);
}

if (isset($_REQUEST['about'])) {
    $data = ['about'=>$_REQUEST['about'],'id'=>$_REQUEST['id']];
    $update = user::update_about_details($data);
}

if (isset($_REQUEST['educationForm'])) {
      $data = ['education'=>$_REQUEST['education'],'education_details'=>$_REQUEST['education_details'],
               'occupation' =>$_REQUEST['occupation'],'occupation_details' =>$_REQUEST['occupation_details'],'id'=>$_REQUEST['id']];
      $update = user::update_education_details($data);
}

if (isset($_REQUEST['fatherName']) OR isset($_REQUEST['motherName']) OR isset($_REQUEST['father_Occupation'])) {
        $data =  ['fatherName'=>$_REQUEST['fatherName'],'father_Occupation'=>$_REQUEST['father_Occupation'],
                'motherName' =>$_REQUEST['motherName'],'mother_Occupation' =>$_REQUEST['mother_Occupation'],
                'id'=>$_REQUEST['id'],'b_married'=>$_REQUEST['b_married'],'b_unmarried'=>$_REQUEST['b_unmarried'],
                's_married'=>$_REQUEST['s_married'],'s_unmarried'=>$_REQUEST['s_unmarried']];
      $update = user::update_family_details($data);
}

if (isset($_REQUEST['address']) OR isset($_REQUEST['state']) OR isset($_REQUEST['location']) OR isset($_REQUEST['city'])) {
    $data = ['address'=>$_REQUEST['address'],'state'=>$_REQUEST['state'],
            'location' =>$_REQUEST['location'],'city' =>$_REQUEST['city'],'id'=>$_REQUEST['id']];
    $update = user::update_address_details($data);
}
// update personal data
if (isset($_REQUEST['personal'])) {
    $dob = $_REQUEST['date'].'-'.$_REQUEST['month'].'-'.$_REQUEST['year'];
    $data = ['name'=>$_REQUEST['name'],'gotra'=>$_REQUEST['gotra'],
        'dob' =>$dob,'birthTime' =>$_REQUEST['birthTime'],
        'manglik'=>$_REQUEST['manglik'],'height_f'=>$_REQUEST['height_f'],
        'height_i'=>$_REQUEST['height_i'],'maritalStatus'=>$_REQUEST['maritalStatus'],
        'profileBy'=>$_REQUEST['profileBy'],'hobbies'=>$_REQUEST['hobbies'],
        'id'=>$_REQUEST['id']];
    $update = user::update_personal_details($data);
}

// update password
if (isset($_REQUEST['newPassword']) OR isset($_REQUEST['prePass'])) {
    $newPassword = $_REQUEST['newPassword'];
    $prePass = $_REQUEST['prePass'];
    $data = ['newPassword'=>$_REQUEST['newPassword'],'prePass'=>$_REQUEST['prePass'],'id'=>$_REQUEST['id']];
    $update = user::update_Password_details($data);
}
// update partner preferance
if (isset($_REQUEST['methodTypePartner'])) {
    $data = ['age1'=>$_REQUEST['age1'],'age2'=>$_REQUEST['age2'],
            'manglik'=>$_REQUEST['manglik'],
            'maritalStatus'=>$_REQUEST['maritalStatus'],
            'education'=>$_REQUEST['education'],
            'occupation'=>$_REQUEST['occupation'],
            'other_details'=>$_REQUEST['other_details'],
            'id'=>$_REQUEST['user_id']];
    $update = user::update_partnner_details($data);
}

// delete password password
if (isset($_REQUEST['delete_profile'])) {
    $id = $_REQUEST['id'];
    $why_delete = $_REQUEST['why_delete'];
    $feedback = $_REQUEST['feedback'];
    $data = ['id'=>$_REQUEST['id'],'why_delete'=>$_REQUEST['why_delete'],'feedback'=>$_REQUEST['feedback']];
    $update = user::delete_account($data);
}

// delete password password
if (isset($_REQUEST['upload_user_file'])) {
        $user_id = $_REQUEST['upload_user_file'];
        //$upload_user_image = $_REQUEST['upload_user_image'];
        // Image size and upload
        if(isset($_FILES['image'])) {
        // and create local PHP variables from the $_FILES array of information
        $fileName = $_FILES["image"]["name"]; // The file name
        $fileTmpLoc = $_FILES["image"]["tmp_name"]; // File in the PHP tmp folder

        $fileType = $_FILES["image"]["type"]; // The type of file it is
        $fileSize = $_FILES["image"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["image"]["error"]; // 0 for false... and 1 for true
        $fileName = preg_replace('#[^a-z.0-9]#i', '', $img_name_datetime = date('his') . $fileName); // filter
        // $fileName sould save in database
        $kaboom = explode(".", $fileName); // Split file name into an array using
        // the dot
        $fileExt = end($kaboom); // Now target the last array element to get the file extension
        // START PHP Image Upload Error Handling -------------------------------
        if (!$fileTmpLoc) { // if file not chosen
            echo "ERROR: Please browse for a file before clicking the upload button.";
            exit();
        } else if ($fileSize > 5242880) { // if file size is larger than 5 Megabytes
            echo "ERROR: Your file was larger than 5 Megabytes in size.";
            unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
            exit();
        } else if (!preg_match("/.(gif|jpg|png)$/i", $fileName)) {
            // This condition is only if you wish to allow uploading of specific file types
            echo "ERROR: Your image was not .gif, .jpg, or .png.";
            unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
            exit();
        } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
            echo "ERROR: An error occured while processing the file. Try again.";
            exit();
        }
        // Place it into your "uploads" folder mow using the move_uploaded_file() function
        $moveResult = move_uploaded_file($fileTmpLoc, "../uploads/$fileName");
        // Check to make sure the move result is true before continuing
        if ($moveResult != true) {
            echo "ERROR: File not uploaded. Try again.";
            exit();
        }
        // set image name
        include_once("../ak_php_img_lib_1.0.php");
        // ---------- Start Universal Image Resizing Function --------
        $imaage_size = ['150', '350', '800'];

        for ($i = 0; $i < count($imaage_size); $i++) {
            $wmax = $imaage_size[$i];
            $hmax = $imaage_size[$i];
            $target_file = "../uploads/$fileName";
            $resized_file = "../uploads/$wmax/$fileName";

            ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
            if (strtolower($fileExt) != "jpg") {
                $target_file = "../uploads/$wmax/$fileName";
                $new_jpg = "../uploads/$wmax/" . $kaboom[0] . ".jpg";
                ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
            }
            // ---------- Start Image Watermark Function -----------
            $target_file_last = "../uploads/$wmax/" . $kaboom[0] . ".jpg";
            $wtrmrk_file = "../water.png";
            $new_file = "../uploads/$wmax/" . $kaboom[0] . ".jpg";
            ak_img_watermark($target_file_last, $wtrmrk_file, $new_file);
            // ----------- End Image Watermark Function ------------
        }
        // updae
        $data = ['user_details_id'=>$user_id,'img_name'=>$fileName];
        $update = user::uploadImage($data);
    }

}