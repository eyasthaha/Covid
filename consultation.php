<?php
include 'connection.php';
include 'css/style.css';

            session_start();
    $uid = $_SESSION['uid'];
    $docid = $_SESSION['docid'];


?>
<html>
<title>Covid</title>
<body>

    <div>
    <form method="post">
    
    <table>
    <tr>
       <td id="center"> <h1>Consult</h1></td>
    </tr>
        <tr>
            <td colspan="2"><textarea name="problems" placeholder="Problems" required></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="other" placeholder="Currently taking any medicines?disease" required></textarea></td>
        </tr>
        <tr>
        <tr>
            <td id="center"><input type="submit" name="submit" value="Submit" onclick="check()" required></td>
        </tr>
        <tr>
            <td id="center">
                <?php
        if(isset($_POST['submit'])){
          $date = date("Y-m-d");   
          $prob = $_POST['problems'];  
          $docid = $_SESSION['docid'];
          $c = $_POST['other']; 

            
            $sql = "insert into consultation(docid,uid,problems,other,date,status)values('$docid','$uid','$prob','$c','$date','pending')";
            $result = $conn->query($sql);
            if($result){
                echo "Success<br>";
                echo "<a id='a' href = 'doctors_list.php'>Back to home</a>";
            }else{
                echo "<script>alert('failed');</script>";
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