<?php
    function is_animated($image){
        if(substr($image,0,2) == "a_"){
            return ".gif";
        }else{
            return ".png";
        }
    }

    function IconURL($guildId,$hash){
        if($hash){
            return "https://cdn.discordapp.com/icons/".$guildId."/".$hash.is_animated($hash);
        }else{
            return "https://cdn.discordapp.com/embed/avatars/0.png";
        }
    }

    function AvatarURL($userId,$hash){
        if($hash){
            return "https://cdn.discordapp.com/avatars/".$userId."/".$hash.is_animated($hash);
        }else{
            return "https://cdn.discordapp.com/embed/avatars/0.png";
        }
    }
?>