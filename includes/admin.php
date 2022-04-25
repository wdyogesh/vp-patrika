<?php

class Admin
{
    public $student_name;
    public $student_id;
    public $marks;
    public $id;
    // here the another teacher details goes here
    public $teacher_name;
    public $teacher_id;
    public $user_name;
    public $password;
    public $topic_1;
    public $topic_2;
    public $topic_3;
    public $topic_4;
    public $topic_5;
    public $topic_6;
    public $topic_7;
    public $topic_8;
    public $topic_9;
    public $topic_10;
    public $cate_id;
    public $title;
    public $content;
    public $post_date;
    public $f_name;
    public $l_name;

    public static function find_all_count()
    {
            return self::find_this_query("SELECT count(*) AS count FROM gps_teachers
                                            UNION
                                            SELECT count(*) AS count FROM gps_students
                                            UNION
                                            SELECT count(*) AS count FROM gps_admin
                                            UNION
                                            SELECT count(*) AS count FROM gps_class");
    }

    public static function get_all_news()
    {
        return self::find_this_query("SELECT * FROM `gps_news` ORDER BY `gps_news`.`post_date` DESC LIMIT 5 ");
    }
    // Get the news details by using the ID
    public static function get_all_news_by_id($id){
        $the_result_array = self::find_this_query("SELECT * FROM `gps_news` WHERE `id` ='$id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }
    public static function find_all_admin(){
        return self::find_this_query("SELECT * FROM `admin`");
    }
    // find admin by using the id
    public static function find_admin_by_id($id){
        $the_result_array = self::find_this_query("SELECT * FROM `gps_admin` WHERE `id` ='$id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }
    // add new student
    public static function find_all_student(){
        return self::find_this_query("SELECT * FROM `student_list`");
    }

    // check here the age limit in this section
    public static function find_all_age_limit()
    {
        return self::find_this_query("SELECT * FROM `age_limit`");
    }

    public static function find_student_by_id($id)
    {
        $the_result_array = self::find_this_query("SELECT * FROM `student_list` WHERE `id` ='$id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }
    
    public static function count_all_sp(){
        global $database;
        $sp= $database->query("SELECT * FROM `ag_reg`");
        return $count_sp = $sp->num_rows;
    }

    public static function count_all_member(){
        global $database;
        $member = $database->query("SELECT * FROM cust_reg");
        return $count_mem = $member->num_rows;
    }
    // total plans here
    public static function find_all_plan(){
        return self::find_this_query("SELECT * FROM `insurance_reg`");
    }

    // find all plan by id
    public static function find_insurance_plan_by_id($insurance_id){
        $the_result_array = self::find_this_query("SELECT * FROM `insurance_reg` WHERE `insurance_id` ='$insurance_id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }
    // view here all plans
    public static function count_all_plans(){
        global $database;
        $plans = $database->query("SELECT * FROM insurance_reg");
        return $count_mem = $plans->num_rows;
    }
   //count all the company here
    public static function count_all_company(){
        global $database;
        $company = $database->query("SELECT * FROM com_reg");
        return $cout_company = $company->num_rows;
    }

    public static function find_admin_by_admin_name($admin_id){
        $the_result_array = self::find_this_query("SELECT * FROM `admin` WHERE `user_name` = '$admin_id' ");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = $result_set->fetch_assoc()){
            $the_object_array[] = self::instantation($row);
        }
        echo mysqli_error($database->cid);
        return $the_object_array;

    }

    public static function get_all_question_by_student_id($student_id){
        $the_result_array = self::find_this_query("SELECT * FROM `questions` WHERE `student_id` ='$student_id'");
        return !empty($the_result_array) ? array_shift($the_result_array):false;
    }


    public static function verify_user($user_name,$password){
        global $database;
         $user_name = $database->escape_string($user_name);
         $password =  $database->escape_string($password);
         $the_result_array = self::find_this_query("SELECT * FROM `gps_admin` WHERE userName ='$user_name' AND password = '$password'");
         echo mysqli_error($database->cid);
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

    //
    protected function properties(){
       $properties = array();
       foreach (self::$admin_table_filed as $admin_filed){
           if (property_exists($this,$admin_filed)){
              $properties[$admin_filed] = $this->$admin_filed;
           }
       }
        return $properties;
    }

    public function create_admin()
    {
        global $database;
        $properties = $this->properties();
        $sql = "INSERT INTO " . self::$admin_tb ."(".implode(",",array_keys($properties)).")";
        $sql .= "VALUES('". implode(",",array_values($properties)) . "')";
        if ($database->query($sql)){
            $this->admin_id= $database->insert_the_id();
            return true;

        }
        else{
            return mysqli_error($database->cid);
        }
    }

    public function add_new_student()
    {
        global $database;
        $sql = "INSERT INTO `student_list`(`student_name`, `student_id`)";
        $sql .= "VALUES('";
        $sql .= $database->escape_string($this->student_name). "','";
        $sql .= $database->escape_string($this->student_id). "')";
        if ($database->query($sql)){
            $this->admin_id= $database->insert_the_id();
            return true;

        }
        else{
            return false;
        }
    }

    public function add_new_teacher()
    {
        global $database;
        $sql = "INSERT INTO `teacher_list`(`teacher_name`, `teacher_id`,`password`)";
        $sql .= "VALUES('";
        $sql .= $database->escape_string($this->teacher_name). "','";
        $sql .= $database->escape_string($this->password). "','";
        $sql .= $database->escape_string($this->teacher_id). "')";
        if ($database->query($sql)){
            $this->admin_id= $database->insert_the_id();
            return true;
        }
        else{
            return false;
        }
    }

    // add question
    public function add_new_question()
    {
        global $database;
        $sql = "INSERT INTO `questions`(`topic_1`, `topic_2`, `topic_3`, `topic_4`, `topic_5`, `topic_6`, `topic_7`, `topic_8`, `topic_9`, `topic_10`, `cate_id`, `student_id`)";
        $sql .= "VALUES('";
        $sql .= $database->escape_string($this->topic_1). "','";
        $sql .= $database->escape_string($this->topic_2). "','";
        $sql .= $database->escape_string($this->topic_3). "','";
        $sql .= $database->escape_string($this->topic_4). "','";
        $sql .= $database->escape_string($this->topic_5). "','";
        $sql .= $database->escape_string($this->topic_6). "','";
        $sql .= $database->escape_string($this->topic_7). "','";
        $sql .= $database->escape_string($this->topic_8). "','";
        $sql .= $database->escape_string($this->topic_9). "','";
        $sql .= $database->escape_string($this->topic_10). "','";
        $sql .= $database->escape_string($this->cate_id). "','";
        $sql .= $database->escape_string($this->student_id). "')";
        if ($database->query($sql)){
            $this->admin_id= $database->insert_the_id();
            return true;
        }
        else{
            return false;
        }
    }

    




}