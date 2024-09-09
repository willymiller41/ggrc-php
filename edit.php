<?php
    $title = " - Edit Record";
    require_once "includes/header.php";
    require_once "db/conn.php";
    $results = $crud->getSpecialties();
    if(!isset($_GET['id'])){
        header("Location: viewrecords.php");
    }else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeesDetail($id);
    
?>
    <h1 class="text-center">Edit Attendee</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee["atendee_id"] ?>">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name: </label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $attendee["firstname"] ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name: </label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee["lastname"] ?>">
        </div>
        <div class="mb-3">
            <label for="date-of-birth" class="form-label">Date of birth: </label>
            <input type="text" class="form-control" id="date-of-birth" name="date-of-birth" value="<?php echo $attendee["dateofbirth"] ?>">
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of expertise: </label>
            <select class="form-select" id="speciality" name="speciality">
                <option value="<?php echo $attendee["specialty_id"] ?>" selected><?php echo $attendee["name"] ?></option>
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address: </label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $attendee["emailadress"] ?>">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="contact-number" class="form-label">Contact number: </label>
            <input type="tel" class="form-control" id="contact-number" aria-describedby="contactHelp" name="contact-number" value="<?php echo $attendee["contactnumber"] ?>">
            <div id="contactHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <a href="viewrecords.php" class="btn btn-default">Back to List</a>
        <button class="btn btn-success" type="submit" name="submit">Save changes</button>
    </form>
<?php } ?>

<?php require_once("includes/footer.php") ?>