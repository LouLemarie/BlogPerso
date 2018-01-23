<?php
    if($_SESSION['login']) {
        echo '<button class="btn-5" onclick="location.href=`../../index.php`;" style="margin: 20px auto; width:100%">LOGOUT</button>';
    } else {
        echo '<button class="btn-5 pop-up-button" style="margin: 20px auto; width:100%">LOGIN</button>';
    }


