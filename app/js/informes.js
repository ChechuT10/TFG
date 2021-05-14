var myCanvas = document.getElementById("myCanvas");
myCanvas.width = 600;
myCanvas.height = 500;

var ctx = myCanvas.getContext("2d");

// linia divisoria horizontal
function drawLine(ctx, startX, startY, endX, endY, color) {
  ctx.save();
  ctx.strokeStyle = color;
  ctx.beginPath();
  ctx.moveTo(startX, startY);
  ctx.lineTo(endX, endY);
  ctx.stroke();
  ctx.restore();
}

// barra
function drawBar(
  ctx,
  upperLeftCornerX,
  upperLeftCornerY,
  width,
  height,
  color
) {
  ctx.save();
  ctx.fillStyle = color;
  ctx.fillRect(upperLeftCornerX, upperLeftCornerY, width, height);
  ctx.restore();
}

// dibujar estadisticas
var Barchart = function (options) {
  this.options = options;
  this.canvas = options.canvas;
  this.ctx = this.canvas.getContext("2d");
  this.colors = options.colors;

  this.draw = function () {
    var maxValue = 0;
    for (var categ in this.options.data) {
      maxValue = Math.max(maxValue, this.options.data[categ]);
    }
    var canvasActualHeight = this.canvas.height - this.options.padding * 2;
    var canvasActualWidth = this.canvas.width - this.options.padding * 2;

    //lineas de la cuadricula
    var gridValue = 0;
    while (gridValue <= maxValue) {
      var gridY =
        canvasActualHeight * (1 - gridValue / maxValue) + this.options.padding;
      drawLine(
        this.ctx,
        0,
        gridY,
        this.canvas.width,
        gridY,
        this.options.gridColor
      );

      //marcadores
      this.ctx.save();
      this.ctx.fillStyle = this.options.gridColor;
      this.ctx.font = "bold 10px Arial";
      this.ctx.fillText(gridValue, 10, gridY - 2);
      this.ctx.restore();

      gridValue += this.options.gridScale;
    }

    //dibujar las barras
    var barIndex = 0;
    var numberOfBars = Object.keys(this.options.data).length;
    var barSize = canvasActualWidth / numberOfBars;

    for (categ in this.options.data) {
      var val = this.options.data[categ];
      var barHeight = Math.round((canvasActualHeight * val) / maxValue);
      drawBar(
        this.ctx,
        this.options.padding + barIndex * barSize,
        this.canvas.height - barHeight - this.options.padding,
        barSize,
        barHeight,
        this.colors[barIndex % this.colors.length]
      );

      barIndex++;
    }

    //legenda
    barIndex = 0;
    var legend = document.querySelector("legend[for='myCanvas']");
    var ul = document.createElement("ul");
    legend.append(ul);
    for (categ in this.options.data) {
      var li = document.createElement("li");
      li.style.listStyle = "none";
      li.style.borderLeft =
        "20px solid " + this.colors[barIndex % this.colors.length];
      li.style.padding = "5px";
      li.textContent = categ + ": " + this.options.data[categ];
      ul.append(li);
      barIndex++;
    }
  };
};

window.addEventListener("load", function () {
  datos = {
    Proteina: 0,
    Hidratos: 0,
    Grasas: 0,
  };

  fetch("../include/getFoodByUser.php", {})
    .then(function (respuesta) {
      return respuesta.json();
    })
    .then(function (resultado) {
      for (const key in resultado) {
        console.log(resultado[key]);
        datos.Proteina = datos.Proteina + parseInt(resultado[key].proteinas);
        datos.Hidratos = datos.Hidratos + parseInt(resultado[key].hidratos);
        datos.Grasas = datos.Grasas + parseInt(resultado[key].grasas);
      }

      var myBarchart = new Barchart({
        canvas: myCanvas,
        padding: 40,
        gridScale: 10,
        // color de la barra horizontal
        gridColor: "#118AB2",
        data: datos,
        // coloes de las barras en orden iz / dere
        colors: ["#EF476F", "#FFD166", "#06D6A0"],
      });
      myBarchart.draw();
    });
});
