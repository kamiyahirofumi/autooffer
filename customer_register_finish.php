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

//*** 外部ファイルを読み込む ***
//include("funcs.php");
//$pdo = db_conn();

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO customer(companyName,HQ,country,port,personName,phoneNumber,emailAddress,lpw)VALUES(:companyName,:HQ,:country,:port,:personName,:phoneNumber,:emailAddress,:lpw)");
$stmt->bindValue(':companyName',  $companyName,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':HQ', $HQ,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':country',$country, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':port',$port, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':personName',$personName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':phoneNumber',$phoneNumber, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':emailAddress',$emailAddress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    //*** function化を使う！*****************
    sql_error($stmt);
}else{
    //*** function化を使う！*****************
    redirect("customer_register.php");
}

?>
