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
    xhr.open("GET", "json.php?year="+Year+"&month="+(NumberofMonth+1), true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        JSONEvent = {};
        NowObject = {};
        ObjectMove = {};
        Event = {};
       
        for (var event of data){
            var eventDate = new Date(event.start_date);
            var eventDay = eventDate.getDate();
            var eventMonth = eventDate.getMonth();
            var tanggalSelesai = new Date(event.end_date);
            if (eventMonth == (NumberofMonth - 1)) {
              // masukan nama ke JSON
              JSONEvent[event['event_name']] = tanggalSelesai.getDate();    
              // remove event from the deque
              var eventIndex = data.indexOf(event);
              data.splice(eventIndex, 1);
              } else {break;}
            }
          //
        
       
        for (var event of data) {
            var eventDate = new Date(event.start_date);
            var eventDay = eventDate.getDate();
            var eventMonth = eventDate.getMonth();
            var endDate = new Date(event.end_date);
            var startDate = new Date(event.start_date);
            // Calculate the difference in days between the end date and start date
            var dayDifference = (endDate.getDate() - eventDay);
            // If the day difference is less than or equal to 0
            if (dayDifference <= 0) {
              // Replace the day difference with the total days in the current month minus the start date
              dayDifference = totalDay - eventDay;
            }
            // If the start date is the last day of the month, set the day difference to 0
            if (startDate.getDate() === totalDay) {
              dayDifference = 0;
            }
            // Add the event name to the NowObject with the day difference
            NowObject[event.event_name] = dayDifference;
            ObjectMove[event.event_name] = 0;
          }
        console.log(NowObject);
        console.log(ObjectMove);

        // logika yang dibutuhkan untuk  kalender dinamis
        let day = 0;
        let date = 0;
        let nextMonth = 1;

        // print looping berapa minggu
        for (let i = 0; i < weeks+1; i++){
            if (Object.keys(JSONEvent).length === 0){
                kondisi = 0 + Object.keys(ObjectMove).length;
              }
            // jika minggu kelima tidak ada harinya maka keluar loop
            if (date == totalDay){
                break; 
            }
            let first = true;
            let second = true;
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
                    // memmberikan tanggal pada bulan yang ditampilkan
                    else {
                        date += 1;
                        cell.innerText = date;
                        cell.setAttribute('class', 'inMonth');


                        
                        // untuk memberi tanda tanggal pada hari ini
                        if(date == new Date().getDate() && ArrayOfMonth[new Date().getMonth()] == month.innerHTML ) {
                            cell.setAttribute("class", "hariIni");
                        } 

                        var todayEvent = getEventsByDay(data, date);
                        if (NowObject.length != 0){
                            for (var event in NowObject) {
                                if (NowObject[event] >= 0 && ObjectMove[event] == 1){
                                    var paragraph = document.createElement("p");
                                    if(Event[event].priority == "High"){
                                        paragraph.classList.add ("important");
                                        
                                    }else if(Event[event].priority == "Medium"){
                                        paragraph.classList.add ("med");
                                    }else{
                                        paragraph.classList.add ("low");
                                    }
                                    var link = document.createElement("a");
                                    link.href = "../event/new_detail.php?id="+Event[event].id; // Set the desired URL for the event
                                    // hidden word                                    
                                    link.classList.add("eventmonth");
                                    // add span to link
                                    var span = document.createElement("span");
                                    span.innerText = Event[event].event_name;
                                    span.style.visibility = "hidden";
                                    link.appendChild(span);
                                    // hidden display link
                                    // move to link href
                                    // add font color


                                    paragraph.appendChild(link);

                                    // add event on mouseover
                                  
                                    cell.appendChild(paragraph);
                                    NowObject[event] -= 1;
                                    ObjectMove[event] = 1;
                                  }
                                }
                        }

                      
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
                                NowObject[event.event_name] -= 1;
                                ObjectMove[event.event_name] = 1;
                                Event[event.event_name] = event;
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
            console.log(ObjectMove);
            console.log(Event);
           
            }
        }
    }
    xhr.send();
}
function giveBehavior(){
    var allEvent = document.querySelectorAll(".eventmonth");
    console.log(allEvent);
    //add event on mouseover
    for (var i = 0; i < allEvent.length; i++) {
        allEvent[i].parentElement.addEventListener("click", function() {
            allEvent[i].style.visibility = "visible";
        });
    }
    console.log("hello world");
}
DynamicCalender();
giveBehavior();
//add all event table paragraph

