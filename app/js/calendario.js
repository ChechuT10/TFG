const date = new Date();
const months = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
];
// console.log(date.getDate())
const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];
  document.querySelector(".date p").innerHTML = `${new Date().getDate()}-${new Date().getMonth()+1}-${new Date().getFullYear()}`;

  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div>${i}</div>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
    monthDays.innerHTML = days;
  }
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
  exerciseDate()
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
  exerciseDate()
});

renderCalendar();
exerciseDate();


// Hacer un split para conseguir la fecha actual
function exerciseDate(){
  let alldays = document.querySelectorAll('.days div')
  let auxDate = document.querySelector('.date p').textContent
  var b = auxDate.split("-");
  console.log(b[0])
  Array.from(alldays).forEach(el=>{
    el.addEventListener("click",function(){
      console.log(this.textContent)
      location.replace('ejercicio.php?date='+auxDate)
  })
})
}

// Registro del dia
let reg = document.querySelector('.registro-dia')
let a = window.location.search
var b = a.split("=");
c = b[1]

if (b != ""){
  document.querySelector(".date p").innerHTML = `${date.getUTCDay()}-${months[date.getMonth()]}-${date.getFullYear()}`;
  reg.textContent = c;
}else{
  reg.textContent = new Date().toDateString();
}
