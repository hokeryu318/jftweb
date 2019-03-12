<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Model\Table;
use App\Model\Receipt;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $table_type = array(1=>'A', 'B', 'C', 'Line');
    public $customers = array(0=>'Takeaway', '30min', '60min', '90min', '120min', 'Unlimited');

    public function get_table_id($table_id)
    {
        $table_display_gets = Table::select('type', 'index')->where('id', $table_id)->get();
        $table_display_type = $table_display_gets[0]->type;
        $table_display_index = $table_display_gets[0]->index;
        $table_display_type = $this->table_type[$table_display_type];
        $table_display_id = $table_display_type.'-'.$table_display_index;
        return $table_display_id;
    }

    public function get_time_data($time)
    {
        if($time <= 12) {
            $display_time = $time.':00 AM';
        }
        else {
            $display_time = $time - 12;
            if($display_time < 10)
                $display_time = '0'.$display_time.':00 PM';
            else
                $display_time = $display_time.':00 PM';
        }
        return $display_time;
    }

    public function get_default_duration()
    {
        $duration_id = Receipt::profile()->customer;
        $default_duration = $this->customers[$duration_id];

        return $default_duration;
    }
}
