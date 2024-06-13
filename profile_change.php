<?php
$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db($db, 'loginDB') or die(mysqli_error($db));

session_start();
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];
$userId = $_SESSION['userId'];
$query = "UPDATE users SET userName = '$userName', userPassword = '$userPassword' where userId = $userId";

if(mysqli_query($db, $query)){
    ?>
        <script>
            alert('Profile changed');
            location.replace("./login.html");
        </script>
    <?php
}else{
    ?>
        <script>
            alert('Change error');
        </script>
    <?php
}

?>
