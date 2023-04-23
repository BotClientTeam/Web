<?php
	require_once __DIR__."/../lib/discord.php";
    require_once __DIR__."/../lib/convert.php";

	session_start();

    if(!isset($_SESSION["token"])||!isset($_GET["guildId"])){
        echo "<li>セッションが無効です</li>";
        return;
    }

    $channels = GuildChannels($_SESSION["token"],htmlspecialchars($_GET["guildId"]));
    if(!$channels){
        echo "<li>チャンネルが読み込めません</li>";
        return;
    }
?>

<?php foreach (TextChannel($channels) as $channel){ ?>
    <li class="ChannelId" id="<?= $channel["id"] ?>" data-item-id="<?= $channel["id"] ?>">
        #<?= htmlspecialchars($channel["name"]) ?>
    </li>
<?php } ?>