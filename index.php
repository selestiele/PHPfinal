<?php include 'view/header.php'; ?>


    <main>
        <article class="topSections">
            <section class="form">
                <div class="instructions">
                <p>Please enter your information in the form. Fields marked with an asterisk (*) are required.</p>
                <p class="errorMsg"><!-- Add validation error messages here --></p></div>
                <form action="controller.php" method="post" class="formInput">
                    <label for="length" class="formLabel">Loan Length*<br>
                        <select name="length" id="length">
                            <option value="12">12 months</option>
                            <option value="24">24 months</option>
                            <option value="36">36 months</option>
                            <option value="48">48 months</option>
                            <option value="60">60 months</option>
                            <option value="72">72 months</option>
                        </select>
                    </label>
                    <label for="amount" class="formLabel">Loan Amount*<br>
                        <input type="text" name="amount" id="amount" class="formInput"></label>
                    
                    <label for="apr" class="formLabel">Annual Interest Rate*<br>
                        <input type="text" name="apr" id="apr" class="formInput" maxlength="5"> &percnt; </label>
                    <label for="extra" class="formLabel">Extra Payment<br>
                        <input type="text" name="extra" id="extra" class="formInput"></label><br>
                    <input type="submit" value="Calculate!" class="submitBtn">
                </form>
            </section>
<!-- Display the calculations-->
            <section class="results">
                <h3 class="enteredHead">You Entered:</h3>
                <div class="entered">
                        <p>Loan Amount: <!-- <?php echo htmlspecialchars($amount);  ?>--></p> 
                        <p>Loan Length: <!--<?php echo htmlspecialchars($length);  ?>--></p>
                        <p>Annual Interest Rate: <!--<?php echo htmlspecialchars($apr);  ?>--> &percnt;</p>
                        <p>Extra Payments (optional):<!-- <?php echo htmlspecialchars($extra);  ?>--></p>
                </div> <!-- end .entered -->
                <div class="calc">
                    <h3>Monthly Payment Amount</h3>
                        <p>Testing<!-- calculated monthly payments, inc. extra payment --></p>
                    <h3>Total Amount (principle + interest)</h3>
                        <p>Testing<!-- Calculated total amount to be paid for loan --></p>
                    <h3>Total Interest Paid</h3>
                        <p>Testing<!-- Calculated total amount of interest to be paid --></p>
                </div><!-- end .calc -->
                <div class="savings">
                    <p>so there's something here</p>
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
                         <tr><!-- This is going to be a foreach loop -->
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