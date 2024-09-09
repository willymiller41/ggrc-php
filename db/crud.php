<?php
    class crud{
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn)
        {
            $this->db = $conn;

        }
        //function to insert a new record into the ggrc databse
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $speciality){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO atendee (firstname, lastname, dateofbirth, emailadress, contactnumber, specialty_id ) VALUES (:fname, :lname, :dob, :email, :contact, :speciality)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':speciality', $speciality);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            $sql = "SELECT * FROM atendee a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getAttendeesDetail($id){
            $sql = "SELECT * from atendee a inner join specialties s on a.specialty_id = s.specialty_id where atendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function editAtendee($id, $firstname, $lastname, $dateOfBirth, $email, $contactNumber, $speciality){
            try {
                //define sql statement to be executed
                $sql = "UPDATE `atendee` SET `firstname`=:firstname,`lastname`=:lastname,
                `dateofbirth`=:dateofbirth,`emailadress`=:emailadress,`contactnumber`=:contactnumber,
                `specialty_id`=:specialty WHERE atendee_id = :id";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':firstname', $firstname);
                $stmt->bindparam(':lastname', $lastname);
                $stmt->bindparam(':dateofbirth', $dateOfBirth);
                $stmt->bindparam(':emailadress', $email);
                $stmt->bindparam(':contactnumber', $contactNumber);
                $stmt->bindparam(':specialty', $speciality);
                //execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAtendee($id){
            try {
                //define sql statement to be executed
                $sql = "DELETE from `atendee` WHERE atendee_id = :id";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':id', $id);
                //execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialties(){
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        }
    }
?>