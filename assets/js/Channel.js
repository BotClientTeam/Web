const ChannelList = document.querySelectorAll(".ChannelList");
ChannelList.forEach(channel=>{
  channel.addEventListener("click",async()=>{
    const channelId = item.dataset.itemId;
    if(!channelId.match(/\d{18,19}/g)) return;

    const Message = await fetch("../module/Message.php",{
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(
        {
          "channelId": channelId 
        }
      )
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("メッセージを取得できませんでした");
    });

    const ChannelName = await fetch("../module/ChannelName.php",{
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(
        {
          "channelId": channelId 
        }
      )
    })
    .then(res=>res.text())
    .catch(error=>{
      console.error(error);
      alert("メッセージを取得できませんでした");
    });

    document.getElementById("messages").insertAdjacentHTML("beforeend",Message);
    document.getElementById("channel").insertAdjacentHTML("beforeend",Message);
  });
});