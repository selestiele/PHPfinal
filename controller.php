<?php

//Things I need to do in this file:


// set variables, including empty strings, like errorMsg. Single message at the top, but then specific error messages will be shown in the fields.

$errorMsg = '';
$lengthForm = filter_input(INPUT_POST, 'length');
$amountForm = filter_input(INPUT_POST, 'amount');
$aprForm = filter_input(INPUT_POST, 'apr');
$extraForm = filter_input(INPUT_POST, 'extra');

//validate information


// remove unwanted characters; clean up the data - chapter 9
// remove percent signs
// remove dashes
// remove dollar signs
// keep period in amounts and percentages, but in the percentage, check where it's located because it has to convert to decimal anyway

// Variables to go back to form = 
$length = 'This';
$amount = 'is';
$apr = 'a';
$extra = 'test';
include 'index.php';





// Make the savings section entirely PHP, so it shows only if there's extra payments?
     //<h3>Savings</h3>
     // <p>By making extra payments each month, you will cut your loan duration down to: <!-- Calculated time saved--></p>
     // <p>By making extra payments each month, you will save: <!-- Calculated amount saved --></p>

?>

