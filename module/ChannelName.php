<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"]||!isset($_POST["channelId"]))){
        echo "<h3></h3>";
        return;
    }

    $channel = GuildChannel($_SESSION["token"],htmlspecialchars($_POST["channelId"]));
    if(!$channel){
        echo "<h3></h3>";
        return;
    }
?>

<h3>
    #<?php $channel["name"] ?>
</h3>