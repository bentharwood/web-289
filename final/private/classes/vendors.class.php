<?php

class vendors extends DatabaseObject
{

  static protected $table_name = "vendors";
  static protected $db_columns = ['vendor_id', 'vendor_name', 'vendor_description', 'other_vendor_info'];

  public $vendor_id;
  public $vendor_name;
  public $vendor_description;
  public $other_vendor_info;

  public function __construct($args = [])
  {
    $this->vendor_id = $args['vendor_id'] ?? '';
    $this->vendor_name = $args['vendor_name'] ?? '';
    $this->vendor_description = $args['vendor_description'] ?? '';
    $this->other_vendor_info = $args['other_vendor_info'] ?? '';
  }

  protected function create()
  {
    return parent::create();
  }

  public function update()
  {
    $this->validate();
    if (!empty($this->errors)) {
      return false;
    }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach ($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE vendor_id ='" . self::$database->escape_string($this->vendor_id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function delete()
  {
    $sql = "delete from " . static::$table_name . " ";
    $sql .= "WHERE vendor_id ='" . self::$database->escape_string($this->vendor_id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->vendor_name)) {
      $this->errors[] = "vendor name cannot be blank.";
    } elseif (!has_length($this->vendor_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "vendor name must be between 2 and 255 characters.";
    }

    if (is_blank($this->vendor_description)) {
      $this->errors[] = "vendor description cannot be blank.";
    } elseif (!has_length($this->vendor_description, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "vendor description must be between 2 and 255 characters.";
    }
    return $this->errors;
  }

  static public function find_by_vendor_name($username)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "where vendor_name='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_id($id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE vendor_id ='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
}
