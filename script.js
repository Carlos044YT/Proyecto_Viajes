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
