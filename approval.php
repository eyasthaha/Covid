<?php
include 'css/style.css';
include 'connection.php';
include 'header.php';

    $sql = "select * from registration where approval='n' && role='doctor' || approval='n' && role='staff'";
    $result = $conn->query($sql);

?>
<html>
<title>Approval list</title>
    
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
        <th>Vaccinated</th>
        <th>Approve</th>
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
            <td><?php echo $row['vaccinated']; ?></td>
            <form method="post"> <td align="center">
			<input id="form-button" name='approve' type='submit' value='Approve'>
			<input type='hidden' name='approve' value=<?php echo $row['email'];?>>
		</form>
            </tr>
    <?php            
        }
    }
        if(isset($_POST['approve'])){
            $id = $_POST['approve'];
            $sql2 = "update registration SET approval='y' where email= '$id' ";
            $result = $conn->query($sql2);
            if($result){
                echo 'approved';
            }
        }
            
        ?>
    </table>    
        
        </div>
    
        
        
        
        
    </body>


</html>