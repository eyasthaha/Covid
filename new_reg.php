<?php 
include 'css/style.css';
include 'connection.php';
include 'main_header.php';
ob_start();
?>
<html>
    <title>Covid</title>
    <head>
    <script></script>
    </head>
    <body>
    
    <div class="form-center">
        <form name="registration" method="post">
        <table>
        <tr>
            <td id="center"><h1>Registration</h1></td>
        </tr>
        <tr>
            <td><input name="uname" type="text" placeholder="Full Name" required></td>
        </tr>
        <tr>
            <td><input name="email" type="text" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required></td>
        </tr>
        <tr>
            <td><input name="ph" type="text" placeholder="Phone Number" maxlength="10" required></td>
        </tr>
        <tr>
            <td><input name="address" type="text" placeholder="Address" required></td>
        </tr>
        <tr>
            <td><input name="dob" type="date" placeholder="Date of Birth" required></td>
        </tr>
        <tr>
            <td><input name="blood" type="text" placeholder="Blood Group" required></td>
        </tr>    
        <tr>
            <td><input name="pwd1" type="password" placeholder="Password" pattern=".{8,}" required>
            <p style="font-size:12px; color:red; text-align:left;">Hint:Password must contain atleast 8 characters</p></td>
            
        </tr>
        <tr>
            <td><input name="pwd2" type="password" placeholder="Re-type Password" pattern=".{8,}" required></td>
        </tr>
        <tr>
            <td><select name="role" required>
                <option value="doctor">Doctor</option>
                <option value="patient">Patient</option>
                <option value="staff">Staff</option>
                </select></td>
        </tr>  
        <tr id="center">
            <td><input name="submit" type="submit" value="Register"></td>
        </tr>
        
        </table>
            <?php
if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['ph'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $blood = $_POST['blood'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $role = $_POST['role'];
    
    if($pwd1 == $pwd2){
        $sql2 = "select email from registration where email = '$email'";
    $res2 = $conn->query($sql2);
    
    if($res2->num_rows > 0){
        echo 'Email Id already exists';
        
        }else{
        
        if($role == 'staff' || $role == 'patient'){
            $sql = "insert into registration(name,email,phone,address,dob,blood,pwd,role,vaccinated,approval)VALUES('$uname','$email','$phone','$address','$dob','$blood','$pwd1','$role','n','n')";
    
        $res = $conn->query($sql);

			if($res) {
				echo "Registration Successfull";
                header("Location: login.php");
			}else{
				echo "Failed";
			}
        }elseif($role == 'doctor'){
            $sql = "insert into registration(name,email,phone,address,dob,blood,pwd,role,vaccinated,approval)VALUES('$uname','$email','$phone','$address','$dob','$blood','$pwd1','$role','n','n')";
    
        $res = $conn->query($sql);

			if($res) {
				echo "Registration Successfull";
                session_start();
                $_SESSION['email'] = $email;
                header("Location: specialization.php");
			}else{
				echo "Failed";
			}
        }
        }
    }else{
        echo '<p style="color:red;">Password mismatch</p>';
    }
    
    }
?>
        </form>
        </div>
    
    </body>
</html>

