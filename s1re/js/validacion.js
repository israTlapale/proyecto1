document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("miFormulario");

    formulario.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        // Obtiene el valor de los campos 1 y 2
        const usuario = document.getElementById("usuario").value;
        const contraseña = document.getElementById("contraseña").value;

        // Verifica si los valores son "1" y "2"
        if (usuario === "Capitan" && contraseña === "Maravatio") {
            // Redirige al usuario a un enlace
            window.location.href = "../panel-admin.php";
        } else {
            alert("Contraseña Incorrecta");
        }
    });
});
