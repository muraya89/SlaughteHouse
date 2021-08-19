<?php
require_once('../helpers/DbHelpers.php');
session_start();

class Category {
    protected $db_instance;

    public function __construct($db_helpers) {
        $this->db_instance = $db_helpers;
    }

    public function category ($postData) {
        if (isset($postData['signup_submit'])) {
            if (empty($postData['name'])) {
                header("Location: ../../admin/addCategories.php?error=emptyfields&name=".$postData['name']."&type=".$postData['type']);
                exit();
            }elseif (empty($postData['type'])) {
                header("Location: ../../admin/addCategories.php?error=emptyfield&name=".$postData['name']."&type=".$postData['type']);
                exit();
            }else{
                $saveCategory = $this->db_instance->postData(/** table name */'categories', [
                    'name' => $postData['name'],
                    'type' => $postData['type'],
                ]);
                if (!$saveCategory->response) {
                    header("Location: ../../admin/addCategories.php");
                    exit();
                } else {
                    header("Location: categories_report.php");
                    exit();
                }
            } 
        }else{
            header("Location: ../../admin/addCategories.php");
        }
    }
}

$category = new Category($db_helpers);
$category->category($_POST);

?>