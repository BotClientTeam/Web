<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"]||!isset($_POST["guildId"]))){
        echo "<div></div>";
        return;
    }

    $members = GuildMembers($_SESSION["token"],htmlspecialchars($_POST["guildId"]),50);
    if(!$channels){
        echo "<div></div>";
        return;
    }
?>

<ul>
    <?php foreach ($members as $member){ ?>
        <li class="MemberList" data-item-id="<?= $member["user"]["id"] ?>">
            <img src="https://cdn.discordapp.com/avatars/<?= $member["user"]["id"] ?>/<?= $member["user"]["avatar"] ?>.png" alt="メンバーアバター">
            <span><?= $member["user"]["username"] ?>#<?= $member["user"]["discriminator"] ?></span>
        </li>
    <?php } ?>
</ul>