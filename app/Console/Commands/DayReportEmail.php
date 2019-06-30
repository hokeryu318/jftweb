<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Mail\SalesDayReportEmail;

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
        //
//        $now = date('d M Y');
//        $deals = Deal::where('duration', $now)->get();
//        foreach ($deals as $deal){
//            $bar = Bar::find($deal->bar_id);
//            Mail::to($bar->email)->send(new SalesDayReportEmail($deal));
//        }

        Mail::to('jiuhejong@gmail.com')->send(new SalesDayReportEmail('first mail on real server'));
    }
}
