<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Enquiry::create([...$request->validated(), 'phone' => $request->validated('number'), 'source' => 'contact']);

        return back()->with('contact_status', 'Thank you. Your message has been received.');
    }
}
