var xhr = new XMLHttpRequest();

xhr.open('GET', navurl + 'scripts/showdiary.php', true);

xhr.onload = function () {
    if (this.status === 200) {
		var responseText = xhr.responseText;
		var diaryElement = document.getElementById('diarytext');
		diaryElement.innerHTML = responseText;
    } else{
    }
};
xhr.send();