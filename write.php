<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="header.css" />
    <style>

        table{
            margin-left: auto;
            margin-right: auto;
        }
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        input[type="submit"]{
            background-color: black;
            color: white;
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
    
    <form method="post" action="write_upload.php">
        <table style="padding-top:50px" width=auto cellpadding=2>
            <tr>
                <td>
                    <table class="table2">
                        <tr>
                            <td>Writer</td>
                            <td><?php
                                session_start();
                                echo $_SESSION['userName'];
                            ?></td>
                        </tr>
                        <tr>
                            <td>Feed</td>
                            <td><textarea name="content" cols=75 rows=15></textarea></td>
                        </tr>
                    </table>

                    <center>
                        <input style="height:26px; width:50px; font-size:16px;" type="submit" value="Upload">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>