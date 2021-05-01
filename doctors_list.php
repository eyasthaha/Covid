<?php
ob_start();
include 'css/style.css';
include 'connection.php';
include 'header.php';
    session_start();
    $uid= $_SESSION['uid'];
    
    $sql = "select * from registration where role ='doctor'";
    $result = $conn->query($sql);

?>
<html>
<title>Doctors</title>
    
    <body>

    <div>
        
        <table id="list">
    <tr>
        <th>Name</th>
        <th>Specialization</th>
        <th id="center">Consult</th>
        </tr>
        <tr>
        <?php
            if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
   ?>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
            <td id="center"><form method="post">
                <input id="form-button" name='btn' type='submit' value='Consult'>
                <input name='btn' type='hidden' value='<?php echo $row['email']; ?>'>
                </form></td>
            </tr>
    <?php   
        }
    }
            if(isset($_POST['btn'])){
                session_start();
                $_SESSION['docid'] = $_POST['btn'];
                header("Location: consultation.php");
            }
        ?>
    </table>    
        
        </div>
    
        
        
        
        
    </body>


</html>