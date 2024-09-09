<?php
    require_once "db/conn.php";

    if(!isset($_GET['id'])){
        header("Location: viewrecords.php");
    }else{
        $id = $_GET['id'];
        //Call crud function
        $deleted = $crud->deleteAtendee($id);
                
        //Redirect to view records
        if($deleted){
            header("Location: viewrecords.php");
        }else{
            include "includes/errormessage.php";
        }
    }
?>