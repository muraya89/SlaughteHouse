<?php 
require('../../helpers/DbHelpers.php');

class Products {
    protected $db_instance;
    
    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function index () {

    }

    public function storeProducts ($data) {
      if (isset($data['supply_submit'])) {
        //new arrays
        $newDataArray = [];
        unset($data['supply_submit']);
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

        $newDataArray['status'] = 1;
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

    public function showProduct () {

    }

    public function EditProducts () {

    }

    public function deleteProduct () {

    }
}

$products = new Products($db_helpers);
$products->storeProducts($_POST);

?>