const LoginForm = document.getElementById("LoginForm");
const TokenInput = document.getElementById("TokenInput");

LoginForm.addEventListener("submit",async()=>{
    if(
      !TokenInput.value.match(/[0-9a-zA-Z_-]{24}\.[0-9a-zA-Z_-]{6}\.[0-9a-zA-Z_-]{38}/)||
      !TokenInput.value.match(/[0-9a-zA-Z_-]{24}\.[0-9a-zA-Z_-]{6}\.[0-9a-zA-Z_-]{27}/)
    ){
      event.preventDefault();
      alert("BOTのTokenを入力してください");
    }else{
      try{
        const res = await fetch("https://api.gakerbot.net/check",{
          "method": "POST",
          "headers": {
            "Content-type": "application/json"
          },
          "body": JSON.stringify({
          "token": TokenInput.value
          })
        })
        .then(res=>res.json());
        
        console.log("Fetch API: /check")

        if(res.error){
          event.preventDefault();
          console.log(`API Error: ${res.error}`);
          alert(res.error);
        }else if(!res.data.login){
          event.preventDefault();
          alert("Tokenが有効ではありません");
        }
      }catch(error){
        event.preventDefault();
        console.log(error);
        alert(error);
      }
    }
});