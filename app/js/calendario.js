icon = document.querySelector(".calendar-icon")
console.log(icon)
icon.addEventListener("click", () => {
    let calendario = document.querySelector(".calendar")
    // this.classList.toggle("ocultar");
    // console.log(this)
    if (calendario.classList.contains('ocultar-calendario')) {
        calendario.classList.remove('ocultar-calendario')
    } else {
        calendario.classList.add('ocultar-calendario')
    }
});

const date = new Date();

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

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().getUTCDate() + " " + new Date().getMonth() +" "+new Date().getUTCFullYear() ;

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

function exerciseDate(){
  let alldays = document.querySelectorAll('.days div')
  let month = document.querySelector('.month h1')
  // let year = document.querySelector('.month h1')
  Array.from(alldays).forEach(el=>{
    el.addEventListener("click",function(){
      console.log(this.textContent)
      location.replace('ejercicio.php?date='+this.textContent+'-'+month.textContent)
  })
})
}

// Registro del dia
let reg = document.querySelector('.registro-dia')
let a = window.location.search
var b = a.split("=");
c = b[1]

if (b != ""){
  reg.textContent = c +"/" +date.getUTCMonth() + "/" + date.getFullYear() ;
}else{
  reg.textContent = new Date().toDateString();
}
