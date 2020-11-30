<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset();

session_destroy();
?>

<script>location.replace("home1.html");</script>

</body>
</html>