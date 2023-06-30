//Daniel Ribeiro
function makeTimer() {

	//var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
	var tempo= document.getElementById('tempo');	
	var tempoValue= tempo.value;
	var endTime = new Date(tempoValue);
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
// function loadDrivers() {
// 	// var firstName = ["Max", "Sergio", "Fernando"];
// 	var firstName = ["Max", "Sergio", "Fernando"];
// 	var lastName = ["Verstappen", "Perez", "Alonso"];
// 	var driverPic = ["img/max.png", "img/perez.png", "img/alo.png"]


// 	//wrc
// 	for (let i = 1; i < 4; i++) {
// 		$("#wrc .driverName#" + i + " .firstName").text(firstName[i - 1]);
// 		$("#wrc .driverName#" + i + " .lastName").text(lastName[i - 1]);
// 		$("#wrc .driverPic#" + i + " img").attr("src", driverPic[i - 1]);
// 	}

// 	//f1
// 	for (let i = 1; i < 4; i++) {
// 		$("#f1 .driverName#" + i + " .firstName").text(firstName[i - 1]);
// 		$("#f1 .driverName#" + i + " .lastName").text(lastName[i - 1]);
// 		$("#f1 .driverPic#" + i + " img").attr("src", driverPic[i - 1]);
// 	}

// 	//wec
// 	for (let i = 1; i < 4; i++) {
// 		$("#wec .driverName#" + i + " .firstName").text(firstName[i - 1]);
// 		$("#wec .driverName#" + i + " .lastName").text(lastName[i - 1]);
// 		$("#wec .driverPic#" + i + " img").attr("src", driverPic[i - 1]);
// 	}
// }

// loadDrivers();



function confirmLogout() {
	// Display confirmation prompt

	if (confirm("Pretende terminar sessão?")) {
		// If OK is clicked, redirect to PHP page
		//alert(window.location.href);
		setTimeout(function () {
			window.location.href = "logout.php";
		}, 10);
	}

}

function confirmLogoutAdmin() {
	// Display confirmation prompt

	if (confirm("Pretende terminar sessão?")) {
		// If OK is clicked, redirect to PHP page
		//alert(window.location.href);
		setTimeout(function () {
			window.location.href = "../logout.php";
		}, 10);
	}

}


$(document).ready(function () {
	// Search function
	$('#searchInput').on('input', function () {
		var searchText = $(this).val().toLowerCase();
		var searchByData = !isNaN(Date.parse(searchText));

		$('#newsManage tbody tr').each(function () {
			var titulo_noticia = $(this).find('td:eq(2)').text().toLowerCase();
			var data_noticia = $(this).find('td:eq(1)').text().toLowerCase();
			var id_noticia = $(this).find('td:eq(0)').text().toLowerCase();
			var cat_noticia = $(this).find('td:eq(3)').text().toLowerCase();

			if ((searchByData && data_noticia.includes(searchText)) ||
				(!searchByData && titulo_noticia.includes(searchText) || id_noticia.includes(searchText) || cat_noticia.includes(searchText))) {
				$(this).removeClass('hidden');
				highlightText($(this), searchText);
			} else {
				$(this).addClass('hidden');
			}

		});
	});



	/* 	//resultado tabela numero de linhas
		var tableBody = document.querySelector('#editableTable tbody');
		for (var i = 1; i <= 20; i++) {
			var newRow = document.createElement('tr');
			newRow.innerHTML = `
		  <td id="position">${i}</td>
		  <td id="driverId" contenteditable="true"></td>
		  <td id="laptime"><input class="inputLaptime" type="time" step="0.001" placeholder="--:--:---"></td>
		  <td><input type="checkbox"></td>
		`;
			tableBody.appendChild(newRow);
		}
	
	
	
		document.getElementById('categorySelect').addEventListener('change', function () {
			var selectedCategory = this.value;
			var tableBody = document.querySelector('#editableTable tbody');
			tableBody.innerHTML = ''; // Clear existing rows
	
			var numRows = 20; // Default number of rows
	
			if (selectedCategory === 'wec') {
				numRows = 22;
			}
	
			for (var i = 1; i <= numRows; i++) {
				var newRow = document.createElement('tr');
				newRow.innerHTML = `
		  <td>${i}</td>
		  <td contenteditable="true"></td>
		  <td contenteditable="true"></td>
		  <td contenteditable="true"></td>
		`;
				tableBody.appendChild(newRow);
			}
		});
	*/

});


$(document).ready(function () {
	// Capture form submission event
	$('#resultado').submit(function (event) {
		// Loop through the table rows and populate hidden input fields
		$('#editableTable tbody tr').each(function () {
			var position = $(this).find('td:eq(0)').text();
			var driverId = 1; //$(this).find('select.driverSelect').val();
			var laptime = $(this).find('input.inputLaptime').val();
			var dnf = $(this).find('input[type="checkbox"]').is(':checked') ? 'sim' : 'nao';

			// Create hidden input fields dynamically
			$(this).append('<input type="hidden" name="position[]" value="' + position + '">');
			$(this).append('<input type="hidden" name="driverId[]" value="' + driverId + '">');
			$(this).append('<input type="hidden" name="laptime[]" value="' + laptime + '">');
			$(this).append('<input type="hidden" name="dnf[]" value="' + dnf + '">');
		});

		// Allow the form to submit
		return true;
	});
});


//select box dos pilotos
function updateDriverSelection(selectElement) {
	var selectedDriverId = selectElement.value;

	var allDriverSelects = document.getElementsByClassName('driverSelect');
	for (var i = 0; i < allDriverSelects.length; i++) {
		var driverSelect = allDriverSelects[i];
		var driverOption = driverSelect.querySelector("option[value='" + selectedDriverId + "']");

		if (driverOption) {
			driverOption.disabled = true;
			driverOption.style.display = "none";
		} else {
			var allOptions = driverSelect.getElementsByTagName('option');
			for (var j = 0; j < allOptions.length; j++) {
				var option = allOptions[j];
				option.disabled = false;
				option.style.display = "block";
			}
		}
	}
}



function highlightText(element, searchText) {
	element.find('td').each(function () {
		var cellText = $(this).text();
		var highlightedText = cellText.replace(new RegExp(searchText, 'gi'), '<span class="highlight">$&</span>');
		$(this).html(highlightedText);
	});
}






//news form validation
$('form#news1').submit(function (event) {
	event.preventDefault();

	var titulo = $('#titulo-noticia').val();
	var cat = $('#categoria').val();

	if (titulo.trim() === '') {
		alert('Campo Titulo não pode ser vazio');
	}
	if (cat.trim() === '') {
		alert('Escolha uma categoria');
	}
	else {
		$(this).submit();
	}
});
