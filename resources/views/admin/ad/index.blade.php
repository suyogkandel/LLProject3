@extends('layouts.app')
@section('content')
@include('layouts.message')
<div class="p-4">
    <h2 class="text-4xl font-bold border-b-4 border-blue-400">Ads</h2>
    <div class="my-5 text-right">
        <a href="{{route('ad.create')}}" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Ad</a>
    </div>

    <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Code</th>
            <th>Description</th>
            <th>Ad</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ads as $ad)
        <tr>
            <td>{{$ad->code}}</td>
            <td>{{$ad->description}}</td>
            <td><img class="w-32" src="{{asset('images/ad/'.$ad->photopath)}}" alt=""></td>
            <td>
                <a href="{{route('ad.edit',$ad->id)}}" class="bg-blue-600 text-white rounded-lg px-3 py-1 mx-1">Edit</a>
                <a onclick="showDelete('{{$ad->id}}')" class="bg-red-600 text-white rounded-lg px-3 py-1 mx-1">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <!-- start of delete box -->
        <div id="deletebox" class=" hidden fixed inset-0 bg-red-500 bg-opacity-50 backdrop-blur-sm">
            <div class="w-full h-full flex items-center justify-center">
                <div class="bg-white w-4/12 h-1/5 rounded-lg p-4 text-center">
                    <p class="font-bold text-3xl">Are you sure to Delete?</p>
                    <form action="{{route('ad.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" id="dataid" name="dataid" value="">
                        <div class="flex justify-center mt-6">
                            <input type="submit" value="Delete" class="bg-blue-600 text-white px-6 mx-2 py-2 rounded-lg cursor-pointer">
                            <a onclick="hideDelete()"class="bg-red-600 text-white px-8 mx-2 py-2 rounded-lg cursor-pointer">No</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end of delete box -->

</div>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<script>
    function showDelete(id)
    {
        $('#deletebox').removeClass('hidden');
        $('#dataid').val(id);
    }
    function hideDelete()
    {
        $('#deletebox').addClass('hidden');

    }
</script>
@endsection