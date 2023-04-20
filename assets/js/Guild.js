const GuildList = document.querySelectorAll(".ChannelList");
GuildList.forEach(guild=>{
  guild.addEventListener("click",async()=>{
    const guildId = item.dataset.itemId;
    if(!guildId.match(/\d{18,19}/g)) return;

    const channel = await fetch("../module/Channel.php",{
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(
        {
          "guildId": guildId 
        }
      )
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("チャンネルを取得できませんでした");
    });

    document.getElementById("channel").insertAdjacentHTML("beforeend",channel);
});
});