@extends('layouts.app')
@section('content')
<div class="p-4">
    <h2 class="text-4xl font-bold border-b-4 border-blue-400">Edit Notice</h2>

    <form action="{{route('notice.update', $notice->id)}}" method="POST" class="mt-5">
        @csrf

        <input type="text" name="notice" class="w-full rounded-lg mt-2" placeholder="Enter Notice Name" value="{{$notice->notice}}">
        @error('notice')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror

        <input type="number" name="priority" class="w-full rounded-lg mt-2" name="priority" placeholder="Enter Priority" value="{{$notice->priority}}">
        @error('priority')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror

        <div class="mt-5 flex">
            <input type="submit" value="Update Notice" class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer mx-2">
            <a href="{{route('notice.index')}}" class="bg-red-600 text-white px-6 py-2 rounded-lg cursor-pointer mx-2">Exit</a>
        </div>
    </form>
</div>
@endsection