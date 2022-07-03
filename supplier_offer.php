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
    <form method="POST" action="supplier_offer_confirmation.php">
        <div class>
            <fieldset>
                <legend>Making Offers</legend>
                    <label>Plant: 要検討！！！！</label><br>
                    <label>Material:Cold Rolled Stainless Steel Sheet In Coil</label><br>
                    <label>Specification:As Per ASTM A240</label><br>
                    <label>Grade:
                        <input type="radio" name="grade" value="TYPE304" required>TYPE 304,
                        <input type="radio" name="grade" value="TYPE316L">TYPE 316L or
                        <input type="radio" name="grade" value="TYPE430">TYPE 430
                    </label><br>
                    <label>Surface Finish:
                        <input type="radio" name="finish" value="2B" required>2B or
                        <input type="radio" name="finish" value="BA"> BA
                    </label><br>
                    <label>Thickness：(Min)<input type="number" name="minThickness" required>mm
                        <= t <= (Max)<input type="number" name="maxThickness" required>mm
                    </label><br>
<!-- checkBoxのrequired -->
                    <label>Width(slit edge)：
                        <input type="checkbox" name="width" value="1000"> 1000mm and/or
                        <input type="checkbox" name="width" value="1219"> 1219mm
                    </label><br>
                    <label>Length: Coil</label><br>
                    <label>Maximum Acceptable Quantity：<input type="number" name="maxQty" required>mt</label><br>
                    <label>Order Lot：<input type="number" name="orderLot" required>mt</label><br>
<!-- coil weight numberだと小数が入らない -->
                    <label>Coil Weight：<input type="number" name="coilWeight" required>mt per coil</label><br>
                    <label>Time Of Shipment：<input type="month" name="cargoReadiness" required></label><br>                   
                    <label>Incoterms: 要検討！！！！</label><br>
                    <label>Price：<input type="number" name="price" required>USD/mt for the above selected grade t2.0mm</label><br>                   
                    <label>Validity Date：<input type="date" name="vali" required></label><br>                   
                    <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>

    <!-- 明細追加 -->

    <!-- 確認画面 -->

</body>
</html>