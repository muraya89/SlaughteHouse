<?php
    include('../helpers/DbHelpers.php');


Class Feedback{
    protected $db_instance;

    public function __construct($db_helpers){

        $this->db_instance = $db_helpers;
        
    }

    public function storeFeedback($postData){
        if(isset($postData['feedback_submit'])){
            if (empty($postData['fname'])|| empty($postData['lname'])||empty($postData['email'])||empty($postData['input'])) {
                header('Location: ../index.php?error=emptyFields&firstName='.$postData['fname'].'&lastName='.$postData['lname'].'&email='.$postData['email'].'&comment='.base64_encode($postData['input']));
                exit();
            }else{
                $saveFeedback = $this->db_instance->postData('contact', [
                    'fname' => $postData['fname'] ,
                    'lname' => $postData['lname'],
                    'email' => $postData['email'],
                    'input' => $postData['input']
                ]);
                if (!$saveFeedback->response) {
                    header('Location: ../index.php?error=404');
                    exit();
                } else {
                    header("Location: ../?error=success");
                    exit();
                }
            }
        }
    }

}

    $feedback = new Feedback($db_helpers);
    $feedback->storeFeedback($_POST);
?>