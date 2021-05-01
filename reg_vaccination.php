<?php 
ob_start();
include 'css/style.css';
include 'connection.php';
include 'header.php';

    $sql = "select name from healthcentre";
    $result = $conn->query($sql);
    $options = '';
    $now = date("Y")."-".date("m")."-".date("d");
	$min = date('Y-m-d', strtotime($now. ' +15 days'));
    while($row = $result->fetch_assoc()){
        $options = $options."<option value=$row[name]>$row[name]</option>";
    }

?>
<html>
    <title>Covid</title>
    <head>
    <script></script>
    </head>
    <body>
    
    <div class="form-center">
        <form name="form" method="post">
        <table>
        <tr>
            <td id="center"><h1>Vaccine Registration</h1></td>
        </tr>
        <tr>
            <td><input name="date" type="date" placeholder="Date" min="<?php echo $min; ?>" required></td>
        </tr>
        <tr>
            <td><input name="adhaar" type="text" placeholder="Adhaar card No." pattern=".{12,12}" required></td>
        </tr>    
        <tr>
          <td><select name="centre" required>
              <option value="null" selected>Choose a centre</option>
                <?php echo $options ?>
                </select></td>
        </tr>
        <tr>
            <td id="center"><input name="submit" type="submit" value="Register"></td>
        </tr>
        <tr>
            <td id="center">
             <?php
             if(isset($_POST['submit'])){
                 session_start();
                 $uid = $_SESSION['uid'];
                 $sql2 = "select * from registration where email ='$uid' && vaccinated ='yes'";
                 $result2 = $conn->query($sql2);
                 if($result2->num_rows){
                         echo "<script>alert('you are already vaccinated!');</script>";
                 }else{
                 $date = $_POST['date'];
                 $adhaar = $_POST['adhaar'];
                 $centre = $_POST['centre'];
                     echo $centre;
                     $sql3 = "insert into vaccinereg(uid,adhaar,centre,date)values('$uid','$adhaar','$centre','$date')";
                     $result3 = $conn->query($sql3);
                     if($result3){
                         echo 'Registration Succesfull<BR>';
                         echo "<a id='a' href = 'userhome.php'>Back to home</a>";
                     }else{
                         echo 'failed';
                     }
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

