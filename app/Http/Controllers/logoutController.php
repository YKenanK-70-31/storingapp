<?php
session_start();
session_destroy();

header("Location: http://storingapp.test/index.php");
exit;