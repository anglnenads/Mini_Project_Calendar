// memberikan behavior pada tombol kanan kiri
var left = document.getElementById("left");
var right = document.getElementById("right");
const ArrayOfMonth = ["JANUARY", "FEBRUARY", "MARCH", "APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER", "DECEMBER"];

function arrowLeft(){
    // ambil elemen month dan Year

    Month =  document.getElementById("month");
    Year =  document.getElementById("year");

    if ( month.innerHTML == "JANUARY" ){
        Year.innerHTML = parseInt(Year.innerHTML) - 1;
        Month.innerHTML = ArrayOfMonth[11];
    } else {
        Month.innerHTML = ArrayOfMonth[ArrayOfMonth.indexOf(Month.innerHTML)-1];
    }
    DynamicCalender();    
}

function arrowRight(){
     // ambil elemen month dan Year

    Month =  document.getElementById("month");
    Year =  document.getElementById("year");

    if ( month.innerHTML == "DECEMBER" ){
        Year.innerHTML = parseInt(Year.innerHTML) + 1;
        Month.innerHTML = ArrayOfMonth[0];
    } else {
        Month.innerHTML = ArrayOfMonth[ArrayOfMonth.indexOf(Month.innerHTML)+1];
    }
    DynamicCalender();    
}

// masukan fungsi tersebut di dalam Button
left.addEventListener("click", arrowLeft);
right.addEventListener("click", arrowRight);



// membuat kalender dinamis

var calender = document.getElementById("daydate");

function getFirstDayOfMonth(year, month) {
    var firstDay = new Date(year, month, 1);
    return firstDay.getDay();  // mengembalikan hari dalam bentuk angka 0 minggu 6 sabtu
}
function getDaysInMonth(year, month) {
    var date = new Date(year, month , 0);
    return date.getDate(); // Mengembalikan jumlah hari dalam bulan 
}

function filterEventsByMonth(events, targetMonth) {
    return events.filter(function(event) {
      var eventDate = new Date(event.start_date);
      var eventMonth = eventDate.getMonth() + 1;
      return eventMonth === targetMonth;
    });
  }

function filterEventsByYear(events, year) {
    return events.filter(function(event) {
      return new Date(event.start_date).getFullYear() == year;
    });
}

function getEventsByDay(events, day) {
    var filteredEvents = events.filter(function(event) {
      var eventDay = new Date(event.start_date).getDate();
      
      return eventDay === day;
    });
    return filteredEvents;
 }

function DynamicCalender(){
    // variabel yang dibutuhkan
    calender.innerHTML= ""
    Month =  document.getElementById("month").innerHTML;
    Year =  document.getElementById("year").innerHTML;
    NumberofMonth = ArrayOfMonth.indexOf(Month);
    firstDay = getFirstDayOfMonth(Year, NumberofMonth);
    totalDay = getDaysInMonth(Year,NumberofMonth+1);
    const weeks = Math.ceil(totalDay/7);
    lastMonth = getDaysInMonth(Year,NumberofMonth) - firstDay + 1;

    // fungsi untuk mengambil data dari  json PHP
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "json.php?id=5", true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        console.log(data);
        // filter data dari tahun
        data = filterEventsByYear(data, Year);
        console.log(data);
        // filter data dari bulan
        data = filterEventsByMonth(data, NumberofMonth+1);
        console.log(data);

        // logika yang dibutuhkan untuk  kalender dinamis
        let day = 0;
        let date = 0;
        let nextMonth = 1;

        // print looping berapa minggu
        for (let i = 0; i < weeks+1; i++){
            // jika minggu kelima tidak ada harinya maka keluar loop
            if (date == totalDay){
                break; 
            }
            //namun jika masih ada buat kolom hari
            const row = document.createElement("tr");
            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");
                if (day == firstDay){
                    // memberikan tanggal sesudah bulan  yang ditampilkan
                    if (date >= totalDay){
                        cell.innerHTML = nextMonth;
                        nextMonth +=1;
                        cell.setAttribute('class', 'after-before');
                    } 
                    // memberikan tanggal pada bulan yang ditampilkan
                    else {
                        date += 1;
                        cell.innerText = date;
                        cell.setAttribute('class', 'inMonth');
                        
                        // MADE BY VR YANG INI
                        if(date == new Date().getDate() && ArrayOfMonth[new Date().getMonth()] == month.innerHTML ) {
                            cell.setAttribute("class", "hariIni");
                        } 

                        var todayEvent = getEventsByDay(data, date);
                        if (todayEvent.length != 0){                
                            for (var event of todayEvent) {
                                var paragraph = document.createElement("p");
                                if(event.priority == "High"){
                                    paragraph.classList.add ("important");
                                }else if(event.priority == "Medium"){
                                    paragraph.classList.add ("med");
                                }else{
                                    paragraph.classList.add ("low");
                                }
                                var link = document.createElement("a");
                                link.href = "../event/new_detail.php?id="+event.id; // Set the desired URL for the event
                                link.innerText = event.event_name;
                                link.classList.add("eventmonth");
                                paragraph.appendChild(link);
                                cell.appendChild(paragraph);
                              }
                            } 
    

                        



                    }
                } 
                // memberikan tanggal sebelum bulan yang ditampilkan
                else {
                    day += 1;
                    cell.innerHTML = lastMonth;
                    lastMonth +=1;
                    cell.setAttribute('class', 'after-before');
                }
                row.appendChild(cell);
            }
            calender.appendChild(row);
            }
        }
    }
    xhr.send();
}

DynamicCalender();