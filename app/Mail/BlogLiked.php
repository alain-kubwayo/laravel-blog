<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\BlogLiked;
use App\Models\Blog;
use App\Models\User;

class BlogLiked extends Mailable
{
    public $liker;
    public $blog;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Blog $blog)
    {
        $this->liker = $liker;
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.blogs.blog_liked')
            ->subject('Someone Liked your blog');
    }
}
