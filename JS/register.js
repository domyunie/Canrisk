document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const nameInput = document.getElementById("name");
  const usuarioInput = document.getElementById("usuario");
  const contrasenaInput = document.getElementById("contrasena");

  let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const name = nameInput.value.trim();
    const usuario = usuarioInput.value.trim();
    const contrasena = contrasenaInput.value.trim();

    if (!validarNombre(name)) return;
    if (!validarUsuario(usuario)) return;
    if (!validarContrasena(contrasena)) return;

    const usuarioExiste = usuarios.find((u) => u.usuario === usuario);
    if (usuarioExiste) {
      alert("Ese nombre de usuario ya está en uso. Elige otro.");
      usuarioInput.focus();
      return;
    }

    const nuevoUsuario = {
      id: Date.now(),
      nombre: name,
      usuario: usuario,
      contrasena: contrasena,
      fechaRegistro: new Date().toLocaleDateString("es-ES"),
    };

    usuarios.push(nuevoUsuario);
    localStorage.setItem("usuarios", JSON.stringify(usuarios));

    console.log("📋 Usuarios registrados:", usuarios);
    alert(`¡Registro exitoso! Bienvenido, ${name} 🎉`);

    const isEnglish = window.location.pathname.includes("/INGLES/");
    window.location.href = isEnglish ? "loginING.php" : "login.php";
  });

  function validarNombre(name) {
    if (name.length < 3) {
      alert("El nombre debe tener al menos 3 caracteres.");
      nameInput.focus();
      return false;
    }
    return true;
  }

  function validarUsuario(usuario) {
    const regex = /^[a-zA-Z0-9_]{4,20}$/;
    if (!regex.test(usuario)) {
      alert(
        "El usuario debe tener entre 4 y 20 caracteres (letras, números o guión bajo).",
      );
      usuarioInput.focus();
      return false;
    }
    return true;
  }

  function validarContrasena(contrasena) {
    if (contrasena.length < 6) {
      alert("La contraseña debe tener al menos 6 caracteres.");
      contrasenaInput.focus();
      return false;
    }
    return true;
  }
});
