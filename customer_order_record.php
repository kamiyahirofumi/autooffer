<?php
session_start();
$sEmailAddress =   $_SESSION["emailAddress"];
$sLpw =   $_SESSION["lpw"];

// echo $sLpw;

// echo $sEmailAddress;
// echo $sLpw;

// /// サプライヤー特定
//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

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
    //  echo $customerName;
}


//２．データ登録SQL作成
$stmt = $pdo->prepare("select * from orders where customerName = :customerName"); 
$stmt->bindValue(':customerName', $customerName, PDO::PARAM_STR);
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
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .= "<tr>";

    $view .= "<td>";
    $view .= h($res["indate"]);
    $view .= "</td>";

    $view .= "<td>";
    $view .= h($res["supplierName"]);
    $view .= "</td>";

    $view .= "<td>";
    $view .= h($res["grade"]);
    $view .= "</td>";

    $view .= "<td>";
    $view .= h($res["finish"]);
    $view .= "</td>";
    
    $view .= "<td>";
    $view .= h($res["cargoReadiness"]);
    $view .= "</td>";   

    $view .= "<td>";
    $view .= h($res["thickness"]);
    $view .= "</td>";

    $view .= "<td>";
    $view .= h($res["width"]);
    $view .= "</td>";

    $view .= "<td>";
    $view .= h($res["cifPrice"]);
    $view .= "</td>";

    $view .= "<td>";
    $view .= h($res["orderQuantity"]);
    $view .= "</td>";

    }
}   

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<!-- <link rel="stylesheet" href="style.css"> -->
<!-- <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" /> -->
<title>TOP</title>
</head>
<body id = kensakuBody>

    <header id = kensakuHeader>
        <a href="./customer_top.php">TOP</a>
        <a href="./login.php">Logout</a>
        <h2>Outstanding Orders</h2>
    </header>    

    <!--検索画面 -->
    <div id = serch>
        <!-- 表 -->
        <div id="tableSpace"> 
        <table id ="output">
            <tr>
                <th >Order Date</th>
                <th >Supplier</th>
                <th >grade</th>
                <th >finish</th>
                <th >cargoReadiness</th>
                <th >thickness</th>
                <th >width</th>
                <th >cifPrice</th>
                <th >orderQuantity</th>
            </tr>

            <?=$view?>
        </table>
        </div>



</body>
</html>