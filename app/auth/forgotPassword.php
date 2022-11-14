<?php
require('../../helpers/DbHelpers.php');

class forgotPassword {
    
    protected $db_instance;
    
    public function __construct ($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function resetPasswordRequest($postData){
        if (isset($postData['signup_submit'])) {
            // check if email exists
            $res = $this->db_instance->CheckIfMatch('users', ['email' => $postData['email']]);
            if (mysqli_num_rows($res->response) < 1) {
                header("Location: ../../auth/forgotPassword.php?error=doesNotExist&email=".$postData['email']);
            }else{
                // fetch the data first from the response $res
                $associativeArray = mysqli_fetch_assoc($res->response);
                if (!$associativeArray) {
                    header("Location: ../../auth/forgotpassword.php?error=404&email=".$postData['email']);
                }else{
                    // if it does, redirect to updating password page
                    // var_dump($associativeArray); exit();
                    $_SESSION['id'] = $associativeArray['id'];               
                    header('Location: ../../auth/updatepassword.php?id='.$associativeArray['id']);
                }
            }
            // var_dump($res);
        }
    }
}
$forgotPassword = new forgotPassword($db_helpers);
$forgotPassword->resetPasswordRequest($_POST);
    
    ?>
