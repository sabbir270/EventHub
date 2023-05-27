<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registerEvent(Request $request, $eventId){
        // Get the authenticated attendee user (assuming you have implemented authentication)
        $attendee = auth()->user();

            // Check if the user is already registered for the event
        $isRegistered = Registration::where('event_id', $eventId)
        ->where('attendee_id', $attendee->id)
        ->exists();

        if ($isRegistered) {
            // User is already registered, handle accordingly
            // You can redirect back with a flash message or show an error message
            return redirect()->back()->with('message', 'You are already registered');

        } else {
            // User is not registered, proceed with registration process
            // Perform the registration logic here
                    // Create a new registration
            $registration = new Registration();
            $registration->event_id = $eventId;
            $registration->attendee_id = $attendee->id;
            $registration->save();

            // You can perform additional actions here, such as sending confirmation emails, etc.

            // Redirect or return a response as per your application logic
            return redirect()->back()->with('message', 'Registered for event successfully!');
        }
    }
    public function showRegisteredAttendees($eventId)
    {
        // Get the event
        $event = Event::findOrFail($eventId);

        // Get the registered attendees for the event with attendee details
        $attendees = $event->registrations->load('attendee');
        //dd($attendees);

        // Return the view with the attendees data
        return view('registered-attendees', compact('attendees', 'event'));
    }


}

