<?php
    require_once "db/conn.php";
    
    //Get values from post operation
    if(isset($_POST['submit'])){
        //extract values from $_POST array
        $id = $_POST["id"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dateOfBirth = $_POST["date-of-birth"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contact-number"];
        $speciality = $_POST["speciality"];

        //Call crud function
        $result = $crud->editAtendee($id, $firstname, $lastname, $dateOfBirth, $email, $contactNumber, $speciality);

        //Redirect to view records
        if($result){
            header("Location: viewrecords.php");
        }else{
            include "includes/errormessage.php";
        }
    }
?>