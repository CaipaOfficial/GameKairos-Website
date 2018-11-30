
<!DOCTYPE html>
<html lang="en">
<head>    
    <?php require ('../../index-view/head-modular.php'); ?>
</head>
<body>
    <div class="container text-center p-5">
        <h1>Payment</h1>
        <p>Make a payment with paysafecard <img src="https://www.paysafecard.com/fileadmin/Website/Dokumente/B2B/logo_paysafecard.jpg" height="48px" /></p>
    </div>
    <div class="container">
        
        <div class="row">
            <div class="col-sm-6 inner-wrapper mt-auto mb-auto">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Test Article</h3>
                    </div>
                    <div class="panel-body" >
                    Awesome Article Description
                    </div>
                    <div>
                        <form method="POST">
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" step="0.01" name="amount" class="form-control" value="0.10" id="amount">
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency:</label>
                                <select name="currency" id="currency" class="form-control">
                                    <option selected value="">Select currency</option>
                                    <option value="EUR" selected>Euro – EUR</option>
                                    <option value="GBP">United Kingdom Pounds – GBP</option>
                                    <option value="NOK">Norway Kroner – NOK</option>
                                    <option value="RON">Romania New Lei – RON</option>
                                    <option value="SKK">Slovakia Koruny – SKK</option>
                                    <option value="TRY">Turkey New Lira – TRY</option>
                                    <option value="USD">United States Dollars – USD</option>
                                </select>
                            </div>

                            <p>The maximum payment amount is 1000 € or equivalent in other currencies</p>
                            <!-- <input type="hidden" name="customer_id" class="form-control" value="<?php //echo md5('test123') ?>"> -->
                            <br/>
                            <button type="submit" name="action" value="payment" class="btn btn-success">pay with paysafecard</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 inner-wrapper mt-auto mb-auto">
                <p>
                    Pay prepaid online. Buy paysafecard and pay cash online.
                </p>
                <p>
                    Pay by simply entering the 16-digit paysafecard PIN or sign up for your personal my paysafecard payments account, top it up with your PINs and pay with just your username and password.
                </p>
                <p>
                    More information is available at <a href="https://www.paysafecard.com" target="_blank"> www.paysafecard.com </a>
                </p>
            </div>
        </div>
    </div>

    </div>
    <div class="container theme-showcase" role="main">
    <?php require ('../../index-view/javascript-modular.php'); ?>    
</body>
</html>






