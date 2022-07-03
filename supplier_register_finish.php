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


// for($i = 1; $i<49; $i++){
for($i = 1; $i<9; $i++){
    ${'Ex'.$i} = $_POST['Ex'.$i];
    // echo ${'Ex'.$i};
}

//*** 外部ファイルを読み込む ***
//include("funcs.php");
//$pdo = db_conn();

//2. DB接続します
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO supplier(companyName,HQ,plant,country,port,personName,phoneNumber,emailAddress,lpw,Ex1,Ex2,Ex3,Ex4,Ex5,Ex6,Ex7,Ex8)VALUES(:companyName,:HQ,:plant,:country,:port,:personName,:phoneNumber,:emailAddress,:lpw, :Ex1,:Ex2,:Ex3,:Ex4,:Ex5,:Ex6,:Ex7,:Ex8)");
$stmt->bindValue(':companyName',  $companyName,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':HQ', $HQ,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':plant',   $plant,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':country',$country, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':port',$port, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':personName',$personName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':phoneNumber',$phoneNumber, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':emailAddress',$emailAddress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Ex1',$Ex1, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// for($i = 1; $i<49; $i++){
for($i = 1; $i<9; $i++){
    $stmt->bindValue(':Ex'.$i,${'Ex'.$i}, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    // echo ${'Ex'.$i};
}

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    //*** function化を使う！*****************
    sql_error($stmt);
}else{
    //*** function化を使う！*****************
    redirect("supplier_register.php");
}

?>
