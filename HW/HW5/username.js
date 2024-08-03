function get_username(){
    const nvs = document.cookie.split(";");

    for(const nv of nvs)
    {
        if(nv.startsWith("username="))
        {
            return nv.substring("username=".length);
        }
    }

    return "";
}



if(window.location.pathname === "/~dengken1/HW5/index.html")
{
    const greeting = document.getElementById("greeting");

    if(!get_username())
    {
        window.location.assign("login.html");
    }
    else
    {
        greeting.innerHTML = `Hello, ${get_username()}!`;
    }
}
