<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassicService;
use App\Models\PremiumService;
use App\Models\PlatinumService;
use App\Models\Contactus;
use App\Models\Team;
use App\Models\Service;
use App\Models\Booking;

class HomeController extends Controller
{
    public function homepage()
    {
        return view('users.home');
    }

    public function aboutpage()
    {
        return view('users.about');
    }

    public function packagepage()
    {
        // Fetch services from the database
        $services = Service::all();

        return view('users.package', compact('services'));
    }

    public function classicpage()
    {
        return view('users.classic_book');
    }
    public function classicForm(Request $request)
{
    // Validate the input
    $validatedData = $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'service_type' => 'required|array', // Accept an array of services
        'service_type.*' => 'string|max:255', // Validate each service type
        'date' => 'required|date',
        'payment_amount' => 'required|numeric|min:0',
    ]);

    // Check if a booking with the same email and date already exists
    $existingBooking = ClassicService::where('email', $request->input('email'))
        ->where('date', $request->input('date'))
        ->first();

    if ($existingBooking) {
        return redirect()->back()->withErrors(['error' => 'A booking with the same email and date already exists.']);
    }

    // Create new booking
    $classic = new ClassicService();
    $classic->firstname = $request->input('firstname');
    $classic->lastname = $request->input('lastname');
    $classic->email = $request->input('email');
    $classic->phone = $request->input('phone');
    $classic->address = $request->input('address');

    // Store multiple services as a comma-separated string
    $classic->service_type = implode(',', $request->input('service_type'));
    $classic->date = $request->input('date');
    $classic->payment_amount = $request->input('payment_amount');

    // Save and check for success
    if ($classic->save()) {
        return redirect()->back()->with('success', 'Service booked successfully!!!!!');
    } else {
        return redirect()->back()->withErrors(['error' => 'Failed to book the service. Please try again later.']);
    }
}



    public function premiumpackage()
    {
        return view('users.premium_book');
    }

    public function premiumForm(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'room' => 'required|string|max:50',
            'date' => 'required|date|after_or_equal:today',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        // Check if a booking with the same email and date already exists
        $existingBooking = PremiumService::where('email', $request->input('email'))
            ->where('date', $request->input('date'))
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['error' => 'A booking with the same email and date already exists.']);
        }

        // Create new booking
        $premium = new PremiumService();
        $premium->firstname = $request->input('firstname');
        $premium->lastname = $request->input('lastname');
        $premium->email = $request->input('email');
        $premium->phone = $request->input('phone');
        $premium->address = $request->input('address');
        $premium->room = $request->input('room');
        $premium->date = $request->input('date');
        $premium->payment_amount = $request->input('payment_amount');

        // Save and check for success
        if ($premium->save()) {
            return redirect()->back()->with('success', 'Service booked successfully!!!!!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to book the service. Please try again later.']);
        }
    }

    public function platinumpackage()
    {
        return view('users.platinum_book');
    }

    public function platinumForm(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'room' => 'required|string|max:50',
            'date' => 'required|date|after_or_equal:today',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        // Check if a booking with the same email and date already exists
        $existingBooking = PlatinumService::where('email', $request->input('email'))
            ->where('date', $request->input('date'))
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['error' => 'A booking with the same email and date already exists.']);
        }

        // Create new booking
        $platinum = new PlatinumService();
        $platinum->firstname = $request->input('firstname');
        $platinum->lastname = $request->input('lastname');
        $platinum->email = $request->input('email');
        $platinum->phone = $request->input('phone');
        $platinum->address = $request->input('address');
        $platinum->room = $request->input('room');
        $platinum->date = $request->input('date');
        $platinum->payment_amount = $request->input('payment_amount');

        // Save and check for success
        if ($platinum->save()) {
            return redirect()->back()->with('success', 'Service booked successfully!!!!!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to book the service. Please try again later.']);
        }
    }

    public function contactus()
    {
        return view('users.contactus');
    }

    public function contactusform(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $contact = new Contactus();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');

        if ($contact->save()) {
            return redirect()->back()->with('success', 'Message sent successfully!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to send message. Please try again later.']);
        }
    }

    public function deleteClassicService($id)
    {
        $classicService = ClassicService::findOrFail($id);
        $cancellationCharge = $classicService->payment_amount * 0.05; // 5% charge
        // Here you can handle how to deduct this charge from the user's account or record it.

        // Then proceed with deletion
        $classicService->delete();

        // Redirect with a message including the cancellation charge info
        return redirect()->route('user.servicestatus')->with('success', 'Classic service deleted successfully. A 5% cancellation charge of ' . $cancellationCharge . ' has been applied.');
    }

    public function deletePremiumService($id)
    {
        $premiumService = PremiumService::findOrFail($id);
        $cancellationCharge = $premiumService->payment_amount * 0.05; // 5% charge

        $premiumService->delete();

        return redirect()->route('user.servicestatus')->with('success', 'Premium service deleted successfully. A 5% cancellation charge of ' . $cancellationCharge . ' has been applied.');
    }

    public function deletePlatinumService($id)
    {
        $platinumService = PlatinumService::findOrFail($id);
        $cancellationCharge = $platinumService->payment_amount * 0.05; // 5% charge

        $platinumService->delete();

        return redirect()->route('user.servicestatus')->with('success', 'Platinum service deleted successfully. A 5% cancellation charge of ' . $cancellationCharge . ' has been applied.');
    }

        public function ServiceChart()
    {
        return view("users.servicechart");
    }

    public function showTeam()
{
    $teamMembers = Team::all();
    return view('users.team', compact('teamMembers'));
}


public function bookService(Request $request)
{
    // Validate and process the booking form data
    $validatedData = $request->validate([
        'service' => 'required|exists:services,id',
        'customer_name' => 'required|string',
        'contact_number' => 'required|string',
        'address' => 'required|string',
        'date' => 'required|date',
        'payment_amount' => 'required|numeric',
        'payment_method' => 'required|string',
        // Optionally validate UPI or Card details based on payment method
    ]);

    // Save the booking data
    $booking = new Booking();
    $booking->service_id = $request->service;
    $booking->customer_name = $request->customer_name;
    $booking->contact_number = $request->contact_number;
    $booking->address = $request->address;
    $booking->date = $request->date;
    $booking->payment_amount = $request->payment_amount;
    $booking->payment_method = $request->payment_method;

    // Optional: Save UPI or Credit Card details if provided
    if ($request->payment_method == 'UPI') {
        $booking->upi_id = $request->upi_id;
    } elseif ($request->payment_method == 'Credit Card') {
        $booking->card_number = $request->card_number;
        $booking->expiry_date = $request->expiry_date;
        $booking->cvv = $request->cvv;
    }

    $booking->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Your service has been successfully booked!');
}

}
