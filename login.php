<?php
ob_start();
include 'connection.php';
include 'main_header.php';
include 'css/style.css';

?>
<html>
<title>Login</title>

<body>
    <?php include 'back_btn.php'; ?>
    <div class="form-center">
    <form method="post">
    
    <table>
    <tr>
       <td id="center"> <h1>Login</h1></td>
    </tr>
        <tr>
            <td><input type="text" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required></td>
        </tr>
        <tr>
            <td><input type="password" name="pwd" placeholder="Password" pattern=".{8,}" required></td>
        </tr>
        <tr>
            <td><select name="role" required>
                <option value="doctor">Doctor</option>
                <option value="patient">Patient</option>
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
                </select></td>
        </tr> 
    <tr><td id="center"><input type="submit" name="submit" value="Login"></td></tr>
    </table>
        
    </form>
    </div>
    
<?php
        if(isset($_POST['submit'])){
          $email = $_POST['email'];  
          $pwd = $_POST['pwd'];  
          $role = $_POST['role'];  
            $sql = "select role,email,pwd from registration where role ='$role' && email ='$email' && pwd ='$pwd'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                session_start();
                $_SESSION['uid'] = $email;
                if($role == 'doctor'){
                    header("Location: doctor_home.php");
                }elseif($role == 'staff'){
                    header("Location: staff_home.php");
                }elseif($role == 'patient'){
                    header("Location: userhome.php");
                }elseif($role == 'admin'){
                    header("Location: admin_home.php");
                }
            }else{
                echo 'invalid credentials';
            }
        }
    ?>
    </body>



</html>