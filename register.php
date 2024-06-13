<?php
$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db($db, 'loginDB') or die(mysqli_error($db));

$userName = $_POST['userName'];
$userId = $_POST['userId'];
$userPassword = $_POST['userPassword'];
$query = "INSERT INTO users (userName, userId, userPassword) VALUES ('$userName', '$userId', '$userPassword')";

if(mysqli_query($db, $query)){
    ?>
        <script>
            alert('Registerd');
            location.replace("./login.html");
        </script>
    <?php
}else{
    ?>
        <script>
            alert('Register error');
        </script>
    <?php
}

?>
