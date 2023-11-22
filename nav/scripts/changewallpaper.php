<script>
var xhr = new XMLHttpRequest();
xhr.open('GET', 'scripts/wallpaper.php?force=1', true);
xhr.send(null);
setTimeout(function(){ history.back();}, 50);
</script>
