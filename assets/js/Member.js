const GuildList = document.querySelectorAll(".ChannelList");
GuildList.forEach(guild=>{
  guild.addEventListener("click",async()=>{
    const guildId = item.dataset.itemId;
    if(!guildId.match(/\d{18,19}/g)) return;

    const res = await fetch("../module/Member.php",{
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(
        {
          "guildId": guidId 
        }
      )
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("メンバーを取得できませんでした");
    });

    document.getElementById("member").insertAdjacentHTML("beforeend",res);
});
});