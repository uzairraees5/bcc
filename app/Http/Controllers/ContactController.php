<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    // =========================
    // SIMPLE CONTACT FORM
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // 💾 Save to DB
        Contact::create($request->all());

        // 📩 EMAIL
        Mail::raw("
NEW LEAD:

Name: {$request->name}
Email: {$request->email}
Phone: {$request->phone}
Industry: {$request->industry_type}
Service: {$request->service}
Message: {$request->message}
        ", function ($message) {
            $message->to("yourmail@gmail.com")
                    ->subject("New Contact Lead");
        });

        // 🚀 GHL WEBHOOK (SIMPLE FORM DATA)
        /*
        Http::post('YOUR_GHL_WEBHOOK_URL', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'industry_type' => $request->industry_type,
            'service' => $request->service,
            'message' => $request->message,
        ]);
        */

        return back()->with('success', 'Lead sent successfully!');
    }

    // =========================
    // DETAILED CONTACT FORM
    // =========================
    public function detailedStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // 💾 Save lead
        Contact::create($request->all());

        // 📎 FILE HANDLING
        $filePaths = [];
        $fileUrls  = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads', 'public');

                $filePaths[] = storage_path('app/public/' . $path);
                $fileUrls[]  = asset('storage/' . $path);
            }
        }

        // 📩 EMAIL (WITH ATTACHMENTS) — FIXED FOR LARAVEL 12
        Mail::send([], [], function ($message) use ($request, $filePaths) {

            $message->to("yourmail@gmail.com")
                    ->subject("New Detailed Lead");

            $body = "
NEW DETAILED LEAD:

--- CONTACT INFO ---
Name: {$request->name}
Company: {$request->company_name}
Email: {$request->email}
Phone: {$request->phone}
Decision Maker: {$request->maker}

--- PROPERTY INFO ---
Address: {$request->address}
City: {$request->city}
ZIP: {$request->zip_code}
Facility Type: {$request->facility_type}

--- PROPERTY DETAILS ---
Square Feet: {$request->square_feet}
Floors: {$request->floors}
Restrooms: {$request->restrooms}

--- SERVICES ---
Service: {$request->service}
Frequency: {$request->frequency}

--- EXTRA INFO ---
Date: {$request->date}
Time: {$request->time}
Best Time: {$request->best_time}
Notes: {$request->notes}
            ";

            // ✅ IMPORTANT FIX (NO setBody ERROR)
            $message->text($body);

            // 📎 Attach files
            foreach ($filePaths as $file) {
                $message->attach($file);
            }
        });

        // 🚀 GHL WEBHOOK (FULL DATA)
        /*
        Http::post('YOUR_GHL_WEBHOOK_URL', [
            // 👤 Contact Info
            'name' => $request->name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'maker' => $request->maker,

            // 🏢 Property Info
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'facility_type' => $request->facility_type,

            // 📏 Details
            'square_feet' => $request->square_feet,
            'floors' => $request->floors,
            'restrooms' => $request->restrooms,

            // 🧹 Services
            'service' => $request->service,
            'frequency' => $request->frequency,

            // ⏰ Extra
            'date' => $request->date,
            'time' => $request->time,
            'best_time' => $request->best_time,
            'notes' => $request->notes,

            // 📎 Files
            'files' => $fileUrls,
        ]);
        */

        return back()->with('success', 'Thank You For Your Submission!');
    }
}