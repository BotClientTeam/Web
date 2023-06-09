<?php
	require_once __DIR__."/../lib/discord.php";
    require_once __DIR__."/../lib/convert.php";

    date_default_timezone_set("Asia/Tokyo");
	session_start();

    if(!isset($_SESSION["token"])||!isset($_GET["channelId"])){
        echo "<div>セッションが無効</div>";
        return;
    }

    $messages = ChannelMessages($_SESSION["token"],htmlspecialchars($_GET["channelId"]));
    if(!$messages){
        echo "<div>メッセージが読み込めません</div>";
        return;
    }
?>

<?php foreach (array_reverse($messages) as $message){ ?>
    <div class="message" id="<?= $message["id"] ?>">
        <img src="<?= AvatarURL($message["author"]["id"],$message["author"]["avatar"]) ?>" alt="アバター" class="avatar">
        <div class="content">
            <p>
                <span class="username"><?= htmlspecialchars($message["author"]["username"]) ?>#<?= $message["author"]["discriminator"] ?></span>
                <br>
                <?= htmlspecialchars($message["content"]) ?>
            </p>
        </div>
        <div class="timestamp"><?= date("m/d H:i:s",strtotime($message["timestamp"])) ?></div>
    </div>
<?php } ?>