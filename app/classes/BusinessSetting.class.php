<?php
class BusinessSetting extends DatabaseObject
{
  protected static $table_name = "business_settings";
  protected static $db_columns = ['id', 'user_id', 'business_id', 'tax_name', 'tax_number', 'financial_start_month', 'stock_method', 'date_format', 'time_format', 'created_at', 'updated_at', 'deleted'];


  public $id;
  public $user_id;
  public $business_id;
  public $tax_name;
  public $tax_number;
  public $financial_start_month;
  public $date_format;
  public $time_format;
  public $stock_method;
  public $created_at;
  public $updated_at;
  public $deleted;

  public $counts;

  public function __construct($args = [])
  {
    $this->user_id                = $args['user_id'] ?? '';
    $this->business_id            = $args['business_id'] ?? '';
    $this->tax_name               = $args['tax_name'] ?? '';
    $this->tax_number             = $args['tax_number'] ?? '';
    $this->financial_start_month  = $args['financial_start_month'] ?? '';
    $this->date_format            = $args['date_format'] ?? '';
    $this->time_format            = $args['time_format'] ?? '';
    $this->stock_method           = $args['stock_method'] ?? '';
    $this->created_at             = $args['created_at'] ?? date('Y-m-d H:i:s');
    $this->updated_at             = $args['updated_at'] ?? date('Y-m-d H:i:s');
    $this->deleted                = $args['deleted'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    // if (is_blank($this->business_id)) :
    //   $this->errors[] = "Business name is required.";
    // endif;

    return $this->errors;
  }

  public static function find_by_user_id($uId)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE user_id='" . self::$database->escape_string($uId) . "'";
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) :
      return array_shift($obj_array);
    else :
      return false;
    endif;
  }
}
