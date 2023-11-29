var link1 = document.getElementsByTagName('a');
var link2 = document.getElementsByClassName('sxyh_search');

for (var i = 0; i < link1.length; i++) {

	link1[i].addEventListener('click', function(event) {
		var xhr = new XMLHttpRequest();
		xhr.open('GET', navurl + 'scripts/counter.php', true);
		xhr.send(null);
	})
}

for (var i = 0; i < link2.length; i++) {

	link2[i].addEventListener('click', function(event) {
		var xhr = new XMLHttpRequest();
		xhr.open('GET', navurl + 'scripts/counter.php', true);
		xhr.send(null);
	})
}