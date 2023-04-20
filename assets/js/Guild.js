const GuildList = document.querySelectorAll(".GuildId");
GuildList.forEach(guild=>{
  guild.addEventListener("click",async()=>{
    const guildId = item.dataset.itemId;
    if(!guildId.match(/\d{18,19}/g)) return;

    const Channel = await fetch("../module/Channel.php",{
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

    const Member = await fetch("../module/Member.php",{
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
      alert("メンバーを取得できませんでした");
    });

    document.getElementById("ChannelList").innerHTML = Channel;
    document.getElementById("MemberList").innerHTML = Member;
});
});