<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\AppointmentTime;
use \App\Exceptions\CustomException;
use \App\Http\Resources\AppointmentTimeResource;
use \App\Http\Resources\AppointmentTimeCollection;

class AppointmentTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AppointmentTimeCollection(AppointmentTime::where("status", 1)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posted_data = $request->all();
        $posted_data = $posted_data['data'];
        
        $saved = [];

        if (! empty($posted_data))
        {
            foreach($posted_data as $row)
            {
                $saved[] = AppointmentTime::create($row);
            }
        }
        else
        {
            throw new CustomException("No record posted to store!", 201);
        }

        return response()->json(new AppointmentTimeCollection($saved), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(! AppointmentTime::find($id))
        {
            throw new CustomException("Record not found", 404);
        }
        
        return new AppointmentTimeResource(AppointmentTime::findOrFail($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = AppointmentTime::findOrFail($id);
        $appointment->update($request->all());

        return $appointment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = AppointmentTime::findOrFail($id);
        $appointment->delete();

        return 204;
    }
}
