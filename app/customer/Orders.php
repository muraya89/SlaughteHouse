<?php
include('../../helpers/DbHelpers.php');

class Orders {

    protected $db_instance;
    
    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function MakeOrders ($data) {
        if (isset($data['order_submit'])) {
            if($data['total_price']){
                unset($data['collapse']);
                unset($data['order_submit']);
                
                $newDataArray = [];
                $keys = array_keys($data);
            
                // check for empty values
                for ($i=0; $i < count($keys); $i++) { 
                    $newDataArray[$keys[$i]] = $data[$keys[$i]];
                }
                if($newDataArray['delivery'] === 'yes' && !$newDataArray['address']){
                    header('Location: '.$newDataArray['redirect_to'].'&error=emptyaddress'.'&value='.base64_encode(json_encode(array_merge($newDataArray, ['error'=>true]))));
                    exit();
                }

                unset($newDataArray['available_quantity']);
                unset($newDataArray['redirect_to']);
                // save the order
                $make_order = $this->db_instance->postData('orders', $newDataArray);
                // if($make_order->response === false ) var_dump($newDataArray);die();
                //updating the animals table which reduces the number
                $number = (int)$data['available_quantity'] - (int)$newDataArray['quantity'];
                $update_animals = $this->db_instance->updateData(
                    'animals', 
                    [
                        'status' => $number == 0 ? 'sold' : 'available', 
                        'available_quantity' => $number,
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
            } else{
                header("Location: ".$data['redirect_to']);
                // header("Location: http://localhost:81/SlaughteHouse/customer/buy.php?edit=eyJpZCI6IjIiLCJzdXBwbGllciI6IiIsImJyZWVkIjoiaG9sc3RlaW4iLCJ3ZWlnaHQiOiIyMCIsInNleCI6ImZlbWFsZSIsImFnZSI6IjMiLCJudW1iZXIiOiIxNSIsInByaWNlIjoiNjE0MDUiLCJ0eXBlIjoicmVkbWVhdCIsInN0YXR1cyI6InBlbmRpbmciLCJzdXBwbHlfZGF0ZSI6IjIwMjItMTAtMTggMTY6NDc6MzQiLCJpc0VkaXQiOnRydWV9");
            }
        }
    }


    // public function EditOrder($data) {
    //     if (isset($data['supply_submit'])) {
    //         //new arrays
    //         $newDataArray = [];
    //         unset($data['supply_submit']);
    //         unset($data['submitType']);
    //         $keys = array_keys($data);
            
    //         // check for empty values
    //         for ($i=0; $i < count($keys); $i++) { 
    //             if (empty($data[$keys[$i]])) {
    //                 $this->db_instance->errorFunction('emptyfields');
    //                 break;
    //             } else {
    //                 $newDataArray[$keys[$i]] = $data[$keys[$i]];
    //             }
    //         }
    //         $saveAnimal = $this->db_instance->updateData('orders', $newDataArray);
    //         if (!$saveAnimal->response) {
    //             $this->db_instance->errorFunction('notsaved');
    //             exit();
    //         } else {
    //             header("Location: ../../customer/");
    //             exit();
    //         }
    //     }
    // }


}

$orders = new Orders($db_helpers);
$orders->MakeOrders($_POST);

// <?php
// include('../../helpers/DbHelpers.php');

// class Orders {

//     protected $db_instance;
    
//     public function __construct($db_helpers) {
//         $this->db_instance = $db_helpers;
//     }

//     public function MakeOrders ($data) {
//         if (isset($data['order_submit'])) {
//             unset($data['collapse']);
//             unset($data['order_submit']);
            
//             $newDataArray = [];
//             $keys = array_keys($data);
        
//             // check for empty values
//             for ($i=0; $i < count($keys); $i++) { 
//                 $newDataArray[$keys[$i]] = $data[$keys[$i]];
//             }

//             unset($newDataArray['number']);
//             // save the order
//             $make_order = $this->db_instance->postData('orders', $newDataArray);
//             //updating the animals table which reduces the number
//             $number = (int)$data['number'] - (int)$newDataArray['quantity'];
//             $update_animals = $this->db_instance->updateData(
//                 'animals', 
//                 [
//                     'status' => $number == 0 ? 'sold' : 'pending', 
//                     'number' => $number,
//                     'id' => $newDataArray['product_id']
//                 ]
//             );

//             if (!$update_animals->response && !$make_order->response) {
//                 header('Location: ../../customer?error=notsaved');
//                 exit();
//             } else {
//                 header('Location: ../../customer/orders.php');
//                 exit();
//             }
//         }
//      }
//     // public function EditOrder($data) {
//     //     if (isset($data['supply_submit'])) {
//     //         //new arrays
//     //         $newDataArray = [];
//     //         unset($data['supply_submit']);
//     //         unset($data['submitType']);
//     //         $keys = array_keys($data);
            
//     //         // check for empty values
//     //         for ($i=0; $i < count($keys); $i++) { 
//     //             if (empty($data[$keys[$i]])) {
//     //                 $this->db_instance->errorFunction('emptyfields');
//     //                 break;
//     //             } else {
//     //                 $newDataArray[$keys[$i]] = $data[$keys[$i]];
//     //             }
//     //         }
//     //         $saveAnimal = $this->db_instance->updateData('orders', $newDataArray);
//     //         if (!$saveAnimal->response) {
//     //             $this->db_instance->errorFunction('notsaved');
//     //             exit();
//     //         } else {
//     //             header("Location: ../../customer/");
//     //             exit();
//     //         }
//     //     }
//     // }


// }

// $orders = new Orders($db_helpers);
// $orders->MakeOrders($_POST);

// ?>