

<html>
    <head>
        <title>halo</title>
    </head>
    <body>
    <table border="1" cellpadding="10" cellspacing="0">
    <?php 
     for($i = 0; $i < 4; $i++){
        echo "<tr>";
            for($j = 1; $j <= 5; $j++){
                echo "<td>$i,$j</td>";
            }
        echo "</tr>";
     }
    ?>
    </table>
    </body>
</html>
