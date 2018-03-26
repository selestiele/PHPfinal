<?php

// set variables, including empty strings, like errorMsg.
    $errorMsg = '';
    $submit = filter_input(INPUT_POST, 'submitBtn');
    $extra = '';

//get amounts from form after submit
    $lengthForm = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT);
    $amountForm = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
    $aprForm = filter_input(INPUT_POST, 'apr', FILTER_VALIDATE_FLOAT);
    $extraForm = filter_input(INPUT_POST, 'extra', FILTER_VALIDATE_INT);

//validate information
    if (isset($submit)) {
        if ( empty($lengthForm) || $lengthForm === 0 || $lengthForm === FALSE) {
            $errorMsg = "Please enter a loan length in whole numbers only.";
        } else if ( empty($amountForm) || $amountForm === 0 || $amountForm === FALSE) {
            $errorMsg = "Please enter a loan amount in whole dollars, without any commas.";
        } else if ( empty($aprForm) || $aprForm === 0 || $aprForm === FALSE) {
            $errorMsg = "Please enter a percentage rate.";
        } 

        if (empty($extraForm) || $extraForm === 0) {
            $extra = 0;
        } else if ($extraForm === FALSE) {
            $errorMsg = "Please enter an extra payment amount in whole dollars.";
        } else {
            $extra = $extraForm;
        }
    } 

//convert years to months IF years is checked
    $time = filter_input(INPUT_POST, 'time');
    $errorMsgTime = '';


//check if months or years is checked and whether the length of time is an integer
    if (isset($submit) && $time == NULL) {
        $errorMsg = "Please specify months or years for loan length.";
    }

    if ($time == 'years') {
        $months = $lengthForm * 12;
    } else {
        $months = $lengthForm;
    }


/* CALCULATE THE MONTHLY PAYMENT AMOUNT -- using formula: A = P((r(1+r)^n)/((1+r)^n - 1)) */
//variables
    $a = 0;
    $p = $amountForm;
    $r = ($aprForm * .01)/ 12;
    $n = $months;
    $total = 0;
    $totalInterest = 0;
  
//Calculation - but only if the submit button is pressed
    if (isset($submit)) {
        $baseExp = pow((1 + $r), $n);
        $a = $p * (($r*$baseExp)/($baseExp - 1));
        $a = round($a, 2);
        $total = round(($a * $n), 2);
        $totalInterest = round($total - $p, 2);
    }

/*           CREATE AMORTIZATION SCHEDULE           */

//variables
    $payment = $a;
    $monthInt = 0;
    $accruedInt = 0;
    $balance = $p;
    $monthPrinciple = 0;
    $amountIntSaved = 0;
    $amountTimeSaved = 0;
    $now = new DateTime();
    $startMonth = $now -> modify('next month');

//determine whether extra payments are included
    if ($extra <= 0 ) {
        $payType = 'regular';
        $extra = 0;
    } else {
        $payType = 'extra';
    }

// table calculations
//    for ($i = 1; $i <= $months; $i++) {
//        $monthInt = $balance * $r);
//        $monthPrinciple = $payment - $monthInt;
//        $balance -= ($monthPrinciple + $extra);
//        $accruedInt += $monthInt;
//    
//        if ($balance < 0) {
//            $monthPrinciple = $monthPrinciple + $balance;
//            $monthInt = $monthInt - $balance;
//            $balance = 0;
//            $amountTimeSaved = $months - $i;
//            $amountIntSaved = round(($totalInterest - $accruedInt), 2);
//        } // endif
//  
//        if ($i === 1) {
//            $paymentDate = $startMonth;
//        } else {
//            $paymentDate = $startMonth -> modify('+1 month');
//        } // end ifelse
//  
//           // echo "<tr><td>" . $i . "</td>";
//           // echo "<td>" . $paymentDate -> format('m-1-Y') . "</td>";
//           // echo "<td>" . round($balance, 2) . "</td>";
//           // echo "<td>" . round($monthInt, 2) . "</td>";
//           // echo "<td>" . round($monthPrinciple, 2) . "</td></tr>";
//    
//        if ($balance === 0) {
//            break;
//        } //endif
//    } // end for statement 

// get information for Savings section of page
    if (isset($submit)){
        if ($payType == 'extra') {
            $savings = "By making extra payments, you will pay off your loan " . $amountTimeSaved . " months ahead of schedule.<br> By making extra payments, you will save \$" . $amountIntSaved . " in interest.<br>";
        } else {
            $savings = '';
        }
    } else {
            $savings = '';
    }

    include 'form.php';

?>