<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewNews2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="p-4">
        <h2 class="text-3xl font-bold text-center my-6">Our News</h2>
        <div class="grid grid-cols-4 gap-10 px-24">
            <div class="col-span-3 grid grid-cols-3 gap-10">
                @foreach($news as $new)
                <div class="rounded-lg shadow relative">
                    <span class="absolute top-1 right-1 bg-red-600 text-white px-1 py-0.5 text-sm">{{$new->category->name}}</span>
                    <img src="{{asset('images/news/' .$new->photopath)}}" class="w-full h-52 object-cover overflow-hidden rounded-t-lg">
                    <div class="p-4">
                        <h2 class="text-xl font-bold">{{$new->title}}</h2>
                        <p class="h-16 overflow-scroll text-gray-600 text-justify">{{$new->description}}</p>
                        <div class="py-4 flex justify-between">
                            <span>Date:{{$new->news_date}}</span>
                            <a href=" " class="bg-blue-600 text-white px-2 py-1 rounded">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div>
                <div class="flex items-center">
                <p class="bg-red-600 text-white p-2 rounded">Popular News</p>
                <hr class="flex-1 border-2 border-red-600">
                </div>
                <div class="grid gap-4">
                @foreach($news as $new)
                <div class="flex bg-slate-100 p-4">
                    <img src="{{asset('images/news/' .$new->photopath)}}" class="w-32 object-cover overflow-hidden" alt="">
                    <p>{{$new->title}}</p>
                </div>
                @endforeach
            </div>  
        </div>
    </div>
</body>
</html>