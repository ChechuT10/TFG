document.getElementById("envia").addEventListener("click", function () {});

document.getElementById("fecha").addEventListener("change", function () {
  var dia = this.value;
  console.log(dia);
  fetch("../food/alimentos.php", {
    method: "POST",
    body: dia,
  });
  document.getElementById("envia").submit();
});
