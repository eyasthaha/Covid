<?php
            ob_start();

include 'css/style.css';
include 'connection.php';
include 'header.php';
ob_start();
session_start();
$docid = $_SESSION['uid'];
    $sql = "select * from consultation where docid='$docid' order by status DESC";
    $result = $conn->query($sql);

?>
<html>
<title>Patients list</title>
    
    <body>

    <div>
        
        <table id="list">
    <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Date</th>
        <th>Status</th>
        <th>Address</th>
        </tr>
        <tr>
        <?php
            if($result){
            if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
   ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['uid']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['status']; ?></td>
                <form method="post"> <td align="center">
			<input id="form-button" name='prescribe' type='submit' value='Prescribe'>
			<input type='hidden' name='prescribe' value="<?php echo $row['id'];

            if(isset($_POST['prescribe'])){
                $sl=$_POST['prescribe'];
                $email=$row['uid'];
            session_start();
            $_SESSION['pid']= $email;
            $_SESSION['sl']= $sl;
            header("Location: prescribe.php");
            
            }                                             
                                                         
                                                         
            ?>">
                    
		</form>
            </tr>
    <?php            
        }
    }
            }
            

            
        ?>
    </table>    
        
        </div>
    
        
        
        
        
    </body>


</html>