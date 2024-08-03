const header = document.getElementById("header");

const password = document.getElementById("password");

const submit_button = document.getElementById("submit_button");

const append_p = function(){
	const new_p = document.createElement('p');
    const new_t = document.createTextNode(`Somebody knows the password you like to use is `);
    const new_bold = document.createElement('b');
    new_bold.innerHTML = `${password.value}`;
    const new_period = document.createTextNode(".");
    new_p.appendChild(new_t);
    new_p.appendChild(new_bold);
    new_p.appendChild(new_period);
    const section_1 = document.getElementsByTagName("section")[0];
    section_1.appendChild(new_p);
}



let count = 0;

password.addEventListener("keyup", function(e){
    if(e.key === "Enter")
    {
    		count ++;
    		header.innerHTML = "HA".repeat(count);
        append_p();
    }
});

submit_button.addEventListener("click", function(e){
		count ++;
    header.innerHTML = "HA".repeat(count);
    append_p();
});