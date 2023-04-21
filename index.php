<?php
	require_once __DIR__."/lib/discord.php";

	session_start();

	if(!isset($_SESSION["token"])){
		header("Location: ./login");
	}

	$guilds = Guilds($_SESSION["token"]);
	if(!$guilds){
		echo "<script type='text/javascript'>alert('サーバー一覧が取得できません ログインしなおしてください');</script>";
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

		<title>Discord BOT Client</title>

		<link rel="stylesheet" href="./assets/css/app.css">

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
		<meta property="og:title" content="アプリ" />
		<meta property="og:description" content="Made By Discord BOT Client Team" />
		<meta property="og:site_name" content="Discord BOT Client" />
		<meta property="og:image" content="https://app.gakerbot.net/assets/img/favicon.ico" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Discord BOT Client Team">
		<meta name="keywords" content="Discord,BOT">
	</head>
	<body>
		<div id="content">
      		<div id="server">
        		<h3>SERVER</h3>
				<ul>
					<?php foreach ($guilds as $guild){ ?>
        				<li class="GuildId" id="<?= $guild["id"] ?>" data-item-id="<?= $guild["id"] ?>">
							<img src="https://cdn.discordapp.com/icons/<?= $guild["id"] ?>/<?= $guild["icon"] ?>.png" alt="サーバーアイコン">
            				<span><?= $guild["name"] ?></span>
						</li>
    				<?php } ?>
				</ul>
      		</div>  
      		<div id="channel">
        		<h3>CHANNEL</h3>
				<ul id="ChannelList">
					<!-- Channel List -->
				</ul>
	    	</div>
      		<div id="main">
        		<header id="ChannelName">
          			<!-- Channel Name -->
       	 		</header>
        		<div id="messages">
        			<!-- Message -->
        		</div>
        		<footer>
          			<input id="SendInput" type="text" placeholder="メッセージを送信">
          			<button id="SendButton">送信</button>
        		</footer>
      		</div>
      		<div id="member">
        		<h3>MEMBER</h3>
				<ul id="MemberList">
					<!-- Member List -->
				</ul>
      		</div>
    	</div>
		<div id="LoadChannel">
			<script src="./assets/js/load.js"></script>
		</div>
		<script src="./assets/js/load.js"></script>
		<script src="./assets/js/SendMessage.js"></script>
		<script src="./assets/js/Guild.js"></script>
	</body>
</html>