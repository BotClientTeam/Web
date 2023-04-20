<?php
	require_once __DIR__."/../lib/discord.php";

    date_default_timezone_set("Asia/Tokyo");
	session_start();

    if(!isset($_SESSION["token"]||!isset($_POST["channelId"]))){
        echo "<div></div>";
        return;
    }

    $messages = ChannelMessages($_SESSION["token"],htmlspecialchars($_POST["channelId"]));
    if(!$messages){
        echo "<div></div>";
        return;
    }
?>

<?php foreach ($messages as $message){ ?>
    <div class="message" id="<?= $message["id"] ?>">
        <img src="https://cdn.discordapp.com/avatars/<?= $message["author"]["id"] ?>/<?= $message["author"]["avatar"] ?>.png" alt="アバター" class="avatar">
        <div class="content">
            <p><span class="username"><?= $message["author"]["username"] ?>#<?= $message["author"]["discriminator"] ?>:</span><?= $message["content"] ?></p>
        </div>
        <div class="timestamp"><?= date("m/d H:i",$message["timestamp"]) ?></div>
    </div>
<?php } ?>