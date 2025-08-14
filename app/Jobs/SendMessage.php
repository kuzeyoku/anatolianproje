<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\LogController;
use App\Mail\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(Request $request): void
    {
        try {
            Mail::to(settings('contact.email'))
                ->send(new Contact($request));
            LogController::logger('info', 'test edildi');
        } catch (\Exception $e) {
            LogController::logger('error', $e->getMessage());
        }
    }
}
