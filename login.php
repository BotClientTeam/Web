<?php 
	require_once __DIR__."/lib/discord.php";

	session_start();

    if(isset($_POST["token"])){
        $res = Check(htmlspecialchars($_POST["token"]));

        if($res){
            $_SESSION["token"] = htmlspecialchars($_POST["token"]);
            header("Location: ./");
        }else{
            echo "<script type='text/javascript'>alert('ログインに失敗しました 有効なTokenを使用してください');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <noscript>
            <meta http-equiv="refresh" content="0;URL=error/noscript.html">
        </noscript>

        <title>BOT Client</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/login.css">

        <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon-16x16.png">
        <link rel="manifest" href="./assets/img/site.webmanifest">
        <link rel="mask-icon" href="./assets/img/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="./assets/img/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="./assets/img/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/ fb# prefix属性: https://ogp.me/ns/ prefix属性#">
        <meta property="og:url" content="https://app.gakerbot.net/" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="ログイン" />
        <meta property="og:description" content="Made By BOT Client Team" />
        <meta property="og:site_name" content="BOT Client" />
        <meta property="og:image" content="https://app.gakerbot.net/assets/img/favicon.ico" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="BOT Client Team">
        <meta name="keywords" content="BOT,テクノロジー">
    </head>
    <body>
        <main>
            <form id="LoginForm" action="./login" method="post">
                <input class="form-control" id="TokenInput" name="token" type="text" placeholder="BOTのトークンを入力してください" autocomplete="off">
            </form>
        </main>
        <script src="./assets/js/TokenCheck.js"></script>
    </body>
</html>