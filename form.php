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
                        <p><?php echo "$" . $a;  ?></p>
                    <h3>Total Amount (principle + interest)</h3>
                        <p><?php echo "$" . $total;  ?></p>
                    <h3>Total Interest Paid</h3>
                        <p><?php echo "$" . $interest;  ?></p>
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
                              <th>Principle</th>
                              <th>Interest</th>
                              <th>Extra Payment</th>
                              <th>Balance</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr><!-- This is going to be a foreach loop? -->
                              <td>something</td>
                              <td>to</td>
                              <td>help</td>
                              <td>with</td>
                              <td>the</td>
                              <td>format</td>
                              <td>ting</td>
                         </tr>
                    </tbody>
                </table>
        </section><!-- end .schedule -->
    </main>
</body>





<?php include 'view/footer.php'; ?>