const prices = [100, 13, 16.20, 10.05];
const spans = document.getElementsByTagName("span");
const images = document.getElementsByTagName("img");
const checkboxes = document.getElementsByTagName("input");
const checkout_btn = document.getElementById("Checkout");
const credit_para = document.getElementsByTagName("p")[1];
const coupon_box = document.getElementById("coupon");
const last_para = document.getElementsByTagName("p")[6];

let credit = credit_para.innerHTML.trim().substring(14);


// Add 6 event listeners. 
function update_credit() 
{
  let sum_tax = get_tax();
  credit -= sum_tax;

  const request = new XMLHttpRequest();

  request.onload = function()
  {
    if (this.status === 200) {
      credit_para.innerHTML = `Your Credit: $${credit.toFixed(2)}`;
    }
  };

  request.open('POST', 'money.php');
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  request.send(`credit=${credit}`);
}


function validate_coupon_code(code)
{
  if(coupon_box.value === "COUPON5")
  {
    credit += 5;
  }
  else if(coupon_box.value === "COUPON10")
  {
    credit += 10;
  }
  else if(coupon_box.value === "COUPON20")
  {
    credit += 20;
  }
  coupon_box.value = "";
}


function sales_total(arr)
{
  // Calculate the price from only the checked checkboxes
  let sum_raw = get_raw();

  // Calculate the price with tax
  let sum_tax = get_tax();

  // Check if you have insufficient credit 
  if(sum_tax > credit)
  {
    alert("You have insufficient credit for this purchase.");
    coupon_box.value = "";
    last_para.innerHTML = "";
    return undefined;
  } 
  else
  {
    // Otherwise update your credit
    update_credit();
    // Change checked boxes to be disabled. 
    // Also, check if there are no checked boxes (no displayed message).
    let has_checked = 0;
    for(let i = 0; i < 4; i ++)
    {
      if(checkboxes[i].checked)
      {
        checkboxes[i].checked = !checkboxes[i].checked;
        checkboxes[i].disabled = true;
        has_checked ++;
      }
    }

    // Update the message in the bottom <p> element. 
    if(has_checked)
    {
      last_para.innerHTML = `&nbsp&nbsp\$${sum_raw.toFixed(2)}<br>+ sales tax (7.25%)<br>= $${sum_tax}`;
    }
    else
    {
      last_para.innerHTML = "";
    }
  }
  return undefined;
}


// implement enter coupon box
coupon_box.addEventListener("keyup", function(e){
  if(e.key === "Enter")
  {
    validate_coupon_code();
    sales_total();
  }
})


// implement click checkout button
checkout_btn.addEventListener("click", function(){
  validate_coupon_code();
  sales_total();
})


// implement image click
for(let i = 0; i < 4; i ++)
{
  images[i].addEventListener("click", function(){
    if(!checkboxes[i].disabled)
    {
      checkboxes[i].checked = !checkboxes[i].checked;
    }
  })
}


// initialize page
function show_price(){
  for(let i = 0; i < 4; i ++)
  {
    spans[i].innerHTML = ` $${prices[i].toFixed(2)}`;
  }
}

update_credit();
show_price();


// getters for expenses
function get_raw()
{
  let sum_raw = 0;
  for(let i = 0; i < 4; i ++)
  {
    if(checkboxes[i].checked)
    {
      sum_raw += prices[i];
    }
  }
  return sum_raw;
}

function get_tax()
{
  let sum_raw = get_raw();
  let sum_tax = sum_raw * 1.0725; 
  sum_tax = (sum_tax * 1000).toFixed(0); // thus the last digit is the thousands

  if (!(sum_tax % 5) && (sum_tax % 10)) // if halfway
  {
    if((sum_tax - 5) % 20) // odd
    {
      sum_tax = ((sum_tax + 5)/1000).toFixed(2);
    }
    else // even
    {
      sum_tax = ((sum_tax - 5)/1000).toFixed(2);
    }
  }
  else
  {
    sum_tax = (sum_tax/1000).toFixed(2);
  }
  return sum_tax;
}










  