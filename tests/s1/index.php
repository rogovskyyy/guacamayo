<html>
<body>
<?php
session_start();
session_destroy();
session_start();

if($_POST['auth']) {
  $_SESSION['auth'] = $_POST['auth'];
}

print "POST array <br />";
print_r($_POST);
print "<br /><br />";

print "SESSION array <br />";
print_r($_SESSION);
print "<br /><br />";

if($_SESSION['auth'] == "true") {
  print "You're logged in <br />";
}
?>
<h1> This is content of page 1 </h1>
<form action='http://127.0.0.1:8000/api/read' method='post'>
<button type='submit'>Sign In</button>
<input type='hidden' name='_callback' value='http://127.0.0.1:8001'>
</form>
</body>
</html>
