<?php 
include 'css/style.css';
include 'connection.php';
include 'header.php';
?>
<html>
    <title>Covid</title>
    <head>
    <script></script>
    </head>
    <body>
    
    <div class="form-center">
        <form name="healthcentre" method="post">
        <table>
        <tr>
            <td id="center"><h1>Add Health Centre</h1></td>
        </tr>
        <tr>
            <td><input name="name" type="text" placeholder="Name" required></td>
        </tr>
        <tr>
            <td><input name="place" type="text" placeholder="Place" required></td>
        </tr>
        <tr>
            <td id="center"><input name="submit" type="submit" value="Add"></td>
        </tr>
        
        </table>
            <?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $place = $_POST['place'];

        $sql = "insert into healthcentre(name,place)VALUES('$name','$place')";
    
        $res = $conn->query($sql);

			if($res) {
				echo "Health centre added";
			}else{
				echo "Failed";
			}
    
    }
?>
        </form>
        </div>
    
    </body>
</html>

