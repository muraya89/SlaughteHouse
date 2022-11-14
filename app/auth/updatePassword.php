<?php
require('../../helpers/DbHelpers.php');

class updatePassword{
   protected $db_instance;
    
    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }
    public function newPassword($postData){
        if (isset($postData['update_submit'])) {
            $result = $this->db_instance->updatedata('users', 
                [
                    'password' => password_hash($postData['newpassword'], null),
                    'id' => $postData['id'],
                ]);
                var_dump($result);
            if (!$result->response) {
                header("Location: ../../auth/updatePassword.php?error=notSaved");
                exit();
            }else{
                header("Location: ../../auth/login.php");
                exit();
            }
        }
    }
}
//
$updatePassword = new updatePassword($db_helpers);
$updatePassword->newPassword($_POST);