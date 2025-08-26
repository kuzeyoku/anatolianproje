<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactRequest;
use App\Services\Front\ContactService;
use App\Services\Front\SeoService;
use App\Services\RecaptchaService;

class ContactController extends Controller
{
    public function __construct(private ContactService $contactService, private RecaptchaService $recaptchaService, private SeoService $seoService)
    {
    }
    public function index()
    {
        $this->seoService->index();
        $recaptcha = $this->recaptchaService->getConfig();
        return view('contact', compact("recaptcha"));
    }

    public function send(ContactRequest $request)
    {
        if (!$this->recaptchaService->validation($request->validated()))
            return back()->with("error", __("front/recaptcha.failed"));
        try {
            $this->contactService->sendMail($request->validated());
            return back()
                ->with('success', __('front/contact.send_success'));
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', __('front/contact.send_error'));
        }
    }
}
