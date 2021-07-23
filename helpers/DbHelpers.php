<?php
function GetRelativePath($path)
{
    $npath = str_replace('\\', '/', $path);
    return str_replace('DOCUMENT_ROOT', '', $npath);
}

require(GetRelativePath(dirname(__FILE__))."../../config/db.conf.php");

class DbHelpers {
 public $db;

 public function __construct($conn) {
    $this->db = $conn;
 }

 public function getAll ($table) {
    $result = mysqli_query($this->db, "SELECT * FROM " . $table);
    if ($result) {
        return $result;
    } else {
        return 'table not found';
    }
 }

 public function postData ($table, $data) {
    $fields = implode(", ", array_keys($data));
    $values  = "'".implode("', '", array_values($data))."'";
    $result = mysqli_query($this->db, "INSERT INTO `".$table."` ($fields) VALUES ($values)");
    mysqli_close($this->db);
    if (!$result) {
        return (object)[
          "response" => $result,
          "message" => 'error message'
        ];
    } else {
        return (object)[
          "response" => $result,
          "message" => "success"
        ];
    }
 }

 public function updateData ($table, $data) {
    $values = '';
    foreach($data as $key => $value) {
      $values .= $key.' = "'.$value.'", ';
    }
    $result = mysqli_query($this->db, "UPDATE `".$table."` SET ".rtrim($values, ", ")." WHERE id = ".$data['id']);
    mysqli_close($this->db);
    if (!$result) {
        return (object)[
          "response" => $result,
          "message" => 'error message'
        ];
    } else {
        return (object)[
          "response" => $result,
          "message" => "success"
        ];
    }
 }

 public function CheckIfMatch ($tableName, $field) {
   $result = mysqli_query($this->db,"SELECT * FROM $tableName WHERE ".array_key_first($field)." = '".$field[array_key_first($field)]."'");
   if (!$result) {
    return (object)[
      "response" => 'Field not found',
      "message" => mysqli_error($this->db)
    ];
  } else {
      return (object)[
        "response" => $result,
        "message" => "success"
      ];
  }
 }

 public function PasswordChecker ($password) {
    // password variables
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    return !$uppercase || !$number ||!$lowercase || !$specialChars || strlen($password)<8;
 }

 public function errorFunction ($errorMessage) {
  header("Location: ../../supplier/supply.php?error=$errorMessage");
  exit();
 }
}

$db_helpers = new DbHelpers($conn);

?>