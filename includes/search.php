<?php
/**
 * Created by PhpStorm.
 * User: wdyog
 * Date: 05-12-2018
 * Time: 07:33 AM
 */
class search
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
    public static function featureProfile()
    {
        return self::find_this_query("SELECT user_details.* FROM `user_details` 
                                              INNER JOIN featured_profiles 
                                              On featured_profiles.user_details_id = user_details.id 
                                              WHERE user_details.id_conform = '1' 
                                              ORDER BY user_details.id 
                                              DESC");
    }

    // search profile
    public static function searchProfile($find, $status, $start_from, $limit, $id)
    {
        $find = ($find == 'bride') ? 'F' : 'M';
        if (!empty($status)) {
            $status_condition = " AND user_details.marital_status = '$status' ";
        }
        else {
            $status_condition = "";
        }
        if (!empty($id)) {
            $id_condition = " AND user_details.id NOT IN (SELECT short_lists.short_profile_id FROM `short_lists`) ";
        }
        else {
            $id_condition = '';
        }
        return self::find_this_query("SELECT * FROM `user_details` 
                                                    WHERE user_details.id_conform = '1' 
                                                     AND user_details.gender = '$find' $status_condition $id_condition
                                                     ORDER BY 
                                                    `user_details`.`id` DESC LIMIT $start_from , $limit");

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



}