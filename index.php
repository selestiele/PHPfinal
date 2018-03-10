<?php include 'view/header.php'; ?>


    <main>
        <article class="topSections">
            <section class="form">
                <p>Please enter your information in the form. Fields marked with an asterisk (*) are required.</p>
                <p class="errorMsg"><!-- Add validation error messages here --></p>
                <form action="#" method="post">
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
                        <input type="text" name="apr" id="apr" class="formInput" maxlength="5"></label>
                    <label for="extra" class="formLabel">Extra Payment<br>
                        <input type="text" name="extra" id="extra" class="formInput"></label><br>
                    <input type="submit" value="Calculate!" class="submitBtn">
                </form>
            </section>
<!-- Display the calculations-->
            <section class="results">
                <div class="entered">
                    
                        <p>Here is the information you entered:</p>
                        <p>Loan Amount: Testing<!-- Amount entered on form or error message --></p> 
                        <p>Loan Length: Testing<!-- Amount entered on form or error message --></p>
                        <p>Annual Interest Rate: Testing<!-- Amount entered on form or error message --></p>
                        <p>Extra Payments (optional): Testing<!-- Amount entered on form or error message --></p>
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
                    <h3>Savings</h3>
                        <p>By making extra payments each month, you will cut your loan duration down to: <!-- Calculated time saved--></p>
                        <p>By making extra payments each month, you will save: <!-- Calculated amount saved --></p>
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