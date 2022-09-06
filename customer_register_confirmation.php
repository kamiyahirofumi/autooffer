<?php
//1. POSTデータ取得
$companyName = $_POST['companyName'];
$HQ = $_POST['HQ'];
$country = $_POST['country'];
$port = $_POST['port'];
$personName = $_POST['personName'];
$phoneNumber = $_POST['phoneNumber'];
$emailAddress = $_POST['emailAddress'];
$lpw = $_POST['lpw'];

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
    <form method="POST" action="customer_register_finish.php">
        <div class>
            <fieldset>
                <legend>Customer Register</legend>
                    Company Information<br>
                    <label>Company Name: <?php echo $companyName; ?></label><br>
                    <label>HQ Address: <?php echo $HQ; ?></label><br>
                    <label>Country: <?php echo $country; ?> </label><br>
                    <label>Port of Discharge: <?php echo $port; ?></label><br>
                    <br>
                    Contact Information
                    <br>
                    <label>Person Name: <?php echo $personName; ?></label><br>
                    <label>Phone Number: <?php echo $phoneNumber; ?></label><br>
                    <label>Email Address: <?php echo $emailAddress; ?></label><br>
                    <label>Login Password: <?php echo $lpw; ?></label><br>
                  
                    <input type="submit" value="送信">
            </fieldset>
        </div>
                        <!-- hidden -->
                    <input type="hidden" name="companyName" value=<?php echo $companyName ?> >
                    <input type="hidden" name="HQ" value=<?php echo $HQ ?> >
                    <input type="hidden" name="country" value=<?php echo $country ?> >
                    <input type="hidden" name="port" value=<?php echo $port ?> >
                    <input type="hidden" name="personName" value=<?php echo $personName ?> >
                    <input type="hidden" name="phoneNumber" value=<?php echo $phoneNumber ?> >
                    <input type="hidden" name="emailAddress" value=<?php echo $emailAddress ?> >
                    <input type="hidden" name="lpw" value=<?php echo $lpw ?> >

    </form>





</body>
</html>