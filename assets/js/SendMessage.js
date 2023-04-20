const Input = document.getElementById("sendInput");
const button = document.getElementById("sendButton");

Input.addEventListener("submit",()=>{
  event.preventDefault();
});

button.addEventListener("click",()=>{
  if(!Input.value) return;

  const Channel = document.querySelector("#ChannelList .active");
  if(!Channel) return;

  await fetch(`../module/CreateMessage.php?channelId=${Channel.id}&message=${Input.value}`,{
    method: "GET",
    credentials: "include"
  })
  .catch(error=>{
    console.error(error);
    alert("メッセージを送信できませんでした");
  });

  const Messages = await fetch(`../module/Message.php?channelId=${Channel.id}`,{
    method: "GET",
    credentials: "include"
  })
  .then(res=>res.text())
  .catch(error=>{
    console.error(error);
    alert("メッセージを取得できませんでした");
  });

  document.getElementById("messages").innerHTML = Messages;

  console.log("Send Message");
});