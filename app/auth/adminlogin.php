<?php
require('../../helpers/DbHelpers.php');

class Login {
    
    protected $db_instance;
    
    public function __construct ($db_helpers) {
        $this->db_instance = $db_helpers;
    }
    
    public function login ($postData) {
        // login logic
        if (isset($postData['login_submit'])) {
            if (empty($postData['username'] || $postData['password'])) {
                header("Location: ../../admin/index.php?error=emptyfields&username=".$postData['username']."&password=".$postData['pasword']);
                exit();
            }
            // check if the email match
            $res = $this->db_instance->CheckIfMatch(/** table name */'admin', ['username' => $postData['username']]);
            if (mysqli_num_rows($res->response) < 1) {
                // no email found
                echo "email not found $res";
            } else {                        
                // check if the password matches
                $associativeArray = mysqli_fetch_assoc($res->response);
                $result = sha1($postData['password']) === $associativeArray['password'];
                var_dump($result);
                    if (!$result) {
                        header("Location: ../../admin/index.php?error=403");
                    } else {
                        /** start session */
                        $_SESSION['id'] = $associativeArray['id'];
                        header("Location: ../../admin/admin.php");
                    }
            }
            }else {
                header("Location: ../../admin/index.php");
            }
        }    
    }
    session_start();
    $login = new Login($db_helpers);
    $login->login($_POST);
    
    ?>