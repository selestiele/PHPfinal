<?php include 'view/header.php'; ?>


    <main>
        <article class="topSections">
            <section class="form">
                <div class="instructions">
                    <p>Please enter your information in the form. Fields marked with an asterisk (*) are required.</p>
                    <p class="errorMsg"><?php echo $errorMsg; ?></p></div>
                <form action="index.php" method="post" class="formInput">
                    <label for="length" class="formLabel">Loan Length*<br>
                        <input type="text" name="length" id="length" class="formInput"></label><br>
                    <label for="months" class="formLabel">
                        <input type="radio" name="time" value="months" id="months" class="formRadio">Months</label>
                    <label for="years" class="formLabel">
                        <input type="radio" name="time" value="years" id="years" class="formRadio">Years</label><br>
                    <label for="amount" class="formLabel">Loan Amount*<br>
                        <input type="text" name="amount" id="amount" class="formInput"></label>
                    <label for="apr" class="formLabel">Annual Interest Rate*<br>
                        <input type="text" name="apr" id="apr" class="formInput" maxlength="5"> &percnt; </label>
                    <label for="extra" class="formLabel">Extra Payment<br>
                        <input type="text" name="extra" id="extra" class="formInput"></label><br>
                    <input type="submit" name="submitBtn" value="Calculate!" class="submitBtn">
                </form>
            </section>
<!-- Display the calculations-->
            <section class="results">
                <h3 class="enteredHead">You Entered:</h3>
                <div class="entered">
                        <p>Loan Amount:  <?php echo htmlspecialchars($amountForm);  ?></p> 
                        <p>Loan Length: <?php echo htmlspecialchars($lengthForm) . ' ' . $time;  ?></p>
                        <p>Annual Interest Rate: <?php echo htmlspecialchars($aprForm) . '%';  ?></p>
                        <p>Extra Payments (optional): <?php echo htmlspecialchars($extraForm);  ?></p>
                </div> <!-- end .entered -->
                <div class="calc">
                    <h3>Monthly Payment Amount</h3>
                        <p><?php echo "$" . number_format($a, 2);  ?></p>
                    <h3>Total Amount (principle + interest)</h3>
                        <p><?php echo "$" . number_format($total);  ?></p>
                    <h3>Total Interest Paid</h3>
                        <p><?php echo "$" . number_format($totalInterest);  ?></p>
                </div><!-- end .calc -->
                <div class="savings">
                    <p><?php echo $savings; ?>  </p>
                </div><!-- end .savings -->
            </section> <!-- end .results -->
        </article>
        <section class="schedule">
            <h3>Amortization Schedule</h3>
                <table class="amort">
                    <thead>
                         <tr>
                              <th>Payment</th>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Extra Payment</th>
                              <th>Principle</th>
                              <th>Interest</th>
                              <th>Balance</th>
                         </tr>
                    </thead>
                    <tbody>
                         <!-- This is going to be a for loop? --><?php 
                         for ($i = 1; $i <= $months; $i++) :
                            $monthInt = $balance * $r;
                            $monthPrinciple = $payment - $monthInt;
                            $balance -= ($monthPrinciple + $extra);
                            $accruedInt += $monthInt;

//                            if ($balance < 0) {
//                                $payment = round($balance, 2);
//                                $monthInt = $balance * $r;
//                                $monthPrinciple = $balance - $monthInt - $extra;
//                                //$balance = 0;
//                                //$amountTimeSaved = $months - $i;
//                                //$amountIntSaved = round(($totalInterest - $accruedInt), 2);
//                            }
                            if ($balance < 0) {
                                $monthPrinciple += $balance;
                                $payment = round($monthPrinciple + $extra, 2);
                                $monthInt = round($payment * $r, 2);
                                $monthPrinciple = round($payment - $monthInt, 2);
                                $balance = 0;
                                $amountTimeSaved = $months - $i;
                                $amountIntSaved = round(($totalInterest - $accruedInt), 2);
                            }
                            
                            if ($i === 1) {
                                $paymentDate = $startMonth;
                            } else {
                                $paymentDate = $startMonth -> modify('+1 month');
                            }  ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $paymentDate -> format('m-1-Y'); ?></td>
                              <td><?php echo "$" . $payment; ?></td>
                              <td><?php echo "$" . $extra; ?></td>
                              <td><?php echo "$" . number_format($monthPrinciple, 2); ?></td>
                              <td><?php echo "$" . number_format($monthInt, 2); ?></td>
                              <td><?php echo "$" . number_format($balance, 2); ?></td>
                            </tr>    
                         <?php 
                            if ($balance === 0) {
                                break;
                            } //endif 
                         endfor; ?>
                         
                    </tbody>
                </table>
        </section><!-- end .schedule -->
    </main>
</body>





<?php include 'view/footer.php'; ?>