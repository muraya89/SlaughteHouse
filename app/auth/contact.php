<?php
    include('../../helpers/DbHelpers.php');


    Class Feedback{
        protected $db_instance;

        public function __construct($db_helpers){

            $this->db_instance = $db_helpers;
            
        }

        public function storeFeedback($postData){
            if(isset($postData['feedback_submit'])){
                $saveFeedback = $this->db_instance->postData('contact', [
                    'fname' => $postData['fname'] ,
                    'lname' => $postData['lname'],
                    'email' => $postData['email'],
                    'input' => $postData['input']
                ]);
                if (!$saveFeedback->response) {
                    header('Location: ../../index.php?error=err');
                    exit();
                } else {
                    header("Location: ../../");
                    exit();
                }
            }
        }

    }

    $feedback = new Feedback($db_helpers);
    $feedback->storeFeedback($_POST);
?>