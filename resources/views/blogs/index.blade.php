@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-4">
        <div class="w-1/2 bg-blue-200 p-4 rounded-lg">
            @auth
                <form action="{{route('blogs')}}" method="POST">
                    @csrf
                    <div class="mb-4 py-2">
                        <label for="body">Blog Content</label>
                        <textarea name="body" cols="30" rows="10" class="block w-full p-2 rounded @error('body') border-2 border-red-500 @enderror" placeholder="Enter the blog content here" value="{{old('body')}}"></textarea>
                    </div>
                    @error('body')
                        <p class="text-red-500 mb-2">{{$message}}</p>
                    @enderror    
                    <div>
                        <button class="bg-blue-400 hover:bg-blue-300 p-2 rounded-lg w-full">Create</button>
                    </div>
                </form>
            @endauth
            <div class="mt-4">
                @if($blogs->count())
                    @foreach($blogs as $blog)
                        <x-blog :blog="$blog" />
                    @endforeach
                    {{$blogs->links()}}
                @else
                    <p>There are no blogs to view</p>
                @endif
            </div>
        </div>
    </div>
@endsection