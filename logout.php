<?php
    setcookie("UserID", "", time() - 1000, "/");
    setcookie("UKey", "", time() - 1000, "/");
    header('Location: /');