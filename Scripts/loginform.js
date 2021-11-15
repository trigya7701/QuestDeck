function Signin()
{
    var signin=document.getElementById("signup");
    const container=document.getElementById("main");
    container.classList.remove("not-active");
    console.log(container);
    container.classList.remove("now");
    container.classList.add("active");
    console.log(signin);
    setTimeout(function()
    {
        container.classList.add("now");
    },1450);
}
function signup()
{
    var signup=document.getElementById("signin");
    const container=document.getElementById("main");
    container.classList.add("not-active");
    container.classList.remove("now");
    container.classList.remove("active");
    setTimeout(function()
    {
        main.classList.add("now");
    },1450);
    console.log(signup);
}