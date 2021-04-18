@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-4">
        <div class="w-1/2 bg-blue-200 p-4 rounded-lg">
            <p class="uppercase text-xl">Register</p>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-4 py-2">
                    <label for="name">Name</label>
                    <input class="block w-full p-2 @error('name') border-2 border-red-500 @enderror" type="text" name="name" value="{{old('name')}}" placeholder="Enter your name">
                </div>
                @error('name')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="mb-4 py-2">
                    <label for="username">Username</label>
                    <input  class="block w-full p-2 @error('name') border-2 border-red-500 @enderror" type="text" name="username" value="{{old('username')}}"placeholder="Enter your username">
                </div>
                @error('username')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="mb-4 py-2">
                    <label for="email">Email</label>
                    <input  class="block w-full p-2 @error('name') border-2 border-red-500 @enderror" type="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
                </div>
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="mb-4 py-2">
                    <label for="password">Password</label>
                    <input  class="block w-full p-2 @error('name') border-2 border-red-500 @enderror" type="password" name="password" placeholder="Enter your password">
                </div>
                @error('password')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="mb-4 py-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input  class="block w-full p-2 @error('name') border-2 border-red-500 @enderror" type="password" name="password_confirmation" placeholder="Confirm your password">
                </div>
                @error('password_confirmation')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <div>
                    <button class="bg-blue-400 hover:bg-blue-300 p-2 rounded-lg w-full">Register</button>
                </div>
            </form>
        </div>
    </div>

@endsection