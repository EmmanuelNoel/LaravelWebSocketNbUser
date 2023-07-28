<?php

namespace App\Listeners;

use App\Events\PostLiked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePostLikes
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostLiked $event): void
    {
        //

        $post = $event->post;
        $likes = $post->likes;
        Broadcast::channel('post.' . $post->id, function ($user) use ($likes) {
            return [
                'id' => $user->id,
                'likes' => $likes,
            ];
        });
    }
}
