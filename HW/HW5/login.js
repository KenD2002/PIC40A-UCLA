const username = document.getElementById("username");
const submit_button = document.getElementById("submit_button");



username.addEventListener("keyup", function(e){
    if(e.key === "Enter")
    {
        validate_username(username.value);
    }
});


submit_button.addEventListener("click", function(e){
    validate_username(username.value);
});



function validate_username(username) {
  let less_trig = false;
  let greater_trig = false;
  let space_trig = false;
  let comma_trig = false;
  let semic_trig = false;
  let eq_trig = false;
  let and_trig = false;
  let illegal_char_trig = false;

  let legal_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^*()-_+[]{}:'|`~<.>/?".split("");

  let log_str = "";

  if(username.length < 5)
  {
    less_trig = true;
  }
  if(username.length > 40)
  {
    greater_trig = true;
  }
  for(let i = 0; i < username.length; i ++)
  {
    switch(username[i])
    {
      case " ":
        space_trig = true;
        break;
      case ",":
        comma_trig = true;
        break;
      case ";":
        semic_trig = true;
        break;
      case "=":
        eq_trig = true;
        break;
      case "&":
        and_trig = true;
        break;
      default:
        break;
    }

    if(!legal_chars.includes(username[i]))
    {
      illegal_char_trig = true;
    }
  }

  let legal_trig = !(less_trig || greater_trig || space_trig || comma_trig || semic_trig || eq_trig || and_trig);
  if(legal_trig && (!illegal_char_trig))
  {
    document.cookie = `username=${username}; expires=${hours_in_future()}`;
    window.location.assign('index.html');
    return undefined;
  }

  if(legal_trig && illegal_char_trig)
  {
    alert("Username can only use characters from the following string:\nabcdefghijklmnopqrstuvwxyz\nABCDEFGHIJKLMNOPQRSTUVWXYZ\n0123456789\n!@#$%^*()-_+[]{}:'|`~<.>/?");
    return undefined;
  }

  if(less_trig)
  {
    log_str += "Username must be 5 characters or longer.\n";
  }
  if(greater_trig)
  {
    log_str += "Username must be 40 characters or shorter.\n";
  }
  if(space_trig)
  {
    log_str += "Username cannot contain spaces.\n";
  }
  if(comma_trig)
  {
    log_str += "Username cannot contain commas.\n";
  }
  if(semic_trig)
  {
    log_str += "Username cannot contain semicolons.\n";
  }
  if(eq_trig)
  {
    log_str += "Username cannot contain =.\n";
  }
  if(and_trig)
  {
    log_str += "Username cannot contain =.\n"
  }

  alert(log_str);
  return undefined;
}


function hours_in_future()
{
  let hours_in_future = new Date();
  hours_in_future.setMinutes(hours_in_future.getMinutes() + 60);
  return hours_in_future.toUTCString();
}

window.onload = function() {
  document.getElementById('username').value = get_username();
};