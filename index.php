<?php
    $title = " - Index";
    require_once "includes/header.php";
    require_once "db/conn.php";
    $results = $crud->getSpecialties();
?>
    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name: </label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name: </label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="date-of-birth" class="form-label">Date of birth: </label>
            <input type="text" class="form-control" id="date-of-birth" name="date-of-birth">
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of expertise: </label>
            <select class="form-select" id="speciality" name="speciality">
                <option selected>Expertise: </option>
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address: </label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="contact-number" class="form-label">Contact number: </label>
            <input type="tel" class="form-control" id="contact-number" aria-describedby="contactHelp" name="contact-number">
            <div id="contactHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
    </form>
<?php require_once("includes/footer.php") ?>