<?php
include 'connection.php';
include 'header.php';
include 'css/style.css';

session_start();
$uid = $_SESSION['uid'];


?>
<html>
<title>Prescription</title>
    <body>
        <table id="list" style="margin-top:50px;">
        <tr>
            <th>E-mail</th>
            <th>Prescription</th>
            <th>Problems</th>
            <th>Other</th>
            <th>Date</th>
        </tr>
        <tr>
            <?php
            $sql= "select * from consultation where uid='$uid'";
            $result = $conn->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
            ?>
            <td><?php echo $row['docid'];  ?></td>
            <td><?php echo $row['prescription'];  ?></td>
            <td><?php echo $row['problems'];  ?></td>
            <td><?php echo $row['other']; ?></td>
            <td><?php echo $row['date']; ?></td>

        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
        
    </body>

</html>