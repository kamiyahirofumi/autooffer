<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">Supplier Login</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
Email Address:<input type="text" name="emailAddress" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>

<a href="supplier_register.php">Supplier Registeration</a>

<div></div>

<header>
  <nav class="navbar navbar-default">Customer Login</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form2" action="login_act2.php" method="post">
Email Address:<input type="text" name="emailAddress" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>

<a href="customer_register.php">Customer Registeration</a>

</body>
</html>