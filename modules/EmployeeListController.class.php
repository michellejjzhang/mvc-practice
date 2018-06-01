<?php
/**
 * Created by IntelliJ IDEA.
 * User: mzhang
 * Date: 5/25/2018
 * Time: 9:18 AM
 */
require_once('EmployeeDBGateway.php');

class EmployeeListController {
    private $EmployeeListDBGateway;

    public function __construct(){
        $this->EmployeeListDBGateway = new EmployeeDBGateway();
    }

    public function processRequest(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $id = $_POST['id'];
            $message = $_POST['message'];

            switch($message){
                case "add":
                    $this->EmployeeListDBGateway->addUsers($name, $age);
                    break;
                case "update":
                    $this->EmployeeListDBGateway->updateUsers($name, $age, $id);
                    break;
                case "delete":
                    $this->EmployeeListDBGateway->deleteUser($id);
                    break;
                default:
                    break;
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "GET"){
            echo json_encode($this->EmployeeListDBGateway->getAllUsers());
        } else {
            exit;
        }
    }
}