<?php 
ob_start();
include 'connection.php';
include 'header.php';
include 'css/style.css';

?>
<html>
    <title>Doctor|Home</title>
    
    <body>
        <div class="div-center" style="margin-top:50px;">
        <table>
        <tr>
            <td><div><a href = "consultancy_list.php"><img src ='images/cons.png'><h2 id="center">Patients</h2></a></div></td>    
        
            <td><div><a href = "view_prescription.php"><img src ='images/list.png'><h2 id="center">Prescriptions</h2></a></div></td>    
        </tr>
        </table>
        </div>
    </body>

</html>