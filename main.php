<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
	<link rel="stylesheet" href="header.css" />
    <style>
        table {
            border-top: 1px solid #444444;
            border-collapse: collapse;
			text-align: center;
			margin: auto;
			margin-top: 30px;
        }

        tr {
            border-bottom: 1px solid #444444;
            padding: 10px;
        }

        td {
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }

        .text {
            text-align: center;
            padding-top: 20px;
            color: #000000
        }

    </style>
</head>

<header>
<?php
	session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'mainDB');
    $query = "select * from board order by number desc";
    $result = mysqli_query($connect, $query);
    $total = mysqli_num_rows($result);
    ?>
	<a href="./profile.php"><b id="header"><?php echo $_SESSION['userName']; ?></b></a>
</header>

<body>
    <table>
        <thead>
            <tr>
                <td width="50">No.</td>
                <td width="500">Content</td>
                <td width="100">Name</td>
                <td width="50">Liked</td>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                    <td width="50"><?php echo $total ?></td>
                    <td width="500">
                        <a href="read.php?number=<?php echo $rows['number'] ?>">
                            <?php echo $rows['content'] ?>
                    </td>
                    <td width="100"><?php echo $rows['id'] ?></td>
                    <td width="50"><?php echo $rows['heart'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
	<div class=text>
        <a href="write.php"><b>Write a feed</b></a>
	</div>
</body>

</html>