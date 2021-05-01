<?php
include 'css/style.css';
include 'connection.php';
include 'header.php';

    $sql = "select * from firstline";
    $result = $conn->query($sql);

?>
<html>
<title>Firstline Treatment Centre</title>
    
    <body>

    <div>
        
        <table id="list">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Place</th>
        </tr>
        <tr>
        <?php
            if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
   ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['centre']; ?></td>
            <td><?php echo $row['place']; ?></td>
            </tr>
    <?php            
        }
    }
        ?>
    </table>    
        
        </div>
    
        
        
        
        
    </body>


</html>