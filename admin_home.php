<?php 
include 'connection.php';
include 'header.php';
include 'css/style.css';
?>
<html>
    <title>Admin|Home</title>
    
    <body>
        <div class="div-center">
        <table>
        <tr>
            <td><div><a href = "approval.php"><img src ='images/approval.png'><h2 id="center">Approval</h2></a></div></td>    
            <td><div><a href="add_healthcentre.php"><img src ='images/hsptl.png'><h2 id="center">Add Health Centre</h2></a></div></td>    
            <td><div><a href="add_firstline_treatment.php"><img src ='images/aid.png'><h2 id="center">Firstline Treatment centre</h2></a></div></td>    
            <td><div><a href="vaccination_list.php"><img src ='images/vacc.png'><h2 id="center">Vaccination</h2></a></div></td>
        </tr>
        <tr>
            <td><div><a href="accounts.php"><img src ='images/accounts.png'><h2 id="center">Accounts</h2></a></div></td>
            <td><div><a href="health_centre.php"><img src ='images/health.png'><h2 id="center">Health Centres</h2></a></div></td>
            <td><div><a href="firstline.php"><img src ='images/health.png'><h2 id="center">Treatment Centres</h2></a></div></td>
        </tr>
        </table>
        </div>
    </body>

</html>