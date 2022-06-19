<?php
class Business extends DatabaseObject
{
  protected static $table_name = "businesses";
  protected static $db_columns = ['id', 'user_id', 'business_name', 'start_date', 'currency', 'logo', 'website', 'contact_number', 'contact_alt', 'country', 'state', 'city', 'zip', 'created_at', 'updated_at', 'deleted'];

  public $id;
  public $user_id;
  public $business_name;
  public $start_date;
  public $currency;
  public $logo;
  public $website;
  public $contact_number;
  public $contact_alt;
  public $country;
  public $state;
  public $city;
  public $zip;
  public $created_at;
  public $updated_at;
  public $deleted;

  public $counts;

  public function __construct($args = [])
  {
    $this->user_id          = $args['user_id'] ?? '';
    $this->business_name    = $args['business_name'] ?? '';
    $this->start_date       = $args['start_date'] ?? '';
    $this->currency         = $args['currency'] ?? '';
    $this->logo             = $args['logo'] ?? 'business.png';
    $this->website          = $args['website'] ?? '';
    $this->contact_number   = $args['contact_number'] ?? '';
    $this->contact_alt      = $args['contact_alt'] ?? '';
    $this->country          = $args['country'] ?? '';
    $this->state            = $args['state'] ?? '';
    $this->city             = $args['city'] ?? '';
    $this->zip              = $args['zip'] ?? '';
    $this->created_at       = $args['created_at'] ?? date('Y-m-d H:i:s');
    $this->updated_at       = $args['updated_at'] ?? date('Y-m-d H:i:s');
    $this->deleted          = $args['deleted'] ?? '';
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->business_name)) :
      $this->errors[] = "Business name is required.";
    endif;

    return $this->errors;
  }

  public static function find_all_businesses()
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $sql .= "ORDER BY name ASC";
    return static::find_by_sql($sql);
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
