<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Guest;
use App\VisitorLogs;
use Carbon\Carbon;

class LogVisitors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:visitors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logs the history of all the visitors that visited the website';

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
        $guests = Guest::all();
        foreach($guests as $guest) {
            $current_time = Carbon::now();
            $update_time = $guest->updated_at;
            //    \Log::info(($update_time->diffInMinutes($current_time)));
            if(($update_time->diffInMinutes($current_time)) >= 5){
            //    \Log::info($guest->path);
            //    \Log::info($guest->ua_browser);
                $visitorlogs = new VisitorLogs();

                $visitorlogs->cookie_id = $guest->cookie_id;
                $visitorlogs->ip_address = $guest->ip_addresscityregion;
                $visitorlogs->cityregion = $guest->cityregion;
                $visitorlogs->region = $guest->region;
                $visitorlogs->region_code = $guest->region_code;
                $visitorlogs->country = $guest->country;
                $visitorlogs->country_code = $guest->country_code;
                $visitorlogs->timezone = $guest->timezone;
                $visitorlogs->isp = $guest->isp;
                $visitorlogs->latitide = $guest->latitide;
                $visitorlogs->longitude = $guest->longitude;
                $visitorlogs->path = $guest->path;
                $visitorlogs->ua_type = $guest->ua_type;
                $visitorlogs->ua_os = $guest->ua_os;
                $visitorlogs->ua_browser = $guest->ua_browser;
                $visitorlogs->name = $guest->name;
                $visitorlogs->email = $guest->email;
                $visitorlogs->date = $guest->created_at->format('d-m-Y');
                $visitorlogs->visited_at = $guest->created_at;
                $visitorlogs->left_at = $guest->updated_at;

                $visitorlogs->save();

                $guest->delete();
                \Log::info($guest->id+"  Deleted");
            }
        }
    }

    }
}
