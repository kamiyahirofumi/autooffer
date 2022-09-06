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

    $supplierName = h($res["companyName"]);
     // echo $supplierName;
}

//  オファー表示

//２．データ登録SQL作成
$stmt = $pdo->prepare("select * from offer where companyName = :companyName"); 
$stmt->bindValue(':companyName', $supplierName, PDO::PARAM_STR);
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
    $view .= h($res["vali"]);
    $view .= "</td>";

    // $view .= "<td>";
    // $view .= h($res["companyName"]);
    // $view .= "</td>";

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
    $view .= h($res["fobPrice"]);
    $view .= "</td>";

    $id = h($res["id"]);
    // $indate = h($res["indate"]);
    // $vali = h($res["vali"]);
    // $companyName = h($res["companyName"]);
    // $grade = h($res["grade"]);
    // $finish = h($res["finish"]);
    // $cargoReadiness = h($res["cargoReadiness"]);
    // $cifPrice = h($res["cifPrice"]);

    $view .= "<td>";
    $view .="<form method=POST action=supplier_order.php>";
    $view .="<input type=hidden name=id value=$id>"; 
    // $view .="<input type=hidden name=indate value=$indate>"; 
    // $view .="<input type=hidden name=vali value=$vali>"; 
    // $view .="<input type=hidden name=companyName value=$companyName>"; 
    // $view .="<input type=hidden name=grade value=$grade>"; 
    // $view .="<input type=hidden name=finish value=$finish>"; 
    // $view .="<input type=hidden name=cargoReadiness value=$cargoReadiness>"; 
    // $view .="<input type=hidden name=cifPrice value=$cifPrice>"; 
    $view .="<input type=submit value=Orders>"; 
    $view .="</form>";
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
        <a href="./customer_order_record.php">Order Record</a>
        <a href="./login.php">Logout</a>
        <h2>Offere Record</h2>
    </header>    

    <!--検索画面 -->
    <div id = serch>

        <!-- 絞り込み -->
        <!-- <nav>
            <p>使用機会</p>
                <select id="oSelect">
                    <option value="">全て</del></option>
                    <option value="会食（夕食）">会食（夕食）</option>
                    <option value="会食（昼食）">会食（昼食）</option>
                    <option value="社内イベント">社内イベント</option>
                    <option value="合コン">合コン</option>
                </select>
            <p>価格帯</p>
                <select id="pSelect">
                    <option value="">全て</option>
                    <option value="5000円以下">5000円以下</option>
                    <option value="5000円超～1万円以下">5000円超～1万円以下</option>
                    <option value="1万円超">1万円超</option>
                </select>
            <p>ジャンル</p>
                <select id="gSelect">
                    <option value="">全て</option>
                    <option value="焼肉">焼肉</option>
                    <option value="焼き鳥">焼き鳥</option>
                    <option value="寿司">寿司</option>
                    <option value="居酒屋">居酒屋</option>
                    <option value="イタリアン">イタリアン</option>
                    <option value="中華">中華</option>
                    <option value="その他">その他</option>    
                </select>
        </nav> -->

        <!-- 表 -->
        <div id="tableSpace"> 
        <table id ="output">
            <tr>
                <th >Offer Date</th>
                <th >Validity Date</th>
                <!-- <th >Supplier</th> -->
                <th >grade</th>
                <th >finish</th>
                <th >cargoReadiness</th>
                <th >FOB Price</th>
            </tr>

            <?=$view?>
        </table>
        </div>



</body>
</html>