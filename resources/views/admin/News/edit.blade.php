@extends('layouts.app')
@section('content')
<div class="p-4">
    <h2 class="text-4xl font-bold border-b-4 border-blue-400">Edit News</h2>

    <form action="{{route('news.update', $news->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf

        <input type="text" name="description" class="w-full rounded-lg mt-2" placeholder="Enter Description" value="{{$news->description}}">
        @error('description')
        <span class="text-red-600 -mt-4 ">* {{$message}}</span>
        @enderror

        <input type="text" name="title" class="w-full rounded-lg mt-2" placeholder="Enter Title" value="{{$news->title}}">
        @error('title')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror

        <input type="date" name="news_date" class="w-full rounded-lg mt-2" placeholder="" value="{{$news->news_date}}">
        @error('news_date')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror

        <select name="category_id" class="w-full rounded-lg mt-2" placeholder="">
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $news->category_id ) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <span class="text-red-600 -mt-4">* {{$message}}</span>
        @enderror


        <input type="hidden" name="oldpath" value="{{$news->photopath}}">
        <p>Current Image</p>
        <div class="w-12">
        <img class="w-20" src="{{asset('images/news/' .$news->photopath)}}" alt="">
        </div>

        <input type="file" class="mt-2" name="photopath">
        @error('photopath')
            <span class="text-red-600 -mt-4">*{{$message}}</span>
        @enderror

        <div class="mt-5 flex">
            <input type="submit" value="Update News" class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer mx-2">
            <a href="{{route('news.index')}}" class="bg-red-600 text-white px-6 py-2 rounded-lg cursor-pointer mx-2">Exit</a>
        </div>
    </form>
</div>
@endsection