<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Mail\SalesDayReportEmail;
use Illuminate\Support\Facades\DB;
use Excel;

class DayReportEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send day report emails to manager.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set("Australia/Melbourne");

        Excel::create('sales_data', function($excel) {

            $excel->sheet('Sales Day Report', function($sheet) {

                $order_pay = DB::table('order_pay')->whereDate('created_at', date('Y-m-d'))->get();
                $receipt = DB::table('receipt')->find(1);
                $orders = DB::table('orders')->whereDate('created_at', date('Y-m-d'))->get();

                $sales_data['total_sales'] = 0;
                $sales_data['gross_total'] = 0;
                $sales_data['gst_pr'] = $receipt->gst;
                $sales_data['total_gst'] = 0;
                $sales_data['guest'] = 0;
                $sales_data['cash_income'] = 0;
                $sales_data['cash_count'] = 0;
                $sales_data['card_total'] = 0;
                $sales_data['card_count'] = 0;
                $sales_data['refund_total'] = 0;
                $sales_data['discount_total'] = 0;
                $sales_data['tip_total'] = 0;
                foreach($order_pay as $ord_pay) {
                    $sales_data['total_sales'] += $ord_pay->total;
                    $sales_data['gross_total'] += $ord_pay->without_gst;
                    $sales_data['total_gst'] += $ord_pay->gst;
                    if($ord_pay->pay_method == 'CASH') {
                        $sales_data['cash_income'] += $ord_pay->total;
                        $sales_data['cash_count'] += 1;
                    } else {
                        $sales_data['card_total'] += $ord_pay->total;
                        $sales_data['card_count'] += 1;
                    }
                    $sales_data['refund_total'] += $ord_pay->change;
                    $sales_data['discount_total'] += $ord_pay->discount;
                    $sales_data['tip_total'] += $ord_pay->tip;
                }
                foreach($orders as $order) {
                    $sales_data['guest'] += $order->guest;
                }

                $payments = DB::table('payments')->get();

                $sheet->loadView('emails.sales_day')->with(compact('sales_data'));

            });

        })->store('xlsx', public_path('excel/exports'));

        $filename = public_path().'\excel\exports\sales_data.xlsx';

        Mail::to('jiuhejong@gmail.com')->send(new SalesDayReportEmail($filename));
    }
}
