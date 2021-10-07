<?php

namespace App\Jobs;

use App\Mail\UpdatePasswordToNewUser;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUserEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;
    public $passworDefault;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $passworDefault)
    {
        $this->user = $user;
        $this->passworDefault = $passworDefault;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->user->email)->send(
                new UpdatePasswordToNewUser(
                    $this->user,$this->passworDefault
                )
            );
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
        }
    }
}
