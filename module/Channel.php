<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"])||!isset($_GET["guildId"])){
        echo "<li>セッションが無効です</li>";
        return;
    }

    $channels = GuildChannels($_SESSION["token"],htmlspecialchars($_GET["guildId"]));
    if(!$channels){
        echo "<li>存在しないサーバー</li>";
        return;
    }
?>

<?php foreach ($channels as $channel){ ?>
    <li class="ChannelId" id="<?= $channel["id"] ?>" data-item-id="<?= $channel["id"] ?>">
        #<?= $channel["name"] ?>
    </li>
<?php } ?>