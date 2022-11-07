document.getElementById("btn__register").addEventListener("click", register);
document.getElementById("btn__login").addEventListener("click", login);
window.addEventListener("resize", widthPage)

//Declaración de las variables
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var back_box_login = document.querySelector(".back__box-login");
var back_box_register = document.querySelector(".back__box-register");

//Funciones login y register
function login(){
    if(window.innerWidth > 850){
    formulario_register.style.display = "none";
    contenedor_login_register.style.left = "10px";
    formulario_login.style.display = "block";
    back_box_register.style.opacity ="1";
    back_box_login.style.opacity ="0";
    } else {
    formulario_register.style.display = "none";
    contenedor_login_register.style.left = "0px";
    formulario_login.style.display = "block";
    back_box_register.style.display ="block";
    back_box_login.style.display ="none";
    }
}
function register(){
    if(window.innerWidth > 850){
    formulario_register.style.display = "block";
    contenedor_login_register.style.left = "410px";
    formulario_login.style.display = "none";
    back_box_register.style.opacity ="0";
    back_box_login.style.opacity ="1";
} else {
    formulario_register.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_login.style.display = "none";
    back_box_register.style.display ="none";
    back_box_login.style.display ="block";
    back_box_login.style.opacity = "1";
    }
}

//Para el redimensionado de la ventana
function widthPage(){
    if(window.innerWidth > 850){
        back_box_login.style.display = "block";
        back_box_register.style.display = "block";
    } else {
        back_box_register.style.display = "block";
        back_box_register.style.opacity = "1";
        back_box_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        }
}