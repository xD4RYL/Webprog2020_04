<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            form {
             width: 100%;
             padding: 10px;
            }
            div{
                width:100%;
            }
            table{
                border: 1px solid black;
                width:320px;
                height:320px;
            }
            td{
                border: 1px solid black;
                width: 30px;
                height: 30px;
                text-align: center;
            }
            div{
                border: 2px solid black;
                margin: 1px;
                width: 400px;
                padding: 5px;
            }
            </style>
    </head>
    <body>
        <div>
            <form action="xo.php" method="POST" width=40px >
                <input type="number" min="1" max="10" name="x">
                <input type="number" min="1" max="10" name="y">
                <select name="xo" size="1">
                    <option value="x">X</option>
                    <option value="o">O</option>
                </select>
                <input type="submit" value="Küldés"><br><br>
            </form>

            <table>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "lepesek";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        echo "You are bad at this.";
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $results = mysqli_query($conn, "SELECT * FROM xo");
                    while($row = mysqli_fetch_array($results)) {
                    ?>
                        <tr>
                            <td><?php echo $row['v1']?></td>
                            <td><?php echo $row['v2']?></td>
                            <td><?php echo $row['v3']?></td>
                            <td><?php echo $row['v4']?></td>
                            <td><?php echo $row['v5']?></td>
                            <td><?php echo $row['v6']?></td>
                            <td><?php echo $row['v7']?></td>
                            <td><?php echo $row['v8']?></td>
                            <td><?php echo $row['v9']?></td>
                            <td><?php echo $row['v10']?></td>
                        </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </body>
</html>