<?php
function print_value($val,$die=false) {
    echo '<div style="clear: both;"></div>';
    echo '<pre>';
    print_r($val);
    echo '</pre>';
    if($die) die('horray! value printed..');
}
?>