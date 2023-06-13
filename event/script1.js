//Daily To Do List
const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

function addTask(){
    if(inputBox.value === ''){
        alert("You must write something!");
    }
    else{
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);
        let span = document.createElement("span");
        span.innerHTML = "\u00d7";
        li.appendChild(span);
    }
    inputBox.value = "";
    saveData();
}

listContainer.addEventListener("click", function(e){
    if(e.target.tagName === "LI"){
        e.target.classList.toggle("checked");
        saveData();
    }
    else if (e.target.tagName === "SPAN"){
        e.target.parentElement.remove();
        saveData();
    }
}, false);

inputBox.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) { // 13 is the keycode for "Enter"
      event.preventDefault();
      addTask();
}})

function saveData(){
    localStorage.setItem("data", listContainer.innerHTML);
}

function showTask(){
    listContainer.innerHTML = localStorage.getItem("data");
}
showTask();

//Upcoming Event
// Tampilkan daftar acara menggunakan JavaScript
var daftarAcaraElemen1 = document.getElementById("daftar-acara");

// Fetch data JSON dari PHP

//next week
// Tampilkan daftar acara menggunakan JavaScript
var daftarAcaraElemen2 = document.getElementById("daftar-acara1");
var this_week = document.getElementById("thisweek");
// Fetch data JSON dari PHP
function UpcomingThisWeek(){
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "ajax.php", true);
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      thisWeek = data['dataAcaraThisWeek'];
      for (var event of thisWeek) {
        cell = document.createElement("tr");
        var paragraph = document.createElement("td");
        if(event.priority == "High"){
          paragraph.classList.add("circleHigh");
        }else if(event.priority == "Medium"){
          paragraph.classList.add("circleMed");
        }else{
          paragraph.classList.add("circleLow");
        }
        var link = document.createElement("td");
        link.innerText = event.event_name;
        cell.appendChild(paragraph);
        cell.appendChild(link)
        this_week.appendChild(cell)
      }
    }
  }
  xhr.send();

}
next_week = document.getElementById("nextweek")
function nextWeek(){
var xhr = new XMLHttpRequest();
  xhr.open("GET", "ajax.php", true);
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      thisWeek = data['dataAcaraNextWeek'];
      for (var event of thisWeek) {
        cell = document.createElement("tr");
        var paragraph = document.createElement("td");
        if(event.priority == "High"){
          paragraph.classList.add("circleHigh");
        }else if(event.priority == "Medium"){
          paragraph.classList.add("circleMed");
        }else{
          paragraph.classList.add("circleLow");
        }
        var link = document.createElement("td");
        link.innerText = event.event_name;
        cell.appendChild(paragraph);
        cell.appendChild(link)
        next_week.appendChild(cell)
      }
    }
  }
  xhr.send();
}

UpcomingThisWeek();
nextWeek();