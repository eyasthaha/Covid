<?php
include 'css/style.css';
include 'connection.php';
include 'header.php';

    $sql = "select * from vaccinereg where uid in (select email from registration where vaccinated ='no')";
    $result = $conn->query($sql);

?>
<html>
<title>Vaccination list</title>
    
    <body>

    <div>
        
        <table id="list">
    <tr>
        <th>Id</th>
        <th>E-mail</th>
        <th>Adhaar No.</th>
        <th>Centre</th>
        <th>Date</th>
        <th>Action</th>
        </tr>
        <tr>
        <?php
            if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
   ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['uid']; ?></td>
            <td><?php echo $row['adhaar']; ?></td>
            <td><?php echo $row['centre']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <form method="post"> <td align="center">
			<input id="form-button" name='vaccinated' type='submit' value='Vaccinated'>
			<input type='hidden' name='vaccinated' value="<?php echo $row['uid'];?>">
		</form>
            </tr>
    <?php            
        }
    }
        if(isset($_POST['vaccinated'])){
            $id = $_POST['vaccinated'];
            $sql2 = "update registration SET vaccinated='yes' where email= '$id' ";
            $result = $conn->query($sql2);
            if($result){
                echo 'completed';
            }
        }
            
        ?>
    </table>    
        
        </div>
    
        
        
        
        
    </body>


</html>