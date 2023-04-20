<?php
	require_once __DIR__."/../lib/discord.php";

	session_start();

    if(!isset($_SESSION["token"])||!isset($_GET["channelId"])||!isset($_GET["message"])) return;

    $messages = CreateMessage($_SESSION["token"],htmlspecialchars($_GET["channelId"]),array(
        "content"=>htmlspecialchars($_GET["message"])
    ));
?>