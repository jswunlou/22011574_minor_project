<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="header.css" />

    <style>
        .read_table {
            border: 0;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
        }

        .read_id {
            text-align: center;
            background-color: black;
            color: white;
            width: 200px;
            height: 33px;
            border-radius: 10px;
        }

        .read_id2 {
            background-color: white;
            width: 600px;
            height: 50px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
            height: 500px;
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 0px;
        }

        .read_btn1 {
            width: 100%;
            height: 48px;
            padding: 0 10px;
            box-sizing: border-box;
            margin-bottom: 0px;
            border-radius: 6px;
            background-color: #F8F8F8;
            color: #fff;
            font-size: 16px;
            background-color: #000000;
            margin-top: 0px;
        }
    </style>
</head>
<?php 
        function php_likeUp()
        {
            $connect = mysqli_connect('localhost', 'root', '', 'mainDB');
            $number = $_GET['number']; 
            $hit = "update board set heart=heart+1 where number=$number";
            $connect->query($hit);
        }
    ?>
<header>
<?php
	session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'mainDB') or die("connect failed");
    $query = "select * from board order by number desc";
    $result = mysqli_query($connect, $query);

    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환
    ?>
	<a href="./profile.php"><b id="header"><?php echo $_SESSION['userName']; ?></b></a>
</header>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'mainDB');
    $number = $_GET['number'];
    $URL = './read.php?number='.$number;
    session_start();
    $query = "select content, heart, id from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);
    ?>

    <table class="read_table">
        <tr>
            <td class="read_id">Name</td>
            <td class="read_id2"><?php echo $rows['id'] ?></td>
        </tr>

        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?></td>
        </tr>
    </table>
        

    <div class="read_btn">
        <button class="read_btn1" onclick="location.href='./main.php'">Back</button>&nbsp;&nbsp;
        <button class="read_btn1" onclick="likeUp()">Like <?php echo $rows['heart'] ?></button>&nbsp;&nbsp;
    </div>

    <script>
        function likeUp(){
            var result ="<?php php_likeUp(); ?>"
            document.write(result);
            location.replace("<?php echo $URL ?>");
        }
    </script>

</body>

</html>


