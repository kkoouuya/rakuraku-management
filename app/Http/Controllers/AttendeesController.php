<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendee;

class AttendeesController extends Controller
{
    public function index()
    {
        $attendees = Attendee::all();
        return response()->json([
            "message" => "ok",
            "data" => $attendees
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request)
    {
        $attendee = new Attendee();
        $attendee->name = request()->get('name');
        $attendee->dep_id = request()->get('dep_id');
        $attendee->number = request()->get('number');
        $attendee->save();
        $attendees = Attendee::all();
        return response()->json([
            "message" => "Registration Success",
            "data" => $attendees
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        $attendee = Attendee::find($id);
        if($attendee) {
            return response()->json([
                "message" => "ok",
                "data" => $attendee
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                "message" => "Attendee not found"
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }

    public function update(Request $request, $id)
    {
        $attendee = Attendee::find($id);
        if($attendee) { 
            $attendee->in = request()->get('in');
            $attendee->save();
            $attendee = Attendee::find($id);
            return response()->json([
                "message" => "ok",
                "data" => $attendee
            ], 200, [], JSON_UNESCAPED_UNICODE); 
        }else{
            return response()->json([
                "message" => "Attendee not found"
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }
}