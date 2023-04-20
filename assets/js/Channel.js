const ChannelList = document.querySelectorAll(".ChannelId");
ChannelList.forEach(channel=>{
  channel.addEventListener("click",async()=>{
    const channelId = channel.dataset.itemId;
    if(!channelId.match(/\d{18,19}/g)) return;

    const Messages = await fetch(`../module/Message.php?channelId=${channelId}`,{
      method: "GET",
      credentials: "include"
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("メッセージを取得できませんでした");
    });

    const ChannelName = await fetch(`../module/ChannelName.php?channelId=${channelId}`,{
      method: "GET",
      credentials: "include"
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("メッセージを取得できませんでした");
    });

    document.getElementById("messages").innerHTML = Messages;
    document.getElementById("ChannelName").innerHTML = ChannelName;

    ChannelList.forEach(channel=>{
      channel.classList.remove("active");
    });
    document.getElementById(channelId).classList.add("active")

    console.log("Loaded Message and ChannelName");
  });
});