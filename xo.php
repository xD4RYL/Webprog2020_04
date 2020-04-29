<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lepesek";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "You are bad at this.";
    }

    $x = 'v' . $_POST["x"];
    $y = $_POST["y"];
    $xo = $_POST["xo"];
	
    $sql = "UPDATE xo SET $x='$xo' WHERE id=$y";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $arr1 = array();
    $arr2 = array();
    $arr3 = array();
    $arr4 = array();
    $arr5 = array();
    $arr6 = array();
    $arr7 = array();
    $arr8 = array();
    $arr9 = array();
    $arr10 = array();

    $results = mysqli_query($conn, "SELECT * FROM xo");
    while($row = mysqli_fetch_assoc($results)) {
        array_push($arr1, $row['v1']);
        array_push($arr2, $row['v2']);
        array_push($arr3, $row['v3']);
        array_push($arr4, $row['v4']);
        array_push($arr5, $row['v5']);
        array_push($arr6, $row['v6']);
        array_push($arr7, $row['v7']);
        array_push($arr8, $row['v8']);
        array_push($arr9, $row['v9']);
        array_push($arr10, $row['v10']);
    }
    for ($i = 1; $i <= 10; $i++) {
        $c = 0;
        $prev = " ";
        for ($j = 0; $j < 10; $j++) {
            if($prev === ${"arr" . $i}[$j]){
                if($prev !== " "){
                    $c++;
                    echo $c;
                }
            }
            else $c = 0;
            $prev = ${"arr" . $i}[$j];
            if($c === 4){  
                $sql = "TRUNCATE TABLE xo";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                for ($k = 1; $k <= 10; $k++) {
                    $sql = "INSERT INTO xo (v1,v2,v3,v4,v5,v6,v7,v8,v9,v10)
                    VALUES (' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
                header("Location: http://localhost/beadando/beadando.php"); 
                exit();
            }
        }
    }

    $results = mysqli_query($conn, "SELECT * FROM xo");
    while($row = mysqli_fetch_row($results)) {
        $c = 0;
        $prev = " ";
        for ($i = 1; $i <= 10; $i++) {
            if($row[$i] === $prev){
                if($prev !== " ")
                    $c++;
            }
            else $c = 0;
            $prev = $row[$i];
            if($c === 4){ 
                header("Location: http://localhost/beadando/beadando.php");        
                $sql = "TRUNCATE TABLE xo";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                for ($k = 1; $k <= 10; $k++) {
                    $sql = "INSERT INTO xo (v1,v2,v3,v4,v5,v6,v7,v8,v9,v10)
                    VALUES (' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
                exit();
            }
        }
    }
    header("Location: http://localhost/beadando/beadando.php");
    exit();
?>
