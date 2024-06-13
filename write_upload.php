<?php
    $connect = mysqli_connect("localhost", "root", "", "mainDB");

    $content = $_POST['content'];
    $URL = './main.php';

    session_start();
    $id = $_SESSION['userName'];

    $query = "INSERT INTO board (number, content, id, heart) 
            values(null, '$content', '$id', 0)";

    $result = $connect->query($query);
    if ($result) {
    ?> <script>
            alert("<?php echo "Uploaded." ?>");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php
    } else {
        echo "Upload failed.";
    }

    mysqli_close($connect);
?>