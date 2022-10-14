<?php 
include('../../helpers/DbHelpers.php');

class Products {
    protected $db_instance;
    
    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function storeProducts ($data) {
        if (isset($data['supply_submit'])) {
          //new arrays
          $newDataArray = [];
          unset($data['supply_submit']);
          unset($data['submitType']);
          unset($data['id']);
          $keys = array_keys($data);
          
          // check for empty values
          for ($i=0; $i < count($keys); $i++) { 
              if (empty($data[$keys[$i]])) {
                  $this->db_instance->errorFunction('emptyfields');
                  break;
              } else {
                  $newDataArray[$keys[$i]] = $data[$keys[$i]];
              }
          }
  
          $newDataArray['status'] = 'new';
          $saveAnimal = $this->db_instance->postData('animals', $newDataArray);
          if (!$saveAnimal->response) {
              $this->db_instance->errorFunction('notsaved');
              exit();
          } else {
              header("Location: ../../supplier/");
              exit();
          }
        }
      }

    public function EditProducts ($data) {
        if (isset($data['supply_submit'])) {
            //new arrays
            $newDataArray = [];
            unset($data['supply_submit']);
            unset($data['submitType']);
            $keys = array_keys($data);
            
            // check for empty values
            for ($i=0; $i < count($keys); $i++) { 
                if (empty($data[$keys[$i]])) {
                    $this->db_instance->errorFunction('emptyfields');
                    break;
                } else {
                    $newDataArray[$keys[$i]] = $data[$keys[$i]];
                }
            }
            $saveAnimal = $this->db_instance->updateData('animals', $newDataArray);
            if (!$saveAnimal->response) {
                $this->db_instance->errorFunction('notsaved');
                exit();
            } else {
                header("Location: ../../supplier/");
                exit();
            }
        }
    }
}

$products = new Products($db_helpers);
if (isset($_POST['supply_submit'])) {
    $_POST['submitType'] ? $products->EditProducts($_POST) : $products->storeProducts($_POST);
}

?>