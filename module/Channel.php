<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"]||!isset($_POST["guildId"]))){
        echo "<div></div>";
        return;
    }

    $channels = GuildChannels($_SESSION["token"],htmlspecialchars($_POST["guildId"]));
    if(!$channels){
        echo "<div></div>";
        return;
    }
?>

<ul>
    <?php foreach ($channels as $channel){ ?>
        <li class="ChannelList" data-item-id="<?= $channel["id"] ?>">#<?= $channel["name"] ?></li>
    <?php } ?>
</ul>