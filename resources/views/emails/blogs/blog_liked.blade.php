@component('mail::message')
# Your blog was liked

{{$liker->name}} liked one of your blogs. 

@component('mail::button', ['url' => route('blog.show', $blog)])
Open the blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
