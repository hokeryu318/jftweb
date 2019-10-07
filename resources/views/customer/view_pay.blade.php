<div style="background-color: black;height: 100%;">
    <div class="white-square">
        <div style="text-align: center; margin-top: 55px; margin-bottom: 15px;">
            <div style="font-size: 50px;font-weight: 400;margin-bottom: 20px;">
                <span>Thank you</span>
            </div>
            <div style="font-size: 25px;">
                <span>
                    Your bill has been created.<br>
                </span>
            </div>
        </div>

        <div style="text-align: center;">
            <table style="background-image: url({{ asset('img/paper.png') }}); background-repeat: no-repeat;background-position:center;margin-left: 250px;
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
                        <span style="font-size: 22px;"><b>{{date('H:i, d M Y', strtotime($starting_time))}}</b></span>
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
</div>


<style>
    .white-square {
        background-color: white;
        width: 80%;
        height: 80%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
