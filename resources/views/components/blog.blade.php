@props(['blog'=>$blog])

<div class="mb-2 bg-blue-100 p-4">
    <div class="mb-2">
        <span>Blog by</span><a class="text-blue-400 text-lg" href="{{route('users.blogs', $blog->user)}}"> {{$blog->user->name}}</a>
        <span>{{$blog->created_at->diffForHumans()}}</span>
    </div>
    <p>{{$blog->body}}</p>
    @can('delete', $blog)
        <form action="{{route('blog.destroy', $blog)}}" method="POST">
            @csrf 
            @method('DELETE')
            <button class="text-red-400">Delete</button>
        </form>
    @endcan
    <div class="flex items-center gap-2">
        @auth
            @if(!$blog->likedBy(auth()->user()))
                <form action="{{route('blog.likes', $blog)}}" method="POST">
                    @csrf
                    <button class="text-blue-600">Like</button>
                </form>
            @else
                <form action="{{route('blog.likes', $blog)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-blue-600">Unlike</button>
                </form>
            @endif
        @endauth
    </div>
    <div class="mt-2">
        <span>{{$blog->likes->count()}} {{Str::plural('like', $blog->likes->count())}}</span>
    </div>
</div>