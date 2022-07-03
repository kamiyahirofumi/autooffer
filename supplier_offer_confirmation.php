<!-- PHP02 index.phpとdelete.phpを参照 -->

<?php
//1. POSTデータ取得
$grade = $_POST['grade'];
$finish = $_POST['finish'];
$minThickness = $_POST['minThickness'];
$maxThickness = $_POST['maxThickness'];
$width = $_POST['width'];
$maxQty = $_POST['maxQty'];
$orderLot = $_POST['orderLot'];
$coilWeight = $_POST['coilWeight'];
$cargoReadiness = $_POST['cargoReadiness'];
$price = $_POST['price'];
$vali = $_POST['vali'];

echo $grade;
// echo $finish;
// echo $minThickness;
// echo $maxThickness;
echo $width;
// echo $maxQty;
// echo $orderLot;
// echo $coilWeight;
// echo $cargoReadiness;
// echo $price;
// echo $vali;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>オファー確認</title>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Main[Start] -->
<form method="POST" action="supplier_offer_sent.php">
        <div class>
            <fieldset>
                <legend>Confirming Offers</legend>
                    <label>Seller: 要検討！！！！</label><br>
                    <label>Buyer: Metal One Corporation</label><br>
                    <label>Plant: 要検討！！！！</label><br>
                    <label>Material:Cold Rolled Stainless Steel Sheet In Coil</label><br>
                    <label>Specification:As Per ASTM A240</label><br>
                    <label>Grade: <?php echo $grade; ?> </label><br>
                    <label>Surface Finish: <?php echo $finish; ?> </label><br>

                    <!-- <label>いらないThickness：(Min)<?php echo $minThickness; ?>mm
                        <= t <= (Max)<?php echo $maxThickness; ?>mm</label><br> -->

                    <!-- <label>いらないWidth：</label><br> -->
                    <label>Edge： Slit Edge</label><br>

                    <!-- <label>いらないLength: Coil</label><br> -->

                    <label>Maximum Acceptable Quantity：<?php echo $maxQty; ?>mt</label><br>
                    <label>Order Lot：<?php echo $orderLot; ?>mt</label><br>
                    <label>Coil Weight：<?php echo $coilWeight; ?>mt per coil</label><br>
                    <label>Time Of Shipment：<?php echo $cargoReadiness; ?><br>                   
                    <label>Incoterms: 要検討！！！！</label><br>

                    <!-- <label>いらないPrice：<input type="number" name="price" required>USD/mt for the above selected grade t2.0mm</label><br>                    -->

                    <label>Validity Date：<?php echo $vali; ?></label><br>                   
                    <table>
                        <tr>
                            <th>Thickness(mm)</th>
                            <th>Width(mm)</th>
                            <th>Length</th>
                            <th>Price(USD/mt)</th>
                        </tr>
                        <tr>
                            <td>t2.0</td>
                            <td>w<?php echo $width; ?></td>
                            <td>coil</td>
                            <td><?php echo $price; ?></td>
                        </tr>
                    </table>
                    <!-- hidden -->
                    <input type="hidden" name="grade" value=<?php echo $grade ?> >
                    <input type="hidden" name="finish" value=<?php echo $finish ?> >
                    <input type="hidden" name="minThickness" value=<?php echo $minThickness ?> >
                    <input type="hidden" name="maxThickness" value=<?php echo $maxThickness ?> >
                    <input type="hidden" name="width" value=<?php echo $width ?> >
                    <input type="hidden" name="maxQty" value=<?php echo $maxQty ?> >
                    <input type="hidden" name="orderLot" value=<?php echo $orderLot ?> >
                    <input type="hidden" name="coilWeight" value=<?php echo $coilWeight ?> >
                    <input type="hidden" name="cargoReadiness" value=<?php echo $cargoReadiness ?> >
                    <input type="hidden" name="price" value=<?php echo $price ?> >
                    <input type="hidden" name="vali" value=<?php echo $vali ?> >

                    <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
<!-- Main[End] -->


</body>
</html>