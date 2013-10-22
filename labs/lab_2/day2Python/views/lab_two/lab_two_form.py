
<div class = "eight colmns">

    <form
    action = "index.py?action=lab_one_form"
    method="post"
    id="lab_two_form">

        <div class="container">
            <div class="eight columns offset-by-one">

                 <div class="six columns formItem">
                    <h5>Lab Two Form</h5>
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="first_name"></input>
                </div>

                <div class="five columns formItem">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="last_name"></input>
                </div>

                <div class="five columns formItem">
                    <label for="formDate">Date:</label>
                    <input type="date" id="formDate" name="form_date"></input>
                </div>

                 <div class="five columns formItem">
                    <label for="formNumber">Number:</label>
                    <input type="number" id="formNumber" name="form_number"></input>
                </div>

                 <div class="five columns formItem">
                    <label for="formCurrency">Currency</label>
                    <input type="number" id="formCurrency" name="form_currency" ></input>
                </div>

                 <div class="five columns formItem">
                    <label for="formUrl">Url:</label>
                    <input type="url" id="formUrl" name="form_url"></input>
                </div>

                 <div class="five columns formItem">
                    <label for="formSelect">Select:</label>
                    <select multiple id="formSelect" name="form_select">
                        <option value="lab_one">Lab One</option>
                        <option value="lab_two" selected>Lab Two</option>
                        <option value="lab_three">Lab Three</option>
                        <option value="lab_four">Lab Four</option.
                    </select>
                </div>

                 <div class="five columns formItem" id="formRadios">
                    <label>Sex:</label>
                    <input type="radio" name="sex" value="male" id="sex1">Male<br>
                    <input type="radio" name="sex" value="female" id="sex2">Female
                </div>

                <div class="five columns formItem">
                    <label for="formCheckBoxOne">Do you agree to the terms and agreements?</label>
                    <input type="checkbox" id="formCheckBoxOne" name="agree">agree</input>
                    <label for="formCheckBoxTwo">Would you like to be added to our mailing list?</label>
                    <input type="checkbox" id="formCheckBoxTwo" name="form_mailing_list">sign me up</input>
                </div>
                <div class="five columns formItem">
                    <input type="submit"></input>
                </div>
            </div><!-- end inner container -->
        </div><!-- end container -->
    </form>
</div>
<!-- end of new user form
------------------------------------- -->