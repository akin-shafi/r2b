<?php
class User extends DatabaseObject
{
  protected static $table_name = "users";
  protected static $db_columns = ['id', 'role_id', 'prefix', 'first_name', 'last_name', 'email', 'phone', 'profile_img', 'address', 'hashed_password', 'reset_password', 'activated', 'terms', 'created_at', 'updated_at', 'created_by', 'deleted'];

  public $id;
  public $role_id;
  public $prefix;
  public $first_name;
  public $last_name;
  public $email;
  public $phone;
  public $profile_img;
  public $address;
  public $hashed_password;
  public $reset_password;
  public $activated;
  public $terms;
  public $created_at;
  public $updated_at;
  public $created_by;
  public $deleted;

  public $password;
  public $confirm_password;
  protected $password_required = true;

  const ROLE = [
    1 => 'Super Admin',
    2 => 'Admin',
    3 => 'Support',
  ];

  public function __construct($args = [])
  {
    $this->role_id          = $args['role_id'] ?? 2;
    $this->prefix           = $args['prefix'] ?? '';
    $this->first_name       = $args['first_name'] ?? '';
    $this->last_name        = $args['last_name'] ?? '';
    $this->email            = $args['email'] ?? '';
    $this->phone            = $args['phone'] ?? '';
    $this->profile_img      = $args['profile_img'] ?? '';
    $this->address          = $args['address'] ?? '';
    $this->reset_password   = $args['reset_password'] ?? 0;
    $this->password         = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->activated        = $args['activated'] ?? 0;
    $this->terms            = $args['terms'] ?? 0;
    $this->created_at       = $args['created_at'] ?? date('Y-m-d H:i:s');
    $this->updated_at       = $args['updated_at'] ?? date('Y-m-d H:i:s');
    $this->created_by       = $args['created_by'] ?? '';
    $this->deleted          = $args['deleted'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name . ' ' . $this->last_name;
  }

  protected function set_hashed_password()
  {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password)
  {
    return password_verify($password, $this->hashed_password);
  }

  protected function create()
  {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update()
  {
    if ($this->password != '') :
      $this->set_hashed_password();
    else :
      $this->password_required = false;
    endif;
    return parent::update();
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->first_name)) :
      $this->errors[] = "First name is required.";
    endif;

    if (is_blank($this->last_name)) :
      $this->errors[] = "Last name is required.";
    endif;

    if (is_blank($this->terms)) :
      $this->errors[] = "Kindly accept the terms & condition.";
    endif;


    if (is_blank($this->email)) :
      $this->errors[] = "Email is required.";
    elseif (!has_length($this->email, array('max' => 255))) :
      $this->errors[] = "Last name must be less than 255 characters.";
    elseif (!has_valid_email_format($this->email)) :
      $this->errors[] = "Email must be a valid format.";
    elseif (!has_unique_email($this->email, $this->id ?? 0)) :
      $this->errors[] = "Email taken. Try another.";
    endif;

    if ($this->password_required) :
      if (is_blank($this->password)) :
        $this->errors[] = "Password cannot be blank.";
      elseif (!has_length($this->password, array('min' => 5))) :
        $this->errors[] = "Password must contain 5 or more characters";
      elseif (!preg_match('/[A-Z]/', $this->password)) :
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      elseif (!preg_match('/[a-z]/', $this->password)) :
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      elseif (!preg_match('/[0-9]/', $this->password)) :
        $this->errors[] = "Password must contain at least 1 number";
      elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) :
        $this->errors[] = "Password must contain at least 1 symbol";
      endif;

      if (is_blank($this->confirm_password)) :
        $this->errors[] = "Confirm password cannot be blank.";
      elseif ($this->password !== $this->confirm_password) :
        $this->errors[] = "Password  mismatched.";
      endif;
    endif;

    return $this->errors;
  }

  public static function is_activated($activated = 1)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE activated ='" . self::$database->escape_string($activated) . "'";
    $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) :
      return array_shift($obj_array);
    else :
      return false;
    endif;
  }
}
