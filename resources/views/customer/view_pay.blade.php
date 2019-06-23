<div class="pay1_modal-content">

    <div style="margin: -19px -127px 19px 0px;">
        <img src="{{asset('img/close.png')}}" style="width:40px;height: 40px;margin-right: 8px;" class="close" onclick="$('#thirdModal').modal('toggle')" />
    </div>

    <div style="text-align: center; margin-bottom: 15px;">
        <div style="font-size: 50px;font-weight: 400;margin-bottom: 20px;">
            <span>Thank you</span>
        </div>
        <div style="font-size: 25px;">
            <span>
                Your bill has been created.<br>
                Please make a payment at the reception.
            </span>
        </div>
    </div>

    <div style="text-align: center;">
        <table style="background-image: url({{ asset('img/paper.png') }}); background-repeat: no-repeat;background-position:center;margin-left: 106px;
                height: 360px; width: 320px; padding: 20px 30px 90px 30px;">
            <tr>
                <td align="left" colspan="2">
                    <span style="font-size: 18px;">Table number:</span><br>
                    <span style="font-size: 22px;"><b>{{ $table_name }}</b></span>
                </td>
            </tr>
            <tr><td height="10px"></td></tr>
            <tr>
                <td align="left" colspan="2">
                    <span style="font-size: 18px;">Starting time:<br></span>
                    <span style="font-size: 22px;"><b>{{date('H:i, d F Y', strtotime($starting_time))}}</b></span>
                </td>
            </tr>
            <tr><td height="10px"></td></tr>
            <tr>
                <td align="left">
                    <span style="font-size: 22px;"><b>Total:</b></span>
                </td>
                <td align="left">
                    <span style="font-size: 22px;"><b>${{ $total }}</b></span>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <span style="font-size: 18px;">Without GST:</span>
                </td>
                <td align="left">
                    <span style="font-size: 18px;">${{ $without_gst_price }}</span>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <span style="font-size: 18px;">GST:</span>
                </td>
                <td align="left">
                    <span style="font-size: 18px;">${{ $gst_price }}</span>
                </td>
            </tr>
        </table>
    </div>

</div>

