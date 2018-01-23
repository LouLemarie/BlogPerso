<?php
echo '<div class="button">
     <button class="button btn-5 pop-up-button-sign-in" style="margin: 20px auto; width:100%">';

    if($_SESSION['login']) {
        echo 'New Article';
    } else {
        echo 'Sign Up';
    }

    echo '</button> </div>';