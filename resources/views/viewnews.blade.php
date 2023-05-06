<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="p-4">
        <h2 class="text-3xl font-bold text-center my-6">Our News</h2>
        <div class="grid grid-cols-3 gap-10 px-24">
            @foreach($news as $new)

            <div class="rounded-lg shadow relative">
                <span class="absolute top-0 right-0 bg-red-600 text-white px-2 py-1">{{$new->category->name}}</span>
                <img src="{{asset('images/news/' .$new->photopath)}}" class="w-full h-52 object-cover overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-bold">{{$new->title}}</h2>
                    <p class="h-16 overflow-scroll text-gray-600 text-justify">{{$new->description}}</p>
                    <div class="py-4 flex justify-between">
                        <span>Date:{{$new->news_date}}</span>
                        <a href=" " class="bg-blue-600 text-white px-4 py-1 rounded">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</body>
</html>