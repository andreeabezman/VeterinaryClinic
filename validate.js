function validation(){
var name = document.getElementById("username").value;
var password = document.getElementById("password").value;
var form = document.getElementById("myform").value;
var errorElement = document.getElementById("error-message");
var text;

error_message.style.padding= "10px";
if (name.length<1){
    text = "please enter valid username";
    error_message.innerHTML = text;
    return false;
}
if (password.length<1){
    text = "empty pass";
    error_message.innerHTML = text;
}

return false;
}


    function check_empty_field()         // This is called when the submit
    {                                    // button is pressed
      if (name == "" || password == "")
      {
        alert("Please fill in the password or login field.");
        return false;                    // This doesn't submit the form
      }
      else
      {
        return true;                     // This submits the form
      }
    }