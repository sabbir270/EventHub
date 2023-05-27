<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{


    public function showSingleEvent($id){
        $event=Event::find($id);
        return view('singleevent',[
            'event'=>$event
        ]);
    }
    public function showEventFormPage(){
        return view('createevent');
    }
    public function saveEvent(Request $request){
        $eventFields=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'location'=>'required',
            'start_date'=>'required',
        ]);
         if($request->hasFile('logo')){
             $eventFields['logo']=$request->file('logo')->store('eventLogo','public');
         }
         $eventFields['user_id']=auth()->id();
        Event::create($eventFields);
        //Event::create($eventFields);
        //dd($request->file('logo'));


        return redirect()->back()->with('message','event created successfully');
    }
    public function showEditEventPage(Event $event){
        return view('editevent',[
            'event'=>$event
        ]);
    }
    public function updateEvent(Request $request, Event $event){
        $eventFields=$request->validate([
            'title'=>'required',
            'location'=>'required',
            'description'=>'required',
            'start_date'=>'required',
        ]);
        // if($request->hasFile('logo')){
        //     $jobFields['logo']=$request->file('logo')->store('companyLogo','public');
        // }
        $event->update($eventFields);
        return back()->with('message','event updatedted successfully');
    }
    public function deleteEvent(Event $event){
        $event->delete();
        return redirect('/')->with('message','event deleted successfully');
    }
    public function showManagePage(){
        return view('manageEvent',['events'=>auth()->user()->events()->get()]);
    }
   

}
