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
            if (!isset($postData['accounttype'])) {
                header("Location: ../../auth/login.php?error=accountError");
                exit();
            } else {
                // check if the email match
                $res = $this->db_instance->CheckIfMatch(/** table name */'users', ['email' => $postData['email']]);
                    if (mysqli_num_rows($res->response) < 1) {
                        // no email found
                        echo "email not found $res";
                    } else {
                        
                        // check if the password matches
                        $associativeArray = mysqli_fetch_assoc($res->response);
                        $result = password_verify($postData['password'], $associativeArray['password']);
                        
                        if ($postData['accounttype'] !== $associativeArray['account']) {
                            // account type validation
                            header("Location: ../../auth/login.php?error=accountError2");
                            exit();
                        } else {
                            if (!$result) {
                                header("Location: ../../auth/login.php?error=403");
                            } else {
                                /** start session */
                                $_SESSION['id'] = $associativeArray['id'];
                                $_SESSION['name'] = $associativeArray['cname'];
                                $_SESSION['account'] = $associativeArray['account'];
                                $t = time();
                                $value = $this->db_instance->updateData('users', ['id' => $_SESSION['id'],'last_activity'=> $t, 'status' => 'online']);
                                
                                if ($value->response) {
                                    // redirect here
                                    $associativeArray['account'] == 'supplier' 
                                    ? header('Location: ../../supplier/index.php') 
                                    : header('Location: ../../customer/index.php');                                    
                                }else{
                                    $value = $this->db_instance->updateData('users', ['id' => $_SESSION['id'],'status'=> 'offline']);
                                }
                            }
                        }
                    }
                }
                
            } else {
                header('Location:', '../../index.php');
            }
        }
        
    }
    session_start();
    $login = new Login($db_helpers);
    $login->login($_POST);
    
    ?>
