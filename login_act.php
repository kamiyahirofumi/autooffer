<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値

$emailAddress = $_POST["emailAddress"];
$lpw = $_POST["lpw"];

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
$stmt = $pdo->prepare("select * from supplier where emailAddress = :emailAddress and lpw = :lpw"); 
$stmt->bindValue(':emailAddress', $emailAddress, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();


//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()



// 5.該当１レコードがあればSESSIONに値を代入
// 入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
// $pw = password_verify($lpw, $val["lpw"]);
if( $val["id"] != "" ){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];

  $_SESSION["emailAddress"]      = $emailAddress;
  $_SESSION["lpw"]      = $lpw;

  //Login成功時（リダイレクト）
  redirect("supplier_offer.php");
}else{
  //Login失敗時(Logoutを経由：リダイレクト)
  redirect("login.php");
}

exit();


