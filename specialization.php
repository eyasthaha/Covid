<?php
include 'connection.php';
include 'home_header.php';
include 'css/style.css';
ob_start();
?>
<html>
<title>Login</title>

<body>
    <div class="form-center">
    <form method="post">
    
    <table>
    <tr>
       <td id="center"> <h1>Specialization</h1></td>
    </tr>
        <tr>
            <td><input type="text" name="val" placeholder="Speciailization" required></td>
        </tr>
        <tr>
            <td id="center"><input type="submit" name="submit" value="Submit"required></td>
        </tr>
    </table>
        <p style="color: red;font-size:12px;">WARNING:Once you added,cannot ba changed</p>
        
    </form>
    </div>
    
<?php
        if(isset($_POST['submit'])){
            session_start();
            $email = $_SESSION['email'];
            echo $email;
          $val = $_POST['val'];  
            $sql = "update registration set specialization = '$val' where email = '$email'";
            $result = $conn->query($sql);
            if($result){
                header("Location: doctor_home.php");
            }else{
                echo 'invalid credentials';
            }
        }
    ?>
    </body>



</html>