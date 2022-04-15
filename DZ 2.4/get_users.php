<?php

    $db = new mysqli("127.0.0.1","root","");
    $s = $_REQUEST["s"];
    if($db) {
        $result = $db->select_db("rnwa_db") or die("Database connection error");
        if(!empty($s)){
            $s = strtolower($s);
            $result2 =$db->query("SELECT * FROM registration WHERE fname LIKE '%$s%' OR lname LIKE '%$s%'") or die("Problem prilikom izvršenja naredbe");            
    $n=$result2->num_rows;
        } else{
            $result2 =$db->query("SELECT * FROM registration") or die("Problem prilikom izvršenja naredbe");            
            $n=$result2->num_rows;
        }
        
        if ($n > 0){
            echo "<table>
            <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Datum rođenja</th>
            <th></th>
            </tr>";
            while($row = mysqli_fetch_array($result2)) {
                echo "<tr>";
                echo "<td>" . $row['rid'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td> <button type='button' onclick=\"location.href='#'\">Detalji</button> <button type='button' onclick=\"location.href='#'\">Uredi</button> <button type='button' onclick=\"location.href='#'\">Izbrisi</button> </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "Nema rezultata<br>";
        }
    }

mysqli_close($db);
