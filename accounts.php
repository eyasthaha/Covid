<?php
include 'css/style.css';
include 'connection.php';
include 'header.php';

    $sql = "select * from registration";
    $result = $conn->query($sql);

?>
<html>
<title>Account list</title>
    
    <body>

    <div>
        
        <table id="list">
    <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th>Phone</th>
        <th>Address</th>
        <th>DOB</th>
        <th>Blood Group</th>
        <th>Role</th>
        <th>Specialization</th>
        <th>Vaccinated</th>
        <th>Approval</th>
        <th>Reset Password</th>
        </tr>
        <tr>
        <?php
            if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
   ?>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['blood']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
            <td><?php echo $row['vaccinated']; ?></td>
            <td><?php echo $row['approval']; ?></td>
            <form method="post"> <td align="center">
			<input id="form-button" name='reset' type='submit' value='Reset'>
			<input type='hidden' name='reset' value=<?php echo $row['email'];?>>
		</form>
            </tr>
    <?php            
        }
    }
        if(isset($_POST['reset'])){
            $id = $_POST['reset'];
            $sql3 = "select dob from registration where email ='$id'";
            $result3 = $conn->query($sql3);
            $row2 = $result3->fetch_array();
            $dob = $row2['dob'];
            $sql2 = "update registration SET pwd='$dob' where email= '$id' ";
            $result2 = $conn->query($sql2);
            if($result2){
                echo 'Reset';
            }
        }
            
        ?>
    </table>    
        
        </div>
    
        
        
        
        
    </body>


</html>