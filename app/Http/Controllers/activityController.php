<?php

namespace App\Http\Controllers;

use App\ModelActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Validator;

class activityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){
        $data = ModelActivity::all();
        return [
            'response' => '200',
            'data'     => $data,
        ];
    }
    public function show($user_id){
        $data = ModelActivity::where('user_id',$user_id)->orderBy('created_at', 'DESC')->take(50);
        return response ($data,compact('data'));
    }


    public function create (Request $request){

            $data             = new ModelActivity;
            $data->user_id    = $request->user_id;
            $data->activity   = $request->activity;
            $data->status     = $request->status;
            $success          = $data->save();
        if(!$success)
        {
            return [
                'response' => '500',
                'Message'  => 'Error Saving',
            ];
        }
        return [
            'response' => '201',
            'Message'  => 'Saving',
        ];
        }

}
