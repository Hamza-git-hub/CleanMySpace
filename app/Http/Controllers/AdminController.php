<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <-- Add this line
use App\Models\ClassicService;
use App\Models\PlatinumService;
use App\Models\PremiumService;
use App\Models\ContactUs;
use App\Models\Team;

use App\Models\Service;

class AdminController extends Controller
{
    // Approve Classic Service
    public function approveClassicService($id)
    {
        $classicService = ClassicService::findOrFail($id);
        $classicService->status = 'approved';
        $classicService->save();

        return redirect()->back()->with('success', 'Classic Service Approved Successfully');
    }

    // Reject Classic Service
    public function rejectClassicService($id)
    {
        $classicService = ClassicService::findOrFail($id);
        $classicService->status = 'rejected';
        $classicService->save();

        return redirect()->back()->with('success', 'Classic Service Rejected Successfully');
    }

    // Approve Platinum Service
    public function approvePlatinumService($id)
    {
        $platinumService = PlatinumService::findOrFail($id);
        $platinumService->status = 'approved';
        $platinumService->save();

        return redirect()->back()->with('success', 'Platinum Service Approved Successfully');
    }

    // Reject Platinum Service
    public function rejectPlatinumService($id)
    {
        $platinumService = PlatinumService::findOrFail($id);
        $platinumService->status = 'rejected';
        $platinumService->save();

        return redirect()->back()->with('success', 'Platinum Service Rejected Successfully');
    }

    // Approve Premium Service
    public function approvePremiumService($id)
    {
        $premiumService = PremiumService::findOrFail($id);
        $premiumService->status = 'approved';
        $premiumService->save();

        return redirect()->back()->with('success', 'Premium Service Approved Successfully');
    }

    // Reject Premium Service
    public function rejectPremiumService($id)
    {
        $premiumService = PremiumService::findOrFail($id);
        $premiumService->status = 'rejected';
        $premiumService->save();

        return redirect()->back()->with('success', 'Premium Service Rejected Successfully');
    }

    public function index()
    {
        $classics = ClassicService::all(); // Example query to fetch data
        return view('admin.adminhomepage', ['classics' => $classics]);
    }

    public function platinumview()
    {
        $platinum = PlatinumService::all();
        return view("admin.platinumpannel", compact('platinum'));
    }

    public function premiumview()
    {
        $premium = PremiumService::all();
        return view("admin.premiumpannel", compact('premium'));
    }

    public function contactusview()
    {
        $contactus = ContactUs::all();
        return view("admin.contactuspannel", compact('contactus'));
    }

    public function ServicesStatus()
    {
        $user = Auth::user();

        $statusClassic = ClassicService::all();
        $statusPremium = PremiumService::all();
        $statusplatinum = PlatinumService::all();

        return view("users.servicestatus", compact('statusClassic', 'statusPremium', 'statusplatinum'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');
        }

        // Store team member details in the database
        Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Team member added successfully!');
    }

    public function createTeamMember()
    {
        return view('admin.addTeamMember');
    }

    public function editTeamMember($id)
    {
        // Fetch the specific team member
        $member = Team::find($id);

        return view('admin.editTeamMember', compact('member'));
    }

    public function updateTeamMember(Request $request, $id)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Fetch the existing team member
        $member = Team::find($id);

        // Check if member exists
        if (!$member) {
            return redirect()->route('admin.members')->with('error', 'Team member not found.');
        }

        // Handle image upload if updated
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::disk('public')->delete($member->image);

            // Store the new image
            $imagePath = $request->file('image')->store('team_images', 'public');
            $member->image = $imagePath;
        }

        // Update the team member details
        $member->name = $request->name;
        $member->role = $request->role;
        $member->details = $request->details;
        $member->save();

        return redirect()->route('admin.members')->with('success', 'Team member updated successfully!');
    }

    public function deleteTeamMember($id)
    {
        // Find the team member by ID
        $member = Team::find($id);

        // Delete the image from storage
        Storage::disk('public')->delete($member->image);

        // Delete the team member from the database
        $member->delete();

        return redirect()->route('admin.members')->with('success', 'Team member deleted successfully!');
    }

    public function showTeamMembers()
    {
        // Fetch all team members from the database
        $teamMembers = Team::all();

        // Pass the data to the view
        return view('admin.members', compact('teamMembers'));
    }

    public function storeservice(Request $request)
    {
        $request->validate([
            'category' => 'required|in:Classic,Premium,Platinum,Other', // Validate against the defined categories
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'details' => 'required|string|max:5000', // Add validation for details
        ]);

        $service = new Service();
        $service->category = $request->category;
        $service->name = $request->name;
        $service->price = $request->price;
        $service->details = $request->details; // Save service details

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $service->image = $request->file('image')->store('public/services');
        }

        $service->save();

        return redirect()->back()->with('success', 'Service added successfully!');
    }

public function create()
{
    return view('admin.addService');
}


public function showServices() {
    $services = Service::all(); // Fetch all services from the database
    return view('admin.viewServices', compact('services'));
}

// Update an existing service
public function edit($id) {
    $service = Service::findOrFail($id); // Find the service by ID
    return view('admin.editService', compact('service')); // Return the edit view
}

public function update(Request $request, $id) {
    $request->validate([
        'category' => 'required|in:Classic,Premium,Platinum,Other',
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048',
        'details' => 'required|string|max:5000',
    ]);

    $service = Service::findOrFail($id);
    $service->category = $request->category;
    $service->name = $request->name;
    $service->price = $request->price;
    $service->details = $request->details;

    // Handle image upload if present
    if ($request->hasFile('image')) {
        // Optionally delete the old image file if it exists
        if ($service->image) {
            Storage::delete($service->image);
        }
        $service->image = $request->file('image')->store('public/services');
    }

    $service->save();

    return redirect()->route('admin.viewServices')->with('success', 'Service updated successfully!');
}

// Delete a service
public function destroy($id) {
    $service = Service::findOrFail($id);
    // Optionally delete the image file if it exists
    if ($service->image) {
        Storage::delete($service->image);
    }
    $service->delete();

    return redirect()->route('admin.viewServices')->with('success', 'Service deleted successfully!');
}


}
