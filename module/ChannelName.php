<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"])||!isset($_GET["channelId"])){
        echo "<h3>セッションが無効</h3>";
        return;
    }

    $channel = GuildChannel($_SESSION["token"],htmlspecialchars($_GET["channelId"]));
    if(!$channel){
        echo "<h3>存在しないチャンネル</h3>";
        return;
    }
?>

<h3>
    #<?php $channel["name"] ?>
</h3>