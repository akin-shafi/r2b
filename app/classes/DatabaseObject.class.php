<?php

class DatabaseObject // * This serves as the PARENT OBJECT that all order class object extends from
{
  static protected $database;
  static protected $table_name = "";
  static protected $columns = [];
  public $errors = [];
  static protected $db_columns;

  static public function set_database($database)
  {
    self::$database = $database;
  }

  static public function find_by_sql($sql)
  {
    $result = self::$database->query($sql);
    if (!$result) exit("Database query failed.");

    $object_array = [];
    while ($record = $result->fetch_assoc()) :
      $object_array[] = static::instantiate($record);
    endwhile;

    $result->free();

    return $object_array;
  }

  static protected function instantiate($record)
  {
    $object = new static;
    // *** Could manually assign values to properties ***
    // *** but automatically assignment is easier and re-usable ***
    foreach ($record as $property => $value) :
      if (property_exists($object, $property)) :
        $object->$property = $value;
      endif;
    endforeach;
    return $object;
  }

  protected function validate()
  {
    return $this->errors;
  }

  protected function create()
  {
    $this->validate();
    if (!empty($this->errors)) :
      return false;
    endif;

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";

    $result = self::$database->query($sql);
    if ($result) :
      $this->id = self::$database->insert_id;
    endif;
    return $result;
  }

  protected function update()
  {
    $this->validate();
    if (!empty($this->errors)) return false;

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach ($attributes as $key => $value) :
      $attribute_pairs[] = "{$key}='{$value}'";
    endforeach;

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";

    $result = self::$database->query($sql);
    return $result;
  }

  public function save()
  {
    // *** A new record will not have an ID yet ***
    if (isset($this->id)) :
      return $this->update();
    else :
      return $this->create();
    endif;
  }

  public function merge_attributes($args = [])
  {
    foreach ($args as $key => $value) :
      if (property_exists($this, $key) && !is_null($value)) :
        $this->$key = $value;
      endif;
    endforeach;
  }

  // *** Properties which have database columns, excluding ID ***
  public function attributes()
  {
    $attributes = [];
    foreach (static::$db_columns as $column) :
      if ($column == 'id') continue;
      $attributes[$column] = $this->$column;
    endforeach;
    return $attributes;
  }

  protected function sanitized_attributes()
  {
    $sanitized = [];
    foreach ($this->attributes() as $key => $value) :
      $sanitized[$key] = self::$database->escape_string($value);
    endforeach;
    return $sanitized;
  }

  public function delete()
  {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;

    // *** After deleting, the instance of the object will still ***
    // *** exist, even though the database record does not .***
    // *** This can be useful, as in :***
    // *** echo $user->first_name . " was deleted .";***
    // *** but, for example, we can't call $user->update() after ***
    // *** calling $user->delete ().***
  }

  static public function soft_delete($id)
  {
    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= "deleted = 1 ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  static public function find_by_soft_delete($options = [])
  {
    $order = $options['order'] ?? false;

    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";

    if ($order) :
      $sql .= " ORDER BY id " . self::$database->escape_string($order) . " ";
    else :
      $sql .= " ORDER BY id DESC ";
    endif;

    return static::find_by_sql($sql);
  }

  static public function find_all()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "ORDER BY id DESC ";
    return static::find_by_sql($sql);
  }

  static public function count_all()
  {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  static public function find_by_id($id)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) :
      return array_shift($obj_array);
    else :
      return false;
    endif;
  }

  static public function find_by_email($email)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) :
      return array_shift($obj_array);
    else :
      return false;
    endif;
  }

  static public function find_by_username($username)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) :
      return array_shift($obj_array);
    else :
      return false;
    endif;
  }

  static public function find_by_phone($phone)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE phone='" . self::$database->escape_string($phone) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) :
      return array_shift($obj_array);
    else :
      return false;
    endif;
  }
}
