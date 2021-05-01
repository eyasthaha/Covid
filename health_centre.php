<?php
include 'css/style.css';
include 'connection.php';
include 'header.php';

    $sql = "select * from healthcentre";
    $result = $conn->query($sql);

?>
<html>
<title>Health Centre</title>
    
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
            <td><?php echo $row['name']; ?></td>
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