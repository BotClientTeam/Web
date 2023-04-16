const LoginForm = document.getElementById("LoginForm");
const TokenInput = document.getElementById("TokenInput");

LoginForm.addEventListener("submit",async(event)=>{
  if(
    !TokenInput.value.match(/[0-9a-zA-Z_-]{24}\.[0-9a-zA-Z_-]{6}\.[0-9a-zA-Z_-]{38}/)||
    !TokenInput.value.match(/[0-9a-zA-Z_-]{24}\.[0-9a-zA-Z_-]{6}\.[0-9a-zA-Z_-]{27}/)
  ){
    event.preventDefault();
    TokenInput.value = "";
    alert("BOTのTokenを入力してください");
  }
});