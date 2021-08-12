<?php
include('../../helpers/DbHelpers.php');

class Orders {

    protected $db_instance;
    
    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function MakeOrders ($data) {
        if (isset($data['order_submit'])) {
            unset($data['collapse']);
            unset($data['order_submit']);
            
            $newDataArray = [];
            $keys = array_keys($data);
        
            // check for empty values
            for ($i=0; $i < count($keys); $i++) { 
                $newDataArray[$keys[$i]] = $data[$keys[$i]];
            }

            unset($newDataArray['number']);
            // save the order
            $make_order = $this->db_instance->postData('orders', $newDataArray);
            //updating the animals table
            $update_animals = $this->db_instance->updateData(
                'animals', 
                [
                    'status' => 2, 
                    'number' => (int)$data['number'] - (int)$newDataArray['quantity'],
                    'id' => $newDataArray['product_id']
                ]
            );

            if (!$update_animals->response && !$make_order->response) {
                header('Location: ../../customer?error=notsaved');
                exit();
            } else {
                header('Location: ../../customer/orders.php');
                exit();
            }
        }
    }

}

$orders = new Orders($db_helpers);
$orders->MakeOrders($_POST);

?>