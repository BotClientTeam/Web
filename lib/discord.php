<?php
    require_once __DIR__."/Rest.php";
    
    $GLOBALS["API_URL"] = "https://apibc.harukoto.jp";
    
    /**
     * @param String Discord認証トークン
     * @return Boolean トークンが有効か
     */
    function Check($token){
        $res = Post($GLOBALS["API_URL"]."/check",array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"]["login"];
    }

    /**
     * @param String Discord認証トークン
     * @return Object BOTの情報
     */
    function Account($token){
        $res = Post($GLOBALS["API_URL"]."/account",array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake ユーザーID
     * @return Object ユーザーの情報
     */
    function User($token,$userID){
        $res = Post($GLOBALS["API_URL"]."/users/".$userId,array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @return Array ギルドの一覧
     */
    function Guilds($token){
        $res = Post($GLOBALS["API_URL"]."/guilds",array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @return Object ギルドの情報
     */
    function Guild($token,$guildId){
        $res = Post($GLOBALS["API_URL"]."/guilds/".$guildId,array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake ギルドID
     * @param Number メンバー取得数
     * @return Array ギルドメンバーの一覧
     */
    function GuildMembers($token,$guildId,$limit){
        $res = Post($GLOBALS["API_URL"]."/guilds/".$guildId."/members?limit=".$limit,array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake ギルドID
     * @param Snowflake ユーザーID
     * @return Object ギルドメンバーの一覧
     */
    function GuildMember($token,$guildId,$userId){
        $res = Post($GLOBALS["API_URL"]."/guilds/".$guildId."/members/".$userId,array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake ギルドID
     * @return Array チャンネルの一覧
     */
    function GuildChannels($token,$guildId){
        $res = Post($GLOBALS["API_URL"]."/guilds/".$guildId."/channels",array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake チャンネルID
     * @return Object チャンネルの情報
     */
    function GuildChannel($token,$channelId){
        $res = Post($GLOBALS["API_URL"]."/channels/".$channelId,array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake チャンネルID
     * @return Array チャンネルのメッセージ一覧
     */
    function ChannelMessages($token,$channelId){
        $res = Post($GLOBALS["API_URL"]."/channels/".$channelId."/messages",array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake チャンネルID
     * @param Snowflake メッセージID
     * @return Object チャンネルのメッセージの情報
     */
    function ChannelMessage($token,$channelId,$messageId){
        $res = Post($GLOBALS["API_URL"]."/channels/".$channelId."/messages/".$messageId,array(
            "token" => $token
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }

    /**
     * @param String Discord認証トークン
     * @param Snowflake チャンネルID
     * @param Object メッセージ
     * @return Object 送信したメッセージの情報
     */
    function CreateMessage($token,$channelId,$message){
        $res = Post($GLOBALS["API_URL"]."/channels/".$channelId."/message",array(
            "token" => $token,
            "message" => $message
        ));

        if(!$res["success"]) return false;

        return $res["data"];
    }
?>
