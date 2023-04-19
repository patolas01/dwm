//Daniel Ribeiro
function makeTimer() {

	//var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
	var endTime = new Date("11 May 2023 10:00:00 GMT+00:00");
	endTime = (Date.parse(endTime) / 1000);

	var now = new Date();
	now = (Date.parse(now) / 1000);

	var timeLeft = endTime - now;

	var days = Math.floor(timeLeft / 86400);
	var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
	var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
	var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

	if (hours < "10") { hours = "0" + hours; }
	if (minutes < "10") { minutes = "0" + minutes; }
	if (seconds < "10") { seconds = "0" + seconds; }

	$("#days").html(days + "<span>Dias</span>");
	$("#hours").html(hours + "<span>Hrs</span>");
	$("#minutes").html(minutes + "<span>Min</span>");
	$("#seconds").html(seconds + "<span>Sec</span>");
}

setInterval(function () { makeTimer(); }, 1000);








//Paulo Leal
function loadDrivers() {
	// var firstName = ["Max", "Sergio", "Fernando"];
	var firstName = ["Max", "Sergio", "Fernando"];
	var lastName = ["Verstappen", "Perez", "Alonso"];
	var driverPic = ["img/max.png", "img/perez.png", "img/alo.png"]


	//wrc
	for (let i = 1; i < 4; i++) {
		$("#wrc .driverName#" + i + " .firstName").text(firstName[i - 1]);
		$("#wrc .driverName#" + i + " .lastName").text(lastName[i - 1]);
		$("#wrc .driverPic#" + i + " img").attr("src", driverPic[i - 1]);
	}

	//f1
	for (let i = 1; i < 4; i++) {
		$("#f1 .driverName#" + i + " .firstName").text(firstName[i - 1]);
		$("#f1 .driverName#" + i + " .lastName").text(lastName[i - 1]);
		$("#f1 .driverPic#" + i + " img").attr("src", driverPic[i - 1]);
	}

	//wec
	for (let i = 1; i < 4; i++) {
		$("#wec .driverName#" + i + " .firstName").text(firstName[i - 1]);
		$("#wec .driverName#" + i + " .lastName").text(lastName[i - 1]);
		$("#wec .driverPic#" + i + " img").attr("src", driverPic[i - 1]);
	}
}

loadDrivers();



