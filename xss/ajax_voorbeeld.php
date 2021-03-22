<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>
<h1>The XMLHttpRequest Object</h1>

<button type="button" onclick="loadDoc()">Verander de content in deze demo-div</button>

<div id="demo">
    Hier gaat wat veranderen!!
</div>

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("POST", "ajax_response.php", true);
        xhttp.send();
    }
</script>

</body>
</html>