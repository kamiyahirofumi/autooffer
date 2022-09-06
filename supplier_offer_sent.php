<?php
//1. POSTデータ取得
$companyName = $_POST['companyName'];
$plant = $_POST['plant'];
$port = $_POST['port'];

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

$freight = 100;
$cifPrice = $price + $freight;

echo $grade;
echo '<br>';
echo $finish;
echo '<br>';
echo $minThickness;
echo '<br>';
echo $maxThickness;
echo '<br>';
echo $width;
echo '<br>';
echo $maxQty;
echo '<br>';
echo $orderLot;
echo '<br>';
echo $coilWeight;
echo '<br>';
echo $cargoReadiness;
echo '<br>';
echo $cifPrice;
echo '<br>';
echo $vali;

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO offer(companyName,plant,shippingPort,grade,finish,minThickness,maxThickness,width,orderLot,coilWeight,cargoReadiness,fobPrice, cifPrice,vali, indate)VALUES(:companyName,:plant,:shippingPort,:grade,:finish,:minThickness,:maxThickness,:width,:orderLot,:coilWeight,:cargoReadiness,:fobPrice, :cifPrice,:vali,sysdate())");
$stmt->bindValue(':companyName',  $companyName,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':plant',   $plant,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':shippingPort',$port, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':grade',$grade, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':finish',$finish, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':minThickness',$minThickness, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':maxThickness',$maxThickness, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':width',$width, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':orderLot',$orderLot, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':coilWeight',$coilWeight, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cargoReadiness',$cargoReadiness, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':fobPrice',$price, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cifPrice',$cifPrice, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':vali',$vali, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// for($i = 1; $i<49; $i++){
// for($i = 1; $i<9; $i++){
//     $stmt->bindValue(':Ex'.$i,${'Ex'.$i}, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    // echo ${'Ex'.$i};
// }

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    //*** function化を使う！*****************
    sql_error($stmt);
}else{
    //*** function化を使う！*****************
    redirect("supplier_offer.php");
}

?>