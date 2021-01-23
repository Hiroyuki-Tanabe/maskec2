<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>ログイン</title>
</head>

<body>

    <ul>
    <a href="./select.php" id="brand">Mask gallary</a>
    <nav>
        <ul>
        <a href="./select_buy.php" class="nav_item">マスクを買う</a>
        <a href="./upload_form.php" class="nav_item">マスクを売る</a>
        </ul>
    </nav>
    <form id="form1" action="#" method="post">
        <input id="sbox"  id="s" name="search" type="text" placeholder="ここでは検索できません" />
        <input id="sbtn" type="submit" value="検索" />
    </form>
    <a href="./login.php" class="nav_item">ログイン</a>
    <a href="./logout.php" class="nav_item">ログアウト</a>
    </ul>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form name="form1" action="login_act.php" method="post" id="login_form">
        <div class="login">ID: <input type="text" name="lid" /></div><br>
        <div class="login">PW: <input type="password" name="lpw" /></div><br>
        <div class="login"><input type="submit" value="LOGIN" /></div>
    </form>


</body>

</html>
