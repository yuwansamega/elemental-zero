<!DOCTYPE html>
<html>
<head>
    <title>Data Generator</title>
</head>
<body>
    <h1>Data Generator Form</h1>
    <form method="POST" action="{{ route('generateAlfaria') }}">
        @csrf
        <label>Filename:</label><input type="text" name="filename"><br>
        <label>CustRefNo:</label><input type="text" name="cust_ref_no"><br>
        <label>InstructionCode:</label><input type="text" name="instruction_code"><br>
        <label>ValueDate:</label><input type="date" name="value_date"><br>
        <label>Debit Account:</label><input type="text" name="debit_account"><br>
        <label>Sender Name:</label><input type="text" name="sender_name"><br>
        <!-- <label>BenBankIdentifier:</label><input type="text" name="ben_bank_identifier"><br> -->
        <label>BenBankCode:</label><input type="number" name="ben_bank_code"><br>
        <label>Credit Account:</label><input type="text" name="credit_account"><br>
        <label>Beneficiary Name:</label><input type="text" name="beneficiary_name"><br>
        <label>Beneficiary Address:</label><input type="text" name="beneficiary_address"><br>
        <label>City:</label><input type="text" name="city"><br>
        <label>Amount:</label><input type="number" name="amount"><br>
        <label>Currency:</label><input type="text" name="currency"><br>
        <label>TrxRemark:</label><input type="text" name="trx_remark"><br>
        <label>Notification:</label><input type="email" name="notification"><br>
        <label>Charge Type:</label><input type="text" name="charge_type"><br>
        <label>Jumlah Baris:</label><input type="number" step="1" name="total_rows"><br>
        <button type="submit">Generate TXT</button>
    </form>
</body>
</html>
