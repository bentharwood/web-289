<?php

class users extends DatabaseObject {

  static protected $table_name = "users_usr";
  static protected $db_columns = ['id_usr', 'first_name_usr', 'last_name_usr', 'email_usr', 'username_usr','address_usr','user_level_usr','hashed_password_usr', 'city_usr'];

  public $id_usr;
  public $first_name_usr;
  public $last_name_usr;
  public $email_usr;
  public $username_usr;
  public $address_usr;
  public $city_usr;
  public $user_level_usr;
  protected $hashed_password_usr;
  public $password_usr;
  public $confirm_password;
  protected $password_required = true;
  
  public function __construct($args=[]) {
    $this->first_name_usr = $args['first_name_usr'] ?? '';
    $this->last_name_usr = $args['last_name_usr'] ?? '';
    $this->email_usr = $args['email_usr'] ?? '';
    $this->username_usr = $args['username_usr'] ?? '';
    $this->address_usr = $args['address_usr'] ?? '';
    $this->city_usr = $args['city_usr'] ?? '';
    $this->user_level_usr = $args['user_level_usr'] ?? '';
    $this->password_usr = $args['password_usr'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name() {
    return $this->first_name_usr . " " . $this->last_name_usr;
  }

  protected function set_hashed_password() {
    $this->hashed_password_usr = password_hash($this->password_usr, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password_usr);
  }

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update() {
    if($this->password_usr != '') {
      $this->set_hashed_password();
    } else {
      $this->password_required = false;
    }
    return parent::update();
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->first_name_usr)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name_usr, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($this->last_name_usr)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name_usr, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($this->email_usr)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email_usr, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email_usr)) {
      $this->errors[] = "Email must be a valid format.";
    }

    if(is_blank($this->username_usr)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_length($this->username_usr, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($this->username_usr, $this->id_usr?? 0)) {
      $this->errors[] = "Username not allowed. Try another.";
    }

    if($this->password_required) {
      if(is_blank($this->password_usr)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password_usr, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password_usr)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password_usr)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password_usr)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password_usr)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password_usr !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }

    return $this->errors;
  }

  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "where username_usr='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}

?>
