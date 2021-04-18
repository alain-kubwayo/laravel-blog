@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-4">
        <div class="w-4/6 bg-blue-200 p-4 rounded-lg">
            <p>Hi {{auth()->user()->name}}, welcome to your dashboard!</p>
        </div>
    </div>

@endsection