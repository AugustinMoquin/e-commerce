<?php
    include ("../db_connection.php");

    $IdUser = $_POST('IdValue');
    echo $IdValue;
    $conn = openCon();

    $sql = "DELETE FROM users WHERE Id = $id;";
    $result = $conn->query($sql);
    
    if ($conn->query($sql) === true) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    

?>