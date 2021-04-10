<?php require_once '../templates/header.php'?>
    <?php require_once '../templates/subheader.php'?>
       
    <div class="content">
            <div class="registro">
                <p>Tu registro de ejercicios para</p>
                <div class="fecha">
                    <div class="left-arrow"></div>
                    <div class=""></div>
                    <div class="right-arrow"></div>
                </div>
                <div class="calendar-icon"></div>
                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">
                            <h1></h1>
                            <p></p>
                        </div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days"></div>
                </div>
            </div>
            <div class="ejercicios">
                <div class="cardio">
                    <h3>Cardiovascular</h3>
                    <p>Añadir</p>
                </div>
                <div class="otro">
                    <h3>Ejercicios de fuerza</h3>
                    <p>Añadir</p>
                </div>
            </div>

            <div class="notas">
                <h3>Notas sobre el ejercicio de hoy</h3>
                <textarea placeholder="Añade una nota"></textarea >
            </div>
        

        

<?php require_once '../templates/footer.php'?>
<script>

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
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

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
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

renderCalendar();
</script>
</html>