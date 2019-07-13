<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
    <h3>Sales Data Report({{ Date('Y/m/d H:i:s') }})</h3>

    <h3> 1. Sales Data </h3>
    <table>
        <tr>
            <td>Total Sales</td>
            <td>{{ $sales_data['total_sales'] }}</td>
        </tr>
        <tr>
            <td>Gross Total</td>
            <td>{{ $sales_data['gross_total'] }}</td>
        </tr>
        <tr>
            <td>Total GST({{ $sales_data['gst_pr'] }}%)</td>
            <td>{{ $sales_data['total_gst'] }}</td>
        </tr>
        <tr>
            <td>Guest</td>
            <td>{{ $sales_data['guest'] }}</td>
        </tr>
        <tr>
            <td>Cash Income</td>
            <td>{{ $sales_data['cash_income'] }}</td>
        </tr>
        <tr>
            <td>Cash Count</td>
            <td>{{ $sales_data['cash_count'] }}</td>
        </tr>
        <tr>
            <td>Card Total</td>
            <td>{{ $sales_data['card_total'] }}</td>
        </tr>
        <tr>
            <td>Card Count</td>
            <td>{{ $sales_data['card_count'] }}</td>
        </tr>
        <tr>
            <td>Refund</td>
            <td>{{ $sales_data['refund_total'] }}</td>
        </tr>
        <tr>
            <td>Discount</td>
            <td>{{ $sales_data['discount_total'] }}</td>
        </tr>
        <tr>
            <td>Tip Total</td>
            <td>{{ $sales_data['tip_total'] }}</td>
        </tr>
    </table>

    <h3> 2. Card Sales Data </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 3. Discounts </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 4. Canceled Items </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 5. Hour Sales Data </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 6. Category Sales Data </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 7. Item Sales Data </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 8. Hourly Item Ranking </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>

    <h3> 9. Hourly Cooktime Ranking </h3>
    <table>
        <tr>
            <td>

            </td>
        </tr>
    </table>


    </body>

    <style>
        table td {
            border: 1px solid #000000;
        }
    </style>

</html>

