var p1 = document.getElementById("password").value;
var p2 = document.getElementById("repassword").value;

var espacios = false;
var cont = 0;
//validar espcios
while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}

if (espacios) {
  alert ("La contraseña no puede contener espacios en blanco");
  return false;
}
//Validar que tengna algo
if (p1.length == 0 || p2.length == 0) {
  alert("Los campos de la password no pueden quedar vacios");
  return false;
}
//Validar que coincidan
if (p1 != p2) {
  alert("Las passwords deben de coincidir");
  return false;
} else {
  alert("Todo esta correcto");
  return true;
}
