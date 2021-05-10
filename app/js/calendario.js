document.getElementById("fecha").addEventListener("change", function () {
  var dia = this.value;
  localStorage.setItem("dia", dia);
  console.log(dia);
  fetch("../food/alimentos.php", {
    method: "POST",
    body: dia,
  });
  document.getElementById("envia").submit();
});

window.addEventListener("load", function () {
  var dia = this.localStorage.getItem("dia");
  if (dia != null) {
    document.getElementById("fecha").value = dia;
    console.log(dia);
    this.localStorage.removeItem("dia");
  } else {
    var f = new Date();
    var hoy = f.toISOString().split("T");
    console.log(hoy[0]);
    document.getElementById("fecha").value = hoy[0];
  }
});
