<?php
session_start();
$sEmailAddress =   $_SESSION["emailAddress"];
$sLpw =   $_SESSION["lpw"];

// echo $sEmailAddress;
// echo $sLpw;


//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("select * from supplier where emailAddress = :emailAddress and lpw = :lpw"); 
$stmt->bindValue(':emailAddress', $sEmailAddress, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $sLpw, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $companyName = h($res["companyName"]);
    // echo $companyName;
    $plant = h($res["plant"]);
    // echo $plant;

    $port = h($res["port"]);
    // echo $port;

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

<header id = kensakuHeader>
        <a href="./supplier_offer_record.php">Offer Record</a>
        <a href="./login.php">Logout</a>
    </header>    

<body>
    <!-- form作成 -->
    <form method="POST" action="supplier_offer_confirmation.php">
        <div class>
            <fieldset>
                <legend>Making an Offer</legend>
                    <label>Company Name:<?php echo $companyName; ?> </label><br>
                    <label>Plant: <?php echo $plant; ?></label><br>
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
                    <!-- <label>Thickness：(Min)<input type="number" name="minThickness" required>mm
                        <= t <= (Max)<input type="number" name="maxThickness" required>mm
                    </label><br> -->
                    <label>Thickness：(Min)<input name="minThickness" required>mm
                        <= t <= (Max)<input name="maxThickness" required>mm
                    </label><br><!-- checkBoxのrequired -->
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
                    <label>Incoterms: FOB <?php echo $port; ?> </label><br>
                    <label>Price：<input type="number" name="price" required>USD/mt for the above selected grade t2.0mm</label><br>                   
                    <label>Validity Date：<input type="date" name="vali" required></label><br>                   

                    <!-- hidden -->
                    <input type="hidden" name="companyName" value=<?php echo $companyName; ?> >
                    <input type="hidden" name="plant" value=<?php echo $plant; ?> >
                    <input type="hidden" name="port" value=<?php echo $port; ?> >
       
                    <input type="submit" value="To confirmation page">
            </fieldset>
        </div>
    </form>

    <!-- 明細追加 -->

    <!-- 確認画面 -->

</body>
</html>