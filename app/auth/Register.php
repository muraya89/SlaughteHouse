<?php
require_once('../../helpers/DbHelpers.php');
session_start();

class Register {
    protected $db_instance;

    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function register ($postData) {
        if (isset($postData['signup_submit'])) {
            if (empty($postData['cname'])) {
                // $name_err = 'Please insert your username';
                header("Location:" .$postData['redirect_to']."?error=emptyfields&cname=".$postData['cname']."&email=".$postData['email'].
                "&address=".$postData['address']."&phoneno=".$postData['phoneno']."&value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            }
            elseif(!preg_match('/^\pL+$/u', $postData['cname'])){
                header("Location:" .$postData['redirect_to']."?error=wrongFormat&cname=".$postData['cname']."&email=".$postData['email'].
                "&address=".$postData['address']."&phoneno=".$postData['phoneno']."&value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            }elseif (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                header("Location: ../../auth/signup.php?error=invalidemail&cname=".$postData['cname'].
                "&address=".$postData['address']."&phoneno=".$postData['phoneno']."&value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            }
            elseif (empty($postData['password'])) {
                header("Location: ../../auth/signup.php?error=invalidpassword&cname=".$postData['cname']."&email=".$postData['email']."&address=".$postData['address']."&phoneno=".$postData['phoneno']."value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            }
            elseif ($this->db_instance->PasswordChecker($postData['password'])) {
                header("Location: ../../auth/signup.php?error=invalidPassword&cname=".$postData['cname']."&email=".$postData['email']."&address=".$postData['address']."&phoneno=".$postData['phoneno']."value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            }
            elseif ($postData['password'] !== $postData['cpassword']) {
                header("Location: ../../auth/signup.php?error=passwordCheck&cname=".$postData['cname']."&email=".$postData['email']."&address=".$postData['address']."&phoneno=".$postData['phoneno']."value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            } elseif (!isset($postData['accounttype'])) {
                header("Location: ../../auth/signup.php?error=accountError&cname=".$postData['cname']."&email=".$postData['email']."&address=".$postData['address']."&phoneno=".$postData['phoneno']."value=".base64_encode(json_encode(array_merge($postData, ['error'=>true]))));
                exit();
            }
            else{
                $saveUser = $this->db_instance->postData(/** table name */'users', [
                    'cname' => $postData['cname'],
                    'email' => $postData['email'],
                    'phoneno' => $postData['phoneno'],
                    'address' => $postData['address'],
                    'account' => $postData['accounttype'],
                    'password' => password_hash($postData['password'], null)
                ]);
                if (!$saveUser->response) {
                    header("Location: ".$postData['redirect_to']);
                    exit();
                } else {
                    header("Location: ".$postData['redirect_to']);
                    exit();
                }
            } 
        }else{
            header("Location: ".$postData['redirect_to']);
        }
    }
}

$register = new Register($db_helpers);
$register->register($_POST);

?>