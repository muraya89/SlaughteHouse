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
    
  public function show ($table, $data) {
    $result = mysqli_query($this->db, "SELECT orders.*, animals.breed, animals.number, animals.type, animals.* FROM $table 
    JOIN animals ON animals.id = $table.product_id WHERE " . key($data) . " = " . $data[key($data)]);
    if ($result) {
      return $result;
    } else {
      return 'table not found';
    }
  }
  
  public function getOrders ($table) {
    $result = mysqli_query($this->db, "SELECT orders.*, orders.id as order_id, orders.created_at as made_on, orders.user_id as buyer_id, animals.* FROM $table JOIN animals ON animals.id = $table.product_id");
    if ($result) {
      return $result;
    } else {
      return 'table not found';
    }
  }

  public function getByMonth ($table) {
    $result = mysqli_query($this->db, "SELECT MONTH(created_at) as month, COUNT(*) as count FROM $table GROUP BY MONTH(created_at)");
    if ($result) {
      return $result;
    } else {
      return 'table not found';
    }
  }

  public function getUsers ($account_type) {
    $result = mysqli_query($this->db, "SELECT * FROM users WHERE account = '$account_type'");
    if ($result) {
      return $result;
    } else {
      return 'table not found';
    }
  }

  public function getCategory($table){
    $cat = mysqli_query($this->db, "SELECT categories.*, categories.name FROM $table");
    if($cat){
      return $cat;
    }else{
      return 'table not found';
    }
  }
  public function ordering(){
    $result = mysqli_query($this->db, "SELECT animals.breed,animals.type, sum(quantity)from orders,animals where orders.product_id=animals.id group by breed order by sum(quantity) desc limit 4  ");
    if($result){
      return $result;
    }else{
      return 'table not found';
    }
  }
  
  public function showAdmin ($table, $data) {
    $result = mysqli_query($this->db, "SELECT * FROM $table  WHERE " . key($data) . " = " . $data[key($data)]);
    if ($result) {
      return $result;
    } else {
      return 'table not found';
    }
  }

  // public function insertStatus($table, $data){
  //   $result = mysqli_query($this-> db, "UPDATE $table SET lastactivity = ".time()." WHERE". key($data) . " = " . $data[key($data)]);
  //   if ($result) {
  //     return $result;
  //   } else {
  //     return 'table not found';
  //   }
  // }


  
  public function postData ($table, $data) {
    $fields = implode(", ", array_keys($data));
    $values  = "'".implode("', '", array_values($data))."'";
    $result = mysqli_query($this->db, "INSERT INTO `".$table."` ($fields) VALUES ($values)");
    // mysqli_close($this->db);
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

  
  // public function showCustomer ($table) {
  //   $result = mysqli_query($this->db, "SELECT * FROM $table  WHERE 'account' ='supplier'");
  //   if ($result) {
  //     return $result;
  //   } else {
  //     return 'table not found';
  //   }
  // }
  
  public function updateData ($table, $data) {
    $values = '';
    foreach($data as $key => $value) {
      $values .= $key.' = "'.$value.'", ';
    }
    $result = mysqli_query($this->db, "UPDATE `".$table."` SET ".rtrim($values, ", ")." WHERE id = ".$data['id']);
    // mysqli_close($this->db);
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
  
  public function getOnlineUsers ($status) {
    $result = mysqli_query($this->db, "SELECT * FROM users WHERE status = '$status'");
    if ($result) {
      return $result;
    } else {
      return 'table not found';
    }
  }

  public function deleteData ($table, $id) {
    $result = mysqli_query($this->db, "DELETE FROM $table WHERE id = $id");
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