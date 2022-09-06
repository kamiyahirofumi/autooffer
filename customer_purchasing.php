<!-- POSTデータ取得し、DB内の対象オファーを特定 -->

<?php
//Offerの詳細取得
////1. OfferのId（POSTデータ）取得
$id = $_POST['id'];

// echo $id;

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("select * from offer where id = :id"); 
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
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

    $supplierName = h($res["companyName"]);
    // echo $supplierName;
    $plant = h($res["plant"]);
    // echo $plant;
    $grade = h($res["grade"]);
    $finish = h($res["finish"]);
    $orderLot = h($res["orderLot"]);
    $coilWeight = h($res["coilWeight"]);
    $cargoReadiness = h($res["cargoReadiness"]);
    $shippingPort = h($res["shippingPort"]);
    $offerDate = h($res["indate"]);
    $vali = h($res["vali"]);
    $width = h($res["width"]);
    $cifPrice = h($res["cifPrice"]);


    // echo $shippingPort;

}

// 需要家情報取得
//// session接続
session_start();
$sEmailAddress =   $_SESSION["emailAddress"];
$sLpw =   $_SESSION["lpw"];

// echo $sEmailAddress;
// echo $sLpw;



//２．データ登録SQL作成
$stmt = $pdo->prepare("select * from customer where emailAddress = :emailAddress and lpw = :lpw"); 
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

    $customerName = h($res["companyName"]);
    // echo $customerName;

    $dischargePort = h($res["port"]);
    // echo $dischargePort;

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
    <form method="POST" action="customer_order.php">
        <div class>
            <fieldset>
                <legend>Offer Detail</legend>
                    <label>Offer Date：<?php echo $offerDate; ?></label><br>                   
                    <label>Validity Date：<?php echo $vali; ?></label><br>                   
                    <br>
                    <label>Seller: Metal One Corporation</label><br>
                    <label>Buyer: <?php echo $customerName; ?></label><br>
                    <br>
                    <label>Supplier: <?php echo $supplierName; ?> </label><br>
                    <label>Plant: <?php echo $plant; ?> </label><br>
                    <label>Material:Cold Rolled Stainless Steel Sheet In Coil</label><br>
                    <label>Specification:As Per ASTM A240</label><br>
                    <label>Grade: <?php echo $grade; ?> </label><br>
                    <label>Surface Finish: <?php echo $finish; ?> </label><br>
                    <label>Order Lot：<?php echo $orderLot; ?>mt</label><br>
                    <label>Coil Weight：<?php echo $coilWeight; ?>mt per coil</label><br>
                    <label>Time Of Shipment：<?php echo $cargoReadiness; ?><br>                   
                    <label>Incoterms: CIF <?php echo $dischargePort; ?></label><br>
                    <table>
                        <tr>
                            <th>Thickness(mm)</th>
                            <th>Width(mm)</th>
                            <th>Length</th>
                            <th>Unit Price(USD/mt)</th>
                        </tr>
                        <tr>
                            <td>t2.0</td>
                            <td>w<?php echo $width; ?></td>
                            <td>coil</td>
                            <td><?php echo $cifPrice; ?></td>
                        </tr>
                    </table>
                    <br>
                    <label>Order Quantity：<input type="number" name="lotNo" required>lots(1lot = <?php echo $orderLot; ?>mt)</label><br>

                    <!-- hidden -->
                    <input type="hidden" name="id" value=<?php echo $id ?> >

                    <input type="submit" value="Order Detail">
            </fieldset>
        </div>
    </form>
<!-- Main[End] -->


</body>
</html>