<?php
ob_start();
include'css/style.css';
include'connection.php';
include'header.php';
?>
<html>
<title>Home</title>
    <?php
        session_start();
        $uid = $_SESSION['uid'];
        ?>
    
    <body>
        <?php include 'back_btn.php'; ?>
        <div class="div-center">
        <table>
            <tr>
                <td></td>
                <td><a href="reg_vaccination.php"><button id="btn">Register for Vaccination</button></a></td>
                <td></td>
            </tr>
        <tr>
            <td><div><a href = "doctors_list.php"><img src ='images/doc.png'><h2 id="center">Doctors</h2></a></div></td>    
            <td><div><a href="health_centre.php"><img src ='images/hsptl.png'><h2 id="center">Health Centre</h2></a></div></td>    
            <td><div><a href="firstline.php"><img src ='images/aid.png'><h2 id="center">Firstline Treatment centre</h2></a></div></td>    
        </tr>
            <tr>
            <td><div><a href="prescription_list.php"><img src ='images/list.png'><h2 id="center">Prescriptions</h2></a></div></td> 
            </tr>
        </table>
        </div>
    </body>



</html>