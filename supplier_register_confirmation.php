<?php
//1. POSTデータ取得
$companyName = $_POST['companyName'];
$HQ = $_POST['HQ'];
$plant = $_POST['plant'];
$country = $_POST['country'];
$port = $_POST['port'];
$personName = $_POST['personName'];
$phoneNumber = $_POST['phoneNumber'];
$emailAddress = $_POST['emailAddress'];
$lpw = $_POST['lpw'];


for($i = 1; $i<49; $i++){
    ${'Ex'.$i} = $_POST['Ex'.$i];
    // echo ${'Ex'.$i};
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- form作成 -->
    <form method="POST" action="supplier_register_finish.php">
        <div class>
            <fieldset>
                <legend>Supplier Register</legend>
                    Company Information<br>
                    <label>Company Name: <?php echo $companyName; ?></label><br>
                    <label>HQ Address: <?php echo $HQ; ?></label><br>
                    <label>Plant Name(Place): <?php echo $plant; ?></label><br>
                    <label>Country: <?php echo $country; ?> </label><br>
                    <label>Shipment Port: <?php echo $port; ?></label><br>
                    <br>
                    Contact Information
                    <br>
                    <label>Person Name: <?php echo $personName; ?></label><br>
                    <label>Phone Number: <?php echo $phoneNumber; ?></label><br>
                    <label>Email Address: <?php echo $emailAddress; ?></label><br>
                    <label>Login Password: <?php echo $lpw; ?></label><br>
                    <br>
                    Thickness Extra Table(USD/mt)
                    <br>
                    <table>
                        <tr>
                            <th>Thickness(mm)</th>
                            <th>304 2B</th>
                            <th>304 BA</th>
                            <th>430 2B</th>
                            <th>430 BA</th>
                            <th>316L 2B</th>
                            <th>316L BA</th>    
                        </tr>
                        <tr>
                            <td>2.0</td>
                            <td>BASE</td>
                            <td>BASE</td>
                            <td>BASE</td>
                            <td>BASE</td>
                            <td>BASE</td>
                            <td>BASE</td>
                        </tr>
                        <tr>
                            <td>1.5</td>
                            <td><?php echo $Ex1; ?></td>
                            <td><?php echo $Ex9; ?></td>
                            <td><?php echo $Ex17; ?></td>
                            <td><?php echo $Ex25; ?></td>
                            <td><?php echo $Ex33; ?></td>
                            <td><?php echo $Ex41; ?></td>
                        </tr>                        
                        <tr>
                            <td>1.2</td>
                            <td><?php echo $Ex2; ?></td>
                            <td><?php echo $Ex10; ?></td>
                            <td><?php echo $Ex18; ?></td>
                            <td><?php echo $Ex26; ?></td>
                            <td><?php echo $Ex34; ?></td>
                            <td><?php echo $Ex42; ?></td>
                        </tr>                        
                        <tr>
                            <td>1.0</td>
                            <td><?php echo $Ex3; ?></td>
                            <td><?php echo $Ex11; ?></td>
                            <td><?php echo $Ex19; ?></td>
                            <td><?php echo $Ex27; ?></td>
                            <td><?php echo $Ex35; ?></td>
                            <td><?php echo $Ex43; ?></td>
                        </tr>                        
                        <tr>
                            <td>0.9</td>
                            <td><?php echo $Ex4; ?></td>
                            <td><?php echo $Ex12; ?></td>
                            <td><?php echo $Ex20; ?></td>
                            <td><?php echo $Ex28; ?></td>
                            <td><?php echo $Ex36; ?></td>
                            <td><?php echo $Ex44; ?></td>
                        </tr>                        
                        <tr>
                            <td>0.8</td>
                            <td><?php echo $Ex5; ?></td>
                            <td><?php echo $Ex13; ?></td>
                            <td><?php echo $Ex21; ?></td>
                            <td><?php echo $Ex29; ?></td>
                            <td><?php echo $Ex37; ?></td>
                            <td><?php echo $Ex45; ?></td>
                        </tr>                    
                        <tr>
                            <td>0.7</td>
                            <td><?php echo $Ex6; ?></td>
                            <td><?php echo $Ex14; ?></td>
                            <td><?php echo $Ex22; ?></td>
                            <td><?php echo $Ex30; ?></td>
                            <td><?php echo $Ex38; ?></td>
                            <td><?php echo $Ex46; ?></td>
                        </tr>                    
                        <tr>
                            <td>0.6</td>
                            <td><?php echo $Ex7; ?></td>
                            <td><?php echo $Ex15; ?></td>
                            <td><?php echo $Ex23; ?></td>
                            <td><?php echo $Ex31; ?></td>
                            <td><?php echo $Ex39; ?></td>
                            <td><?php echo $Ex47; ?></td>
                        </tr>                    
                        <tr>
                            <td>0.5</td>
                            <td><?php echo $Ex8; ?></td>
                            <td><?php echo $Ex16; ?></td>
                            <td><?php echo $Ex24; ?></td>
                            <td><?php echo $Ex32; ?></td>
                            <td><?php echo $Ex40; ?></td>
                            <td><?php echo $Ex48; ?></td>
                        </tr>                    
                    </table>
                   
                    <input type="submit" value="送信">
            </fieldset>
        </div>
                        <!-- hidden -->
                    <input type="hidden" name="companyName" value=<?php echo $companyName ?> >
                    <input type="hidden" name="HQ" value=<?php echo $HQ ?> >
                    <input type="hidden" name="plant" value=<?php echo $plant ?> >
                    <input type="hidden" name="country" value=<?php echo $country ?> >
                    <input type="hidden" name="port" value=<?php echo $port ?> >
                    <input type="hidden" name="personName" value=<?php echo $personName ?> >
                    <input type="hidden" name="phoneNumber" value=<?php echo $phoneNumber ?> >
                    <input type="hidden" name="emailAddress" value=<?php echo $emailAddress ?> >
                    <input type="hidden" name="lpw" value=<?php echo $lpw ?> >

                    <input type="hidden" name="Ex1" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex2" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex3" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex4" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex5" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex6" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex7" value=<?php echo $Ex1 ?> >
                    <input type="hidden" name="Ex8" value=<?php echo $Ex1 ?> >
       

    </form>





</body>
</html>