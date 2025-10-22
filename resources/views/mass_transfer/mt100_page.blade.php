<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MT100</title>
</head>
<body>

    <h1>MT100 Data Generator</h1>
    <form method="POST">
        @csrf
        <label>Filename:</label><input type="text" name="filename"><br>
        <label>CustRefNo:</label><input type="text" name="cust_ref_no"><br>
        <label>ValueDate:</label><input type="date" name="value_date"><br>
        <label>Currency:</label><input type="text" name="currency"><br>
        <label>Amount:</label><input type="number" name="amount"><br>
        <label>Debit Account:</label><input type="text" name="debit_account"><br>
        <label>BenBankIdentifier:</label><input type="text" name="ben_bank_identifier"><br>
        <label>InstructionCode:</label><input type="text" name="instruction_code"><br>
        <label>Sender Name:</label><input type="text" name="sender_name"><br>
        <label>Beneficiary Address:</label><input type="text" name="beneficiary_address"><br>
        <label>Credit Account:</label><input type="text" name="credit_account"><br>
        <label>Beneficiary Name:</label><input type="text" name="beneficiary_name"><br>
        <label>TrxRemark:</label><input type="text" name="trx_remark"><br>
        <label>Charge Type:</label><input type="text" name="charge_type"><br>
        <label>Notification:</label><input type="email" name="notification"><br>
        <label>Jumlah Baris:</label><input type="number" step="1" name="total_rows"><br>
        <button type="submit">Generate TXT</button>
    </form>
    
</body>
</html>