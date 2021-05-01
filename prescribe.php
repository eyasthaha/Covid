<?php
ob_start();
include 'connection.php';
include 'header.php';
include 'css/style.css';

session_start();
$docid = $_SESSION['uid'];
$pid = $_SESSION['pid'];
$sl = $_SESSION['sl'];
$sql = "select name,phone from registration where email = '$pid'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()){
    

?>

<html>
<title>Prescribe</title>
    <body>
        <table id="list" style="margin-top:50px;">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Problems</th>
            <th>Other</th>
        </tr>
        <tr>
            <td><?php echo $row['name'];  ?></td>
            <td><?php echo $row['phone']; } ?></td>
            <?php
            $sql2= "select * from consultation where id='$sl' && docid='$docid' && uid='$pid'";
            $result2 = $conn->query($sql2);
            if($row2 = $result2->fetch_assoc()){
            ?>
            <td><?php echo $row2['problems'];  ?></td>
            <td><?php echo $row2['other']; } ?></td>
        </tr>
        </table>
        <div class="div-center">
            <form id="p" name="p" method="post">
        <table style="margin-top:50px;">
        <tr>
            <td><textarea name="p" placeholder="Prescribe"></textarea></td>
        </tr>
        <tr>
            <td id="center"><input type="submit" name="submit" value="Submit"></td>
        </tr>
            <tr>
            <td id="center">
                   <?php
                if(isset($_POST['submit'])){
                    $p = $_POST['p'];
                    $sql3 = "update consultation set prescription = '$p',status ='done' where id='$sl'";
                    $result3 = $conn->query($sql3);
                    if($result3){
                        echo 'completed<br>';
                        echo "<a id='a' href = 'consultancy_list.php'>Back to List</a>";
                    }
                }
                ?>
                </td>
        </tr>
        </table>
             
        </form>
        </div>
    </body>

</html>