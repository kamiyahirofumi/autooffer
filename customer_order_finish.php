<?php
//1. POSTデータ取得
$offerId = $_POST['id'];
$orderQuantity = $_POST['orderQuantity'];
$priceAmount = $_POST['priceAmount'];

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("select * from offer where id = :id"); 
$stmt->bindValue(':id', $offerId, PDO::PARAM_STR);
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
    $fobPrice = h($res["fobPrice"]);
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

$thickness = "t2.0";

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO orders(offerId,supplierName,customerName,grade,finish,coilWeight,cargoReadiness,shippingPort,dischargePort,thickness,width,fobPrice,cifPrice,orderQuantity,priceAmount, indate)VALUES(:offerId,:supplierName,:customerName,:grade,:finish,:coilWeight,:cargoReadiness,:shippingPort,:dischargePort,:thickness,:width,:fobPrice,:cifPrice,:orderQuantity,:priceAmount, sysdate())");
$stmt->bindValue(':offerId',  $offerId,   PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':supplierName', $supplierName,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':customerName',   $customerName,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':grade',$grade, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':finish',$finish, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':coilWeight',$coilWeight, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cargoReadiness',$cargoReadiness, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':shippingPort',$shippingPort, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':dischargePort',$dischargePort, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':thickness',$thickness, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':width',$width, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':fobPrice',$fobPrice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cifPrice',$cifPrice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':orderQuantity',$orderQuantity, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':priceAmount',$priceAmount, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    //*** function化を使う！*****************
    sql_error($stmt);
}else{
    //*** function化を使う！*****************
    redirect("customer_top.php");
}

?>
