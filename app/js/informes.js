fetch("../food/alimentos.php", {})
  .then(function (respuesta) {
    return respuesta.json();
  })
  .then(function (resultado) {
    console.log("----------------------------");
    console.log(resultado);
  });

var myCanvas = document.getElementById("myCanvas");
myCanvas.width = 300;
myCanvas.height = 300;

var ctx = myCanvas.getContext("2d");

function drawLine(ctx, startX, startY, endX, endY, color) {
  ctx.save();
  ctx.strokeStyle = color;
  ctx.beginPath();
  ctx.moveTo(startX, startY);
  ctx.lineTo(endX, endY);
  ctx.stroke();
  ctx.restore();
}

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

var myVinyls = {
  Proteina: 20,
  Hidratos: 14,
  Grasas: 2,
};

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

    //drawing the grid lines
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

      //writing grid markers
      this.ctx.save();
      this.ctx.fillStyle = this.options.gridColor;
      this.ctx.font = "bold 10px Arial";
      this.ctx.fillText(gridValue, 10, gridY - 2);
      this.ctx.restore();

      gridValue += this.options.gridScale;
    }

    //drawing the bars
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

    //draw legend
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

var myBarchart = new Barchart({
  canvas: myCanvas,
  padding: 10,
  gridScale: 5,
  gridColor: "#eeeeee",
  data: myVinyls,
  colors: ["#a55ca5", "#67b6c7", "#bccd7a"],
});
myBarchart.draw();
