<?php
require("../../config/db.conf.php");

class DbHelpers {
 public $db;

 public function __construct($conn) {
    $this->db = $conn;
 }

 public function getAll ($table) {
    $result = mysqli_query($this->db, "SELECT * FROM " . $table);
    if ($result) {
        return mysqli_fetch_assoc($result);
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
          "message" => mysqli_error($this->db)
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