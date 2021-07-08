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
            // check if the email match
            $res = $this->db_instance->CheckIfMatch(/** table name */'users', ['email' => $postData['email']]);
            if (mysqli_num_rows($res->response) < 1) {
                // no email found
                echo "email not found $res";
            } else {
                // check if the password matches
                $associativeArray = mysqli_fetch_assoc($res->response);
                $result = password_verify($postData['password'], $associativeArray['password']);
                if (!$result) {
                    echo "Wrong password please try again";
                } else {
                    /** start session */
                    session_start();
                    $_SESSION['id'] = $associativeArray['id'];
                    $_SESSION['name'] = $associativeArray['cname'];
                    // redirect here
                    header('Location: ../../supplier/supply.php');
                }
            }
            
        } else {
            header('Location:', '../../index.php');
        }
    }

}

$login = new Login($db_helpers);
$login->login($_POST);

?>