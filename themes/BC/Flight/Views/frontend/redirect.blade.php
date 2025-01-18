<form method="post" name="redirect" action="https://test.ccavenue.ae/transaction/transaction.do?command=initiateTransaction">
    @csrf
    <input type="hidden" name="encRequest" value="{{ $encryptedData }}">
    <input type="hidden" name="access_code" value="{{ $accessCode }}">
    <input type="hidden" name="enc_key" value="{{ $enc_key }}">

    
</form>

<script>
    document.redirect.submit();
</script>
