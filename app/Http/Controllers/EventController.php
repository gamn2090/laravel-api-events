<?php

namespace App\Http\Controllers;
use App\Http\Requests\Event\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $Event = Event::all();

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Event' => $Event
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in EventController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        try {

            $imageName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('images'), $imageName);
            $saveDir = public_path('images').'/'.$imageName;

            $Event = Event::create([
                'name' => $request->name,
                'local_id' => $request->local_id,
                'artist' => $request->artist,
                'details' => $request->details,
                'capacity' => $request->capacity,
                'image' => $saveDir,
                'date' => $request->date,
            ]);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Event' => $Event
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in EventController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Event = Event::findOrFail($id);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Event' => $Event
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in EventController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        try {
            $imageName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('images'), $imageName);
            $saveDir = public_path('images').'/'.$imageName;

            $Event = Event::findOrFail($id);
            $Event->name = $request->name;
            $Event->local_id = $request->local_id;
            $Event->artist = $request->artist;
            $Event->details = $request->details;
            $Event->capacity = $request->capacity;
            $Event->image = $saveDir;
            $Event->date = $request->date;
            $Event->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'Event' => $Event
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in EventController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $Event = Event::where('active', true)->findOrFail($id);
            $Event->active = false;           
            $Event->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'message' => 'Event Deleted'
                ]
                , 200
            );
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'message' => 'Event Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in EventController.destroy'
            ]);
        }
    }
}
