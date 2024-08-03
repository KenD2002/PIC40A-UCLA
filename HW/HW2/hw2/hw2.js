/**
Returns the sales total including a 
7.25% sales tax on the total sale. 

Note that sales tax is rounded normally with one exception...
Bankers rounding rounds the half-cent conditionally. 
If the cent value of the tax total is odd, the 0.5 (half-cent) rounds upwards; 
If the cent value is even, the half-cent rounds it downwards.
So $0.065 is rounded to $0.06 but $0.075 is rounded to $0.08.
Banker's rounding only takes place on the tax value. 

@return {string} The receipt of items with tax. 
*/
function sales_total(arr) {
  let sum_raw = 0;
  for(let i = 0; i < arr.length; i ++)
  {
    sum_raw += arr[i];
  }
  let sum_tax = sum_raw * 1.0725; 
  sum_tax *= 1000000; // thus sum_tax is an integer

  if (!(sum_tax % 5000) && (sum_tax % 10000)) // if halfway
  {
    if((sum_tax - 5000) % 20000) // odd
    {
      sum_tax = ((sum_tax + 5000)/1000000).toFixed(2);
    }
    else // even
    {
      sum_tax = ((sum_tax - 5000)/1000000).toFixed(2);
    }
  }
  else
  {
    sum_tax = (sum_tax/1000000).toFixed(2);
  }

  let result = `  \$${sum_raw.toFixed(2)}\n+ sales tax (7.25%)\n= $${sum_tax}`;

  return result;
}






/**
This function extracts from a given cookie
the 'value' corresponding to the 'name' "username".

For example, both of the following function calls return "bur=nett":
. extract_username("first_name=Sarah; last_name=Burnett; username=bur=nett");
. extract_username("username=bur=nett; first_name=Sarah; last_name=Burnett");

If the given cookie has no 'name' called "username",
then the function returns the empty string.

For example, we have
. extract_username("common_error=Sara; " + 
                   "another_one=Burnet; another=Sarah_Brunette") === "";

@param  {string} cookie : The cookie to extract information from.
@return {string} The 'value' corresponding to the 'name' "username";
                 the empty string if "username" is not a 'name'.
*/
function extract_username(cookie) {

  let ret_usrname = "";

  let cookie_elems = cookie.split(" ");

  for(let i = 0; i < cookie_elems.length; i ++)
  {
    if(cookie_elems[i].substring(0, 8) === "username")
    {
      ret_usrname = cookie_elems[i].slice(9, -1);
    }
  }

  return ret_usrname;
}


/**
 This function validates a username.
 A string should be printed to the console after the username is evaluated.
 It'll be determined acceptable or relavent username errors will be printed.
 String formatting details are outlined in hw2.pdf.

 @param  {string} username : The username to validate.
 */

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
    console.log(`The username ${username} is acceptable.`);
    return undefined;
  }

  if(legal_trig && illegal_char_trig)
  {
    console.log("Username can only use characters from the following string:\nabcdefghijklmnopqrstuvwxyz\nABCDEFGHIJKLMNOPQRSTUVWXYZ\n0123456789\n!@#$%^*()-_+[]{}:'|`~<.>/?");
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

  console.log(log_str);
  return undefined;
}



validate_username("=====,;");