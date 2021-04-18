@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-4">
        <div class="w-4/6 bg-blue-200 p-4 rounded-lg">
            <div>
            <h1 class="text-lg uppercase">{{$user->username}}'s Blogs</h1>
            <p>Wrote {{$user->blogs->count()}} {{Str::plural('blog', $user->blogs->count())}} that got {{$user->receivedLikes->count()}} total likes.</p>
            </div>
            
            @foreach($blogs as $blog)
                <x-blog :blog="$blog"/>
            @endforeach
        </div>
    </div>

@endsection