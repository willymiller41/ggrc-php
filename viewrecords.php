<?php
    $title = " - View Records";
    require_once "includes/header.php";
    require_once "db/conn.php";
    $results = $crud->getAttendees();
?>

<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Email address</th>
        <th>Contact Number</th>
        <th>Specialty</th>
        <th>Actions</th>
    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $r['atendee_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['dateofbirth'] ?></td>
            <td><?php echo $r['emailadress'] ?></td>
            <td><?php echo $r['contactnumber'] ?></td>
            <td><?php echo $r['name'] ?></td>
            <td>
                <a href="view.php?id=<?php echo $r['atendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['atendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('¿Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['atendee_id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php require_once("includes/footer.php") ?>