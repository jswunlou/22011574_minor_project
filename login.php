<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $userPassword = $_POST['userPassword'];

    $sql = "SELECT * FROM users WHERE userId='$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['userPassword'] == $userPassword){
            $_SESSION['userId'] = $userId;
            $_SESSION['userName'] = $row['userName'];
            echo "Logined";
            ?> 
                <script>location.replace("./main.php");</script>
            <?php
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found!";
    }
}
$conn->close();
?>
