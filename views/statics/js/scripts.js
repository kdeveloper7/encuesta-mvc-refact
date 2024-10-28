document.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
});

function validarFormularioRegistro() {
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const dni = document.getElementById('dni').value;
    const contraseña = document.getElementById('contraseña').value;

    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regexDNI = /^\d{8}[A-Z]$/; // Ejemplo para DNI español

    if (!regexCorreo.test(correo)) {
        alert('Por favor, introduce un correo electrónico válido.');
        return false;
    }

    if (!regexDNI.test(dni)) {
        alert('Por favor, introduce un DNI válido.');
        return false;
    }

    if (contraseña.length < 6) {
        alert('La contraseña debe tener al menos 6 caracteres.');
        return false;
    }

    return true;
}
