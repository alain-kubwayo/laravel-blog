@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-4">
        <div class="w-1/2 bg-blue-200 p-4 rounded-lg">
            <p class="uppercase text-xl">Login</p>
            @if(session()->has('status'))
                <p class="text-red-500 p-2 mb-2">{{session('status')}}</p>
            @endif
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-4 py-2">
                    <label for="email">Email</label>
                    <input  class="block w-full p-2 @error('email') border-2 border-red-500 @enderror" type="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
                </div>
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                
                <div class="mb-4 py-2">
                    <label for="password">Password</label>
                    <input  class="block w-full p-2 @error('password') border-2 border-red-500 @enderror" type="password" name="password" placeholder="Enter your password">
                </div>
                @error('password')
                    <p class="text-red-500">{{$message}}</p>
                @enderror

                <div class="mb-4 py-2">
                    <input type="checkbox" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <div>
                    <button class="bg-blue-400 hover:bg-blue-300 p-2 rounded-lg w-full">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection