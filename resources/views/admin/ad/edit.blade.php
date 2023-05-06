@extends('layouts.app')
@section('content')
<div class="p-4">
    <h2 class="text-4xl font-bold border-b-4 border-blue-400">Edit Ad</h2>

    <form action="{{route('ad.update', $ad->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf

        <input type="text" name="description" class="w-full rounded-lg mt-2" placeholder="Enter Description" value="{{$ad->description}}">
        @error('description')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror

        <input type="text" name="code" class="w-full rounded-lg mt-2" name="code" placeholder="Enter Code" value="{{$ad->code}}">
        @error('code')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror

        <input type="hidden" name="oldpath" value="{{$ad->photopath}}">
        <p>Current Ad</p>
        <div class="w-12">
        <img class="w-20" src="{{asset('images/ad/' .$ad->photopath)}}" alt="">
        </div>

        <input type="file" class="mt-2" name="photopath">
        @error('photopath')
            <span class="text-red-600 -mt-4">*{{$message}}</span>
        @enderror

        <div class="mt-5 flex">
            <input type="submit" value="Update Ad" class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer mx-2">
            <a href="{{route('ad.index')}}" class="bg-red-600 text-white px-6 py-2 rounded-lg cursor-pointer mx-2">Exit</a>
        </div>
    </form>
</div>
@endsection