<?php

namespace App\Providers;

use App\Events\ChapterCreated;
use App\Events\ProfileImageUploaded;
use App\Events\TagCreated;
use App\Events\TopicCreated;
use App\Events\TypeCreated;
use App\Listeners\ChapterCreatedNotification;
use App\Listeners\ResizeImage;
use App\Listeners\TagCreatedNotification;
use App\Listeners\TopicCreatedNotification;
use App\Listeners\TypeCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProfileImageUploaded::class => [
            ResizeImage::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
