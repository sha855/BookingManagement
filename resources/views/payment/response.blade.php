center>
    @if ($order_status === "Success")
        <br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.
    @elseif ($order_status === "Aborted")
        <br>Thank you for shopping with us. We will keep you posted regarding the status of your order through email.
    @elseif ($order_status === "Failure")
        <br>Thank you for shopping with us. However, the transaction has been declined.
    @else
        <br>Security Error. Illegal access detected.
    @endif

    <br><br>

    <table cellspacing="4" cellpadding="4">
        @foreach ($response as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
</center>