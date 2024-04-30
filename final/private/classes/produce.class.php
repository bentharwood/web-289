<?php

class produce extends DatabaseObject
{

  static protected $table_name = "goods";
  static protected $db_columns = ['item_id', 'vendor_id', 'item_name', 'item_description', 'item_price', 'other_item_info'];

  public $item_id;
  public $vendor_id;
  public $item_name;
  public $item_description;
  public $item_price;
  public $other_item_info;

  public function __construct($args = [])
  {
    $this->item_id = $args['items_id'] ?? '';
    $this->vendor_id = $args['vendor_id'] ?? '';
    $this->item_name = $args['item_name'] ?? '';
    $this->item_description = $args['item_description'] ?? '';
    $this->item_price = $args['item_price'] ?? '';
    $this->other_item_info = $args['other_item_info'] ?? '';
  }
  public function create()
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
    $sql .= " WHERE item_id ='" . self::$database->escape_string($this->item_id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function delete()
  {
    $sql = "delete from " . static::$table_name . " ";
    $sql .= "WHERE item_id ='" . self::$database->escape_string($this->item_id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->item_name)) {
      $this->errors[] = "Item name cannot be blank.";
    } elseif (!has_length($this->item_name, ['min' => 2, 'max' => 255])) {
      $this->errors[] = "Item name must be between 2 and 255 characters.";
    }

    if (is_blank($this->item_description)) {
      $this->errors[] = "Item description cannot be blank.";
    } elseif (!has_length($this->item_description, ['min' => 2, 'max' => 255])) {
      $this->errors[] = "Item description must be between 2 and 255 characters.";
    }

    if (!is_numeric($this->item_price)) {
      $this->errors[] = "Item price must be a number.";
    }

    return $this->errors;
  }

  static public function find_by_item_name($item_name)
  {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE item_name ='" . self::$database->escape_string($item_name) . "'";
      return static::find_by_sql($sql);
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

  static public function find_item_by_id($id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE item_id ='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}
