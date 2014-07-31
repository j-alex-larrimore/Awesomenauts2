<?php
    include "mysql.php";
    
    $table = "accounts";
    $query = "SELECT * from $table ORDER BY id DESC";
    $result = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array($result)) {
        echo "<h1>$row[username]</h1>";
        echo "<p>$row[password]</p>";
        //echo "<p>$row[exp]</p>";
    }
