<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;

class WeatherController extends Controller
{

    function show()
    {
        $data = Forecast::all();
        return view('dashboard', ['forecasts' => $data]);
    }

    //delete item from DB
    function delete($forecast_id)
    {
        $data = Forecast::query()->find($forecast_id);
        $data->delete();
        return redirect('dashboard');
    }

    public function add(Request $request)
    {


        $request->validate([
           'id' => 'required',
           'counties' => 'required',
           'date' => 'required',
           'min_temp' => 'required',
           'max_temp' => 'required',
           'wind_speed_day' => 'required',
           'wind_dir_day' => 'required',
           'wind_speed_night' => 'required',
           'wind_dir_night' => 'required'
        ]);
        $nonce = 1;

        $forecast = new Forecast;
//        $forecast->fill([
//           'id' => $request->id,
//           'location' => $request->location,
//            'date' => $request->date,
//            'min_temp' => $request->min_temp,
//            'max_temp' => $request->max_temp,
//            'wind_speed' => $request->wind_speed_day,
//            'wind_dir' => $request->wind_dir_day,
//            'wind_speed_night' => $request->wind_speed_night,
//            'wind_dir_night' => $request->wind_dir_night
//        ]);

        $forecast->id = $request->id;
        $forecast->location = $request->counties;
        $forecast->date = $request->date;
        $forecast->min_temp = $request->min_temp;
        $forecast->max_temp = $request->max_temp;
        $forecast->wind_speed = $request->wind_speed_day;
        $forecast->wind_dir = $request->wind_dir_day;
        $forecast->wind_speed_night = $request->wind_speed_night;
        $forecast->wind_dir_night = $request->wind_dir_night;
        $save = $forecast->save();

//        $fetchedPost = Weather::find($forecast->id);
//        dd($fetchedPost);

//        DB::table('forecasts')->insert([
//            'id' => $request->id,
//            'location' => $request->counties,
//            'date' => $request->date,
//            'min_temp' => $request->min_temp,
//            'max_temp' => $request->max_temp,
//            'wind_speed' => $request->wind_speed_day,
//            'wind_dir' => $request->wind_dir_day,
//            'wind_speed_night' => $request->wind_speed_night,
//            'wind_dir_night' => $request->wind_dir_night
//        ]);
//            return redirect('dashboard')->with('status', "Insert Successful");

        if($save){
            return redirect('dashboard')->with('status', "Insert Successful");
        }else{
            return back()->with('Entry failed');
        }
    }
    //edit items in DB
    function showData($forecast_id)
    {
        $data = Forecast::query()->find($forecast_id);
        return view('edit', ['data'=>$data]);
    }

//    public function update($forecast_id)
//    {
//        $post =
//    }
}
