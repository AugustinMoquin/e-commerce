<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_panel/assets/admin_panel_style.css">
    <title>Document</title>
</head>
<body>

    <header>

    </header>

    <title>admin panel</title>

    
    <div class="users">
             <?php
                include ("../db_connection.php");

                $conn = openCon();
                $sql = "SELECT username , email , Id , active , inserted_at , updated_at FROM users";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo  "<div class='ind_user'>  
                    <div class='info'> Id: " . $row["Id"]. "<br> </div>
                    <div class='info'> username: " . $row["username"]. " <br> </div>
                    <div class='info'> email: " . $row["email"]. "<br>  </div>
                    <div class='info'> active: " . $row["active"]. "<br> </div>
                    <div class='info'> inserted at: " . $row["inserted_at"]. "<br>  </div>
                    <div class='info'> last upadte: " . $row["updated_at"]. "<br> </div>
                    <form action='delete_user.php' method='post'>
                    <div value=". $row["Id"]." name='IdValue'></div>
                    <input type='button' value='supprimer'></form>
                    </div>" ;
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();
            ?>
    </div>
    

    <footer>

    </footer>

</body>
</html>


