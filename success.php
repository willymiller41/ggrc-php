<?php
    $title = " - Successs";
    require_once "includes/header.php";
    require_once "db/conn.php";

    if(isset($_POST['submit'])){
        //extract values from $_POST array
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dateOfBirth = $_POST["date-of-birth"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contact-number"];
        $speciality = $_POST["speciality"];
        //call function to insert and track if it success or not
        $isSuccess = $crud->insertAttendees($firstname, $lastname, $dateOfBirth, $email, $contactNumber, $speciality);

        if($isSuccess){
            include "includes/successmessage.php";
            $results = $crud->getAttendees();
        }else{
            include "includes/errormessage.php";
        }
    }
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST["firstname"] . " " . $_POST["lastname"] ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $_POST["name"] ?></h6>
        <p class="card-text">Date of birth: <?php echo $_POST["date-of-birth"] ?></p>
        <p class="card-text">Tel: <?php echo $_POST["contact-number"] ?></p>
        <p class="card-text">Email: <?php echo $_POST["email"] ?></p>
    </div>
</div>



<?php require_once("includes/footer.php") ?>