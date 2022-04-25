<?php

class Fa{
    public $id;
    public $first_name;
    public $middile_name;
    public $last_name;
    public $dob;
    public $qualification;
    public $address1;
    public $address2;
    public $district;
    public $state;
    public $pin_code;
    public $branch_code;
    public $bank_name;
    public $acc_number;
    public $pan_number;
    public $mobile_number;
    public $land_line_number;
    public $email_id;
    public $password;
    public $ag_reg_date_time;
    public $approval_code;
    public $flag;
    public $interested_plan;
    public $pass_auth;
    public $fa_id;
    public $fa_reg_date_time;
    public $asgn_sp;

    public static function find_all_fa(){
        return self::find_this_query("SELECT * FROM `fa_reg`");
    }
    // this is for find all fa by using the fa_id
    public static function find_fa_by_fa_id($fp_id){
        $the_result_array = self::find_this_query("SELECT * FROM `fa_reg` WHERE `fa_id` ='$fp_id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }
    // find the sp name using id
    public static function find_sp_by_sp_id($sp_id){
        $the_result_array = self::find_this_query("SELECT * FROM `ag_reg` WHERE `agent_id` =''");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    // find where id flag (approval by admin)
    public static function find_fa_by_flag(){
        return $the_result_array = self::find_this_query("SELECT * FROM `fa_reg` WHERE `flag` ='0'");
        //return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    // find fa by using the distrcit value goes here
    public static function find_fa_by_district($district){
        return self::find_this_query("SELECT * FROM `fa_reg` WHERE `district` ='$district'");
    }

    public static function find_distinct_district_fa(){
        return self::find_this_query("SELECT DISTINCT district FROM ag_reg");
    }

    public static function find_admin_by_fa_plan($plan_type){
        return $the_result_array = self::find_this_query("SELECT * FROM `fa_reg` WHERE `interested_plan` ='$plan_type'");
        //return !empty($the_result_array) ? array_shift($the_result_array):false;
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

    public static function verify_user($user_name,$password){
        global $database;
        $user_name = $database->escape_string($user_name);
        $password =  $database->escape_string($password);
        $the_result_array = self::find_this_query("SELECT * FROM `admin` WHERE `user_name` = '$user_name' AND `password` ='$password'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    // this is for auto instantation function help to get the data
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

    // this is for the approval of the new FA
    public static function approve_new_fa($fa_id)
    {
        global $database;
        $sql = "UPDATE `fa_reg` SET `flag`='1'  WHERE `fa_id` = '$fa_id'";
        if ($database->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function add_new_fa()
    {
        global $database;
        $sql = "INSERT INTO `fa_reg`(`first_name`, `middile_name`, `last_name`, `dob`, `qualification`, `address1`, `address2`, `district`,`state`, `pin_code`, `branch_code`, `bank_name`, `acc_number`, `pan_number`, `mobile_number`, `land_line_number`,`email_id`, `password`, `fa_reg_date_time`, `approval_code`, `flag`, `interested_plan`, `asgn_sp`, `fa_id`)";
        $sql .= "VALUES('";
        $sql .= $database->escape_string($this->first_name). "','";
        $sql .= $database->escape_string($this->middile_name). "','";
        $sql .= $database->escape_string($this->last_name). "','";
        $sql .= $database->escape_string($this->dob). "','";
        $sql .= $database->escape_string($this->qualification). "','";
        $sql .= $database->escape_string($this->address1). "','";
        $sql .= $database->escape_string($this->address2). "','";
        $sql .= $database->escape_string($this->district). "','";
        $sql .= $database->escape_string($this->state). "','";
        $sql .= $database->escape_string($this->pin_code). "','";
        $sql .= $database->escape_string($this->branch_code). "','";
        $sql .= $database->escape_string($this->bank_name). "','";
        $sql .= $database->escape_string($this->acc_number). "','";
        $sql .= $database->escape_string($this->pan_number). "','";
        $sql .= $database->escape_string($this->mobile_number). "','";
        $sql .= $database->escape_string($this->land_line_number). "','";
        $sql .= $database->escape_string($this->email_id). "','";
        $sql .= $database->escape_string($this->password). "','";
        $sql .= $database->escape_string($this->fa_reg_date_time). "','";
        $sql .= $database->escape_string($this->approval_code). "','";
        $sql .= $database->escape_string($this->flag). "','";
        $sql .= $database->escape_string($this->interested_plan). "','";
        $sql .= $database->escape_string($this->asgn_sp). "','";
        $sql .= $database->escape_string($this->fa_id). "')";
        $count= mysqli_num_rows($database->query("SELECT * FROM `fa_reg` WHERE `mobile_number` ='escape_string($this->mobile_number)'"));
        if($count > 0 )
        {
            return false;
        }
        else{
            if ($database->query($sql)){
                $this->admin_id= $database->insert_the_id();
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function delete_fa($fa_id){
        global $database;
        $sql = "DELETE FROM `fa_reg` WHERE `fa_reg`.`agent_id` ='$sp_id';";
        $database->query($sql);
        return (mysqli_affected_rows($database->cid)==1)?true:false;
    }

    public function update_fa($fa_id){
        global $database;
        $sql = "UPDATE `fa_reg` SET `first_name`='$this->first_name',
                                    `middile_name`='$this->middile_name',
                                    `last_name`='$this->last_name',
                                    `dob`='$this->dob',
                                    `qualification`='$this->qualification',
                                    `address1`='$this->address1',
                                    `address2`='$this->address2',
                                    `district`='$this->district',
                                    `state`='$this->state',
                                    `pin_code`='$this->pin_code',
                                    `branch_code`='$this->branch_code',
                                    `bank_name`='$this->bank_name',
                                    `acc_number`='$this->acc_number',
                                    `pan_number`='$this->pan_number',
                                    `mobile_number`='$this->mobile_number',
                                    `land_line_number`='$this->land_line_number',
                                    `email_id`='$this->email_id',
                                    `interested_plan`='$this->interested_plan',
                                    `asgn_sp`='$this->asgn_sp'  
                                     WHERE `fa_id` ='$fa_id'";
        $database->query($sql);
        return (mysqli_affected_rows($database->cid)==1)?true:false;
    }







    // call the update function here
    // $user = User:: find_user_by_id();
    // $user->last_name = "RAM";
    //$user->update();

    /*public function delete(){
        global $database;
        $sql = "DELETE FROM user";
        $sql .= "WHERE id=".$database->escape_string($this->id);
        $database->query($sql);
        return (mysqli_affected_rows($database->cid)==1)?true:false;
    }
    $user = Sp::find_user_by_id();*/
}
?>