<?php

namespace App;

use App\Jobs\SendUserEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable, HasApiTokens;


    protected static function boot()
    {
        //php artisan queue:work database --queue="email"
        $new_password = Str::random(rand(8, 15));

        parent::boot();
        if (!app()->runningInConsole()) {

            self::creating(function ($table) use ($new_password) {
                $table->password = bcrypt($new_password);
            });

            self::created(function ($table) use ($new_password) {
                $user = User::find($table->id);
                SendUserEmail::dispatch($user, $new_password)->onQueue("email");
            });

        }
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
