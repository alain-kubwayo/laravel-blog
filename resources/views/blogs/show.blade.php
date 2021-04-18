@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-4">
        <div class="w-4/6 bg-blue-200 p-4 rounded-lg">
            <x-blog :blog="$blog" />
        </div>
    </div>
@endsection