var links = document.getElementsByTagName('a');


for (var i = 0; i < links.length; i++) {  

  links[i].addEventListener('click', function(event) {  
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'scripts/counter.php', true);
    xhr.send(null);})

}

