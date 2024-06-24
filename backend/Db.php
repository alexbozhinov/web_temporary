<?php
    class Db
    {
        private $connection;
        public function __construct()
        {
            $dbhost = "localhost";
            $dbName = "project";
            $userName = "root";
            $userPassword = "";
            $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbName", $userName, $userPassword,
        [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        ]);
        }
        public function getConnection()
        {
            return $this->connection;
        }

        public function insertUser($firstName, $lastName, $email, $passwd1, $type) {
            //echo $type;
            $conn = $this->getConnection();
            $hash_password = password_hash($passwd1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (first_name, last_name, email, password, type) VALUES (?, ?, ?, ?, ?)"; 
            $query = $conn->prepare($sql)->execute([$firstName, $lastName, $email, $hash_password, $type]); 
            if ($query === TRUE) {
                header("Location: ../frontend/html/Login_form.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        public function insertRoom($reservedDate, $start, $end, $lectorEmail, $roomNum) {
            $conn = $this->getConnection();
            $sql = "INSERT INTO rooms (reserved_date, start, end, lector_email, room_num) VALUES (?, ?, ?, ?, ?)"; 
            $query = $conn->prepare($sql)->execute([$reservedDate, $start, $end, $lectorEmail, $roomNum]); 
            if ($query === TRUE) {}
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        public function deleteRoom($reservedDate, $start, $end, $lectorEmail, $roomNum) {
            $conn = $this->getConnection();
            $sql = "DELETE FROM rooms WHERE reserved_date = ? AND start = ? AND end = ? AND lector_email = ? AND room_num = ?"; 
            $query = $conn->prepare($sql)->execute([$reservedDate, $start, $end, $lectorEmail, $roomNum]); 
            if ($query === TRUE) {}
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        public function checkUser($email, $passwd) {
            $conn = $this->getConnection();
            $sql = "SELECT password FROM users WHERE email = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$email]); 
            $password_hash = $query->fetch(PDO::FETCH_ASSOC)['password'];
            $are_password_match = password_verify($passwd, $password_hash);
            return $are_password_match;
        }
        public function checkIfEmailExist($email) {
            $conn = $this->getConnection();
            $sql = "SELECT email FROM users WHERE email = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$email]); 
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function checkUserType($email) {
            $conn = $this->getConnection();
            $sql = "SELECT type FROM users WHERE email = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$email]); 
            $type = $query->fetch(PDO::FETCH_ASSOC)['type'];
            return $type;
        }


        public function checkRoomIsReservedIn($date, $start, $end, $num) { 
            $conn = $this->getConnection();
            $sql = "SELECT * FROM rooms WHERE reserved_date = ? AND start <= ? AND end >= ? AND room_num = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$date, $start, $end, $num]); 
            $result= $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function checkRoomIsReservedOut($date, $start, $end, $num) { 
            $conn = $this->getConnection();
            $sql = "SELECT * FROM rooms WHERE reserved_date = ? AND start >= ? AND end <= ? AND room_num = ?"; 
            echo $sql;
            $query = $conn->prepare($sql);
            $query->execute([$date, $start, $end, $num]); 
            $result= $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function checkRoomIsReservedEqual($date, $start, $end, $num) { 
            $conn = $this->getConnection();
            $sql = "SELECT * FROM rooms WHERE reserved_date = ? AND start = ? AND end = ? AND room_num = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$date, $start, $end, $num]); 
            $result= $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function checkRoomIsReservedInStart($date, $start, $num) {
            $conn = $this->getConnection();
            $sql = "SELECT * FROM rooms WHERE reserved_date = ? AND start <= ? AND end > ? AND room_num = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$date, $start, $start, $num]); 
            $result= $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        public function checkRoomIsReservedInEnd($date, $end, $num) {
            $conn = $this->getConnection();
            $sql = "SELECT * FROM rooms WHERE reserved_date = ? AND start < ? AND end >= ? AND room_num = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$date, $end, $end, $num]); 
            $result= $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getEmail($date, $start, $end, $num) {
            $conn = $this->getConnection();
            $sql = "SELECT lector_email FROM rooms WHERE reserved_date = ? AND start = ? AND end = ? AND room_num = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$date, $start, $end, $num]); 
            $result= $query->fetch(PDO::FETCH_ASSOC)['lector_email'];
            return $result;
       }
        public function getName($email) {
             $conn = $this->getConnection();
             $sql = "SELECT first_name FROM users WHERE email = ?"; 
             $query = $conn->prepare($sql);
             $query->execute([$email]); 
             $name = $query->fetch(PDO::FETCH_ASSOC)['first_name'];
             return $name;
        }
        public function getFamily($email) {
            $conn = $this->getConnection();
            $sql = "SELECT last_name FROM users WHERE email = ?"; 
            $query = $conn->prepare($sql);
            $query->execute([$email]); 
            $name = $query->fetch(PDO::FETCH_ASSOC)['last_name'];
            return $name;
        }
        public function returnReservations($num) {
            $conn = $this->getConnection();
            $sql = "SELECT * FROM rooms WHERE room_num = ? ORDER BY reserved_date ASC, start DESC"; 
            $query = $conn->prepare($sql);
            $query->execute([$num]); 
            echo "<fieldset style='        width: 800px;
        min-width: 480px;
        max-width: 800px;
        max-height: 150px;
        min-height: 150px;
        padding: 2rem;
        background: linear-gradient(to right bottom, var( --buttonSectionFrom), var(--buttonSectionTo));
        box-shadow: 0 0 2rem var(--loginShadow);
        border: 10px;
        border-color: rgba(0, 0, 0, 0.3);
        font-size: 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 2rem;' id='schedule-fieldset'>";
            echo "<textarea id='textarea' style='min-height: 120px; max-height: 120px; width: 850px; box-sizing: border-box;
                 border: 2px solid #ccc; border-radius: 2rem; background-color: #f8f8f8; font-size: 16px; resize: none;' disabled>";

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $FirstName = $this->getName($row["lector_email"]);
                $LastName = $this->getFamily($row["lector_email"]);
                if ($row["start"] == 8 || $row["start"] == 9) {
                    echo "    Зала: " . $row["room_num"] . "    дата: " .  $row["reserved_date"] . "    От: 0" . $row["start"] . "    До: " . $row["end"] . "    Преподавател: " . $FirstName . " " . $LastName . "\n";
                }
                else {
                    echo "    Зала: " . $row["room_num"] . "    дата: " .  $row["reserved_date"] . "    От: " . $row["start"] . "    До: " . $row["end"] . "    Преподавател: " . $FirstName . " " . $LastName . "\n";
                }
            }
            echo "</textarea>";
            echo '<form action="" method="post">';
            echo '<input type="hidden" id="room-number" name="room-number">';
            echo "<br>";
            echo '<input type="submit" name="submit" value="ПОКАЖИ" style="        min-height: 30px;
        max-height: 30px;
        min-width: 100px;
        max-width: 100px;
        border-radius: 2rem;
        border: 2px;
        background: linear-gradient(to right top, #caf358, #85a52f);
        font-size: large;
        display: inline-block;
    }">';
            echo "</form>";
            echo "</fieldset>";
        }
    }
?>
<!--"..." . password_hash($passwd_1) . ")"-->