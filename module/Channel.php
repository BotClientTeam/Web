<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"]||!isset($_POST["guildId"]))){
        echo "<li></li>";
        return;
    }

    $channels = GuildChannels($_SESSION["token"],htmlspecialchars($_POST["guildId"]));
    if(!$channels){
        echo "<li></li>";
        return;
    }
?>

<?php foreach ($channels as $channel){ ?>
    <li class="ChannelId" id="<?= $channel["id"] ?>" data-item-id="<?= $channel["id"] ?>">
        #<?= $channel["name"] ?>
    </li>
<?php } ?>