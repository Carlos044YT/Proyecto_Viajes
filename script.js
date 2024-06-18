// mad js
function OpenInstagram(){
    window.location.href = "https://www.instagram.com/ayalas_transportes_queretaro/";
}

function OpenFacebook(){
    window.location.href = "https://www.facebook.com/profile.php?id=61560878635444";
}

function OpenWhatsapp(){
    window.location.href = "https://wa.me/+524422045904";
}

function OpenGmail(){
    var correo = "ayalastransportes@gmail.com"; // Aquí va tu dirección de correo
            navigator.clipboard.writeText(correo).then(function() {
                alert("Correo copiado al portapapeles: " + correo);
            }, function(err) {
                console.error('No se pudo copiar el correo: ', err);
            });
}

//muertito js
const fondo = document.querySelector(".fondo");
const loginlink = document.querySelector(".login-link");
const registrarlink = document.querySelector(".registrar-link");
const btn = document.querySelector(".btn");
const iconocerrar = document.querySelector(".icono-cerrar");

// Permite ir a la sección de registrarse
registrarlink.addEventListener("click",() =>{
    fondo.classList.add('active');
});

// Permite regresar al login
loginlink.addEventListener("click", () =>{
    fondo.classList.remove('active');
});

// Mostrar el formulario de login
btn.addEventListener("click", () =>{
    fondo.classList.add('active-btn');
});

// Permitir al usuario cerrar el formulario
iconocerrar.addEventListener("click", () =>{
    fondo.classList.remove('active-btn');
});

document.addEventListener("DOMContentLoaded", function() {
    const fondo1 = document.querySelector(".fondo");
    const iconocerrar1 = document.querySelector(".icono-cerrar");

    // Mostrar el formulario de login al cargar la página
    fondo1.classList.add('active-btn');

    // Permitir al usuario cerrar el formulario
    iconocerrar1.addEventListener("click", () => {
        fondo1.classList.remove('active-btn');
    });
});
