const GuildList = document.querySelectorAll(".GuildId");
GuildList.forEach(guild=>{
  guild.addEventListener("click",async()=>{
    const guildId = guild.dataset.itemId;
    if(!guildId.match(/\d{18,19}/g)) return;

    const Channel = await fetch(`../module/Channel.php?guildId=${guildId}`,{
      method: "GET",
      credentials: "include"
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("チャンネルを取得できませんでした");
    });

    const Member = await fetch(`../module/Member.php?guildId=${guildId}`,{
      method: "GET",
      credentials: "include"
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("メンバーを取得できませんでした");
    });

    document.getElementById("ChannelList").innerHTML = Channel;
    document.getElementById("MemberList").innerHTML = Member;

    GuildList.forEach(guild=>{
        guild.classList.remove("active");
    });
    document.getElementById(guildId).classList.add("active");

    const script = document.querySelector("#LoadChannel script");
    if(!script){
      const newScript = document.createElement("script");
      newScript.src = "./assets/js/Channel.js";
      
      document.getElementById("LoadChannel").appendChild(newScript);
    }else{
      script.parentNode.removeChild(script);
      const newScript = document.createElement("script");
      newScript.src = "./assets/js/Channel.js";

      document.getElementById("LoadChannel").appendChild(newScript);
    }

    console.log("Loaded Channel and Member");
  });
});