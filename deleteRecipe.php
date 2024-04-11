
<?php
            include('connection.php');

            $RecipeName=$_POST['RecipeName'];
           
            $sql = "DELETE FROM recipoe WHERE RecipeName='$RecipeName'" ;
            $result = $db->query($sql);
            header("Location: index.html");
            $db->close();
        ?>
