<?php
	require_once __DIR__."/../lib/discord.php";

    date_default_timezone_set("Asia/Tokyo");
	session_start();

    if(!isset($_SESSION["token"])||!isset($_GET["channelId"])){
        echo "<div>セッションが無効</div>";
        return;
    }

    $messages = ChannelMessages($_SESSION["token"],htmlspecialchars($_GET["channelId"]));
    if(!$messages){
        echo "<div>存在しないチャンネル</div>";
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