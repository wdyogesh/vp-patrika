<?php

/**
 * Created by PhpStorm.
 * User: wdyog
 * Date: 05-12-2018
 * Time: 07:33 AM
 */
class user
{
public $id;
public $name;
public $user_id;
public $gotra;
public $gender;
public $dob;
public $birthTime;
public $manglik;
public $height_f;
public $height_i;
public $marital_status;
public $profileBy;
public $fileToUpload;
public $education;
public $occupation;
public $hobbies;
public $fatherName;
public $MotherName;
public $b_married;
public $b_unmarried;
public $s_married;
public $s_unmarried;
public $mobile;
public $address;
public $state;
public $location;
public $city;
public $pass1;
public $id_conform;
public $date_time;
public $about_us;
public $payment;
public $payment_date;
public $short_id;
public $age_f;
public $age_t ;
public $occupations;
public $other_details;
public $mobile_2;
public $email;
public $education_details;
public $occupation_details;
public $mother_Occupation;
public $father_Occupation;
public $age1;
public $age2;
public $img_name;
public $user_details_id;
public $has_default;
public $message;
public $user_pri_id;
public $sender_id;

    public static function contProfile($find,$status)
    {
        if (!empty($find)) {
            $find = ($find == 'bride') ? 'F' : 'M';
        }
        if (!empty($status)) {
            $status_condition = " AND user_details.marital_status = '$status' ";
        }
        else {
            $status_condition = "";
        }

        return $value =  self::find_this_query("SELECT * FROM `user_details` 
                             WHERE user_details.id_conform = '1' 
                             AND user_details.gender = '$find'  
                             $status_condition
                             ORDER BY user_details.id");
    }

    public static function verify_user($user_id,$password){
        global $database;
        $user_id = $database->escape_string($user_id);
        $password =  $database->escape_string($password);
        $the_result_array = self::find_this_query("SELECT * FROM `user_details` 
                                                        WHERE user_id ='$user_id' 
                                                        AND pass1 = '$password'");
        if (!empty($the_result_array)) {
            $the_result_array_r = self::find_this_query("SELECT * FROM `user_details` 
                                                        WHERE user_id ='$user_id' 
                                                        AND pass1 = '$password' AND id_conform = '1'");
            if (!empty($the_result_array_r)) {
                return !empty($the_result_array_r) ? array_shift($the_result_array_r):false;
            }
            else {
                return 'account_not_active';
            }
        }
        else {
            return 'password_not_match';
        }
    }

    public static function addShortListed($data)
    {
        global $database;
        $user_id = $data['user_id'];
        $profile_id = $data['profile_id'];
        // check in database already added profile
       $sql_result = $database->query("SELECT COUNT(*) FROM `short_lists` WHERE `user_id` = '$user_id' and short_profile_id = '$profile_id'");
       $row_result = mysqli_fetch_array($sql_result);
       $total = $row_result[0];
       if ($total == '0') {
            $sql =  "INSERT INTO `short_lists`(`user_id`, `short_profile_id`) VALUES ('$user_id','$profile_id')";
            if ($database->query($sql)){
                // $this->id = $database->insert_the_id();
                return true;
            }
            else{
                return false;
            }
        }
        else {
            return true;
        }
    }

    public static function removeShortListed($shordId)
    {
        global $database;
        $sql =  "DELETE FROM `short_lists` WHERE `short_lists`.`id` = '$shordId';";
        if ($database->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function myShortListed($id)
    {
        return $value =  self::find_this_query("SELECT user_details.* , short_lists.id AS short_id 
                              FROM `user_details` INNER JOIN short_lists ON 
                             user_details.id = short_lists.short_profile_id
                             WHERE user_details.id_conform = '1' AND short_lists.user_id = '$id'
                             ORDER BY short_lists.id");
    }

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = $result_set->fetch_assoc()){
            $the_object_array[] = self::instantation($row);
        }
        return $the_object_array;
    }

    public static function instantation($the_record)
    {
        $the_object = new self;
        foreach ($the_record as $the_attribute => $value){
            if ($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }
    //has_the_attribute and get the data
    private function has_the_attribute($the_attribute){
        $object_properties =  get_object_vars($this);
        return array_key_exists($the_attribute,$object_properties);
    }
    // find user by id
    public static function find_admin_by_id($id)
    {
        $the_result_array = self::find_this_query("SELECT * FROM `user_details` 
                                                        WHERE user_details.id_conform = '1' AND user_details.id = '$id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    public static function find_profile_by_id($profile_id)
    {
        $id = base64_decode($profile_id);
        $the_result_array = self::find_this_query("SELECT * FROM `user_details` 
                                                        WHERE user_details.id_conform = '1' AND user_details.id = '$id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }


    public static function find_partner_prefrenace($user_id)
    {
        $the_result_array = self::find_this_query("SELECT * FROM `partner_preference` 
                                                        WHERE partner_preference.user_id = '$user_id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    public static function update_contact_details($data){
        global $database;
        $mobile = $data['mobile'];
        $mobile_2 = $data['mobile_2'];
        $email = $data['email'];
        $id = $data['id'];
        $sql = "UPDATE `user_details` SET `mobile`= '$mobile',
                                    `mobile_2`='$mobile_2',
                                    `email`= '$email'
                                     WHERE `id` ='$id'";
        $database->query($sql);
        echo "updated";
        return (mysqli_affected_rows($database->cid))?true:false;
    }

    public static function update_about_details($data){
        global $database;
        $about_us = $data['about'];
        $id = $data['id'];
        $sql = "UPDATE `user_details` SET `about_us`= '$about_us' WHERE `id` ='$id'";
        $database->query($sql);
        echo "updated";
        return (mysqli_affected_rows($database->cid))?true:false;
    }

    public static function update_education_details($data){
        global $database;
        $education = $data['education'];
        $education_details = $data['education_details'];
        $occupation = $data['occupation'];
        $occupation_details = $data['occupation_details'];
        $id = $data['id'];
        $sql = "UPDATE `user_details` SET `education` = '$education',
                                          `education_details` = '$education_details',
                                          `occupation` = '$occupation',
                                          `occupation_details` = '$occupation_details'
                                          WHERE `id` ='$id'";
        $database->query($sql);
        return (mysqli_affected_rows($database->cid))?true:false;
    }
    // family details
    public static function update_family_details($data){
        global $database;
        $fatherName = $data['fatherName'];
        $father_Occupation = $data['father_Occupation'];
        $motherName = $data['motherName'];
        $mother_Occupation = $data['mother_Occupation'];
        $b_married = $data['b_married'];
        $b_unmarried = $data['b_unmarried'];
        $s_married = $data['s_married'];
        $s_unmarried = $data['s_unmarried'];
        $id = $data['id'];
        $sql = "UPDATE `user_details` SET `fatherName`= '$fatherName',
                            `father_Occupation`='$father_Occupation' ,
                            `MotherName`='$motherName',
                            `mother_Occupation`='$mother_Occupation',
                            `b_married`='$b_married',
                            `b_unmarried`='$b_unmarried',
                            `s_married`='$s_married',
                            `s_unmarried`='$s_unmarried' WHERE  `id` ='$id'";
        $database->query($sql);
        return (mysqli_affected_rows($database->cid))?true:false;
    }

    // address update
    public static function update_address_details($data){
        global $database;
        $address = $data['address'];
        $state = $data['state'];
        $location = $data['location'];
        $city = $data['city'];
        $id = $data['id'];
        $sql = "UPDATE `user_details` SET `address` = '$address' , `state` = '$state', `location` = '$location', `city` = '$city' WHERE  `id` ='$id'";
        $database->query($sql);
        return (mysqli_affected_rows($database->cid))?true:false;
    }
    // address personal update
    public static function update_personal_details($data){
        global $database;
        $name = $data['name'];
        $gotra = $data['gotra'];
        $dob = $data['dob'];
        $birthTime = $data['birthTime'];
        $manglik = $data['manglik'];
        $height_f = $data['height_f'];
        $height_i = $data['height_i'];
        $maritalStatus = $data['maritalStatus'];
        $profileBy = $data['profileBy'];
        $hobbies = $data['hobbies'];
        $id = $data['id'];
        $sql = "UPDATE `user_details` SET 
                        `name`='$name',
                        `gotra`='$gotra',
                        `dob`='$dob',
                        `birthTime`='$birthTime',
                        `manglik`='$manglik',
                        `height_f`='$height_f',
                        `height_i`='$height_i',
                        `marital_status`='$maritalStatus',
                        `profileBy`='$profileBy',
                        `hobbies`='$hobbies' WHERE  `id` ='$id'";
        $database->query($sql);
        return (mysqli_affected_rows($database->cid))?true:false;
    }
    // Update password
    public static function update_Password_details($data){
        global $database;
        $prePass = $data['prePass'];
        $newPassword = $data['newPassword'];
        $id = $data['id'];
        // check update
        $sqlCheck = $database->query("SELECT * FROM `user_details` WHERE id = '$id' AND pass1 = '$prePass'");
        if($sqlCheck->num_rows != '0') {
            $sql = "UPDATE `user_details` SET `pass1` = '$newPassword' WHERE  `id` ='$id'";
            $database->query($sql);
            echo "Updated";
        }
        else {
            echo  "Not Updated";
        }
    }
    // update partner details
    public static function update_partnner_details($data){
        global $database;
        $age1 = $data['age1'];
        $age2 = $data['age2'];
        $manglik = $data['manglik'];
        $maritalStatus = $data['maritalStatus'];
        $education = $data['education'];
        $occupation = $data['occupation'];
        $other_details = $data['other_details'];
        $id = $data['id'];
        // check update
        $sql = "UPDATE `partner_preference` SET 
                                  `age2`='$age2',`age1`='$age1',
                                  `marital_status`='$maritalStatus',
                                  `manglik`='$manglik',`education`='$education',
                                  `occupations`='$occupation',
                                  `other_details`='$other_details'
                                   WHERE user_id = '$id'";
        $updated = $database->query($sql);
        if( $updated->num_rows != '0') {
            return (mysqli_affected_rows($database->cid))?true:false;
        }
    }
    
    // delete acoount 
    public static function delete_account($data)
    {
        global $database;
        $id = $data['id'];
        $why_delete = $data['why_delete'];
        $feedback = $data['feedback'];
        $sql = "INSERT INTO `delete_account`(`user_id`, `why_delete`, `feedback`) 
                  VALUES ('$id','$why_delete','$feedback')";
        $insert_data = $database->query($sql);
        $update = $database->query("UPDATE `user_details` SET `id_conform`= '0' WHERE id = '$id'");
        //$delete_messages = $database->query(" DELETE FROM `partner_preference` WHERE `partner_preference`.`user_id` = ''");
        echo "Updated";
    }

    // delete acoount
    public static function uploadImage($data)
    {
        global $database;
        //print_r($data);
        $user_details_id = $data['user_details_id'];
        $img_name = $data['img_name'];
        $sql = "INSERT INTO `upload_images`(`user_details_id`, `img_name`, `has_default`) 
                                            VALUES ('$user_details_id','$img_name','0')";
        $insert_data = $database->query($sql);
        if ($insert_data == true) {

        }
        else {
            mysqli_error($database->cid);
        }
    }
    // save chat

    public static function save_chat($data)
    {
        global $database;
        $sender_id = $data['sender_id'];
        $reciver_id = $data['reciver_id'];
        $message = $data['message'];
        $date_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `user_mail`
                        (`receiver_id`, `sender_id`, `message`, `date_time`) 
                        VALUES ('$reciver_id','$sender_id','$message','$date_time')";
        $sql_query = $database->cid->query($sql);
        return "updated";
    }


    // upload images
    public static function uploadedImages($profile_id)
    {
       return $the_result_array = self::find_this_query("SELECT upload_images.img_name FROM `upload_images` INNER 
                                JOIN user_details ON user_details.user_id = upload_images.user_details_id 
                                WHERE upload_images.user_details_id = '$profile_id'");
       // return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    // delete images to delete
    public static function find_image_by_name($data){
        global $database;
        $profile_id = $data['profile_id'];
        $img_name = $data['delete_images'];
        $sql = "DELETE FROM `upload_images` WHERE user_details_id = '$profile_id' and img_name = '$img_name'";
        $delete_file = $database->query($sql);
        echo "image deleted";
    }

    public static function find_by_user_id($user_id)
    {
        $the_result_array = self::find_this_query("SELECT * from user_details WHERE user_id = '$user_id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    public static function find_message_list($reciver_id)
    {
        return self::find_this_query("SELECT user_details.*, user_mail.*, user_mail.sender_id, user_mail.message, user_details.id as user_pri_id  
                                            FROM `user_mail` INNER JOIN user_details ON user_mail.sender_id = user_details.user_id WHERE user_mail.receiver_id = '$reciver_id'
                                            GROUP BY sender_id
                                            ORDER BY `user_mail`.`id` DESC");
    }

    public static function find_message_list_sent($sender_id)
    {
        return self::find_this_query("SELECT user_details.*, user_mail.*, user_mail.receiver_id, user_mail.message, user_details.id as user_pri_id  
                                            FROM `user_mail` INNER JOIN user_details ON user_mail.receiver_id = user_details.user_id WHERE user_mail.sender_id = '$sender_id'
                                            GROUP BY receiver_id
                                            ORDER BY `user_mail`.`id` DESC");
    }

    public static function chat_list($sender_id, $reciver_id)
    {
        return self::find_this_query("SELECT user_details.*, user_mail.*, user_mail.sender_id, user_mail.message, user_details.id as user_pri_id  
                                            FROM `user_mail` INNER JOIN user_details ON user_mail.sender_id = user_details.user_id 
                                            WHERE user_mail.sender_id IN ('$sender_id', '$reciver_id') AND receiver_id IN ('$sender_id', '$reciver_id')
                                            ORDER BY `user_mail`.`id` ASC");
    }
}