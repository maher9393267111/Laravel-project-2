<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

 <b style="float: left"> Category page </b>



<span style="float: right">Total users </span>



        </h2>
    </x-slot>

    <div class="py-12 container ">

        {{-- <div class="row g-0">
            <div class="col-sm-6 col-md-8">.col-sm-6 .col-md-8</div>
            <div class="col-6 col-md-4">.col-6 .col-md-4</div>
          </div> --}}


          <div class="row g-0  container" style="text-align: center">

{{-- left section --}}

            {{-- <div class=" col-md-8 container">
                <div class="card-header"> --}}


@if(session('success'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('success')}} </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>



                      @endif
{{--
Category
                </div>

<table class="table container">
  <thead>
    <tr>
      <th scope="col">sl no</th>
      <th scope="col">category_name</th>
      <th scope="col">category_id</th>
      <th scope="col">created_at</th>
    </tr>
  </thead>
  <tbody>

    @foreach($categories as $category)
    <tr>

        <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
        <td>{{$category->category_name}}</td>
        <td>{{$category->user->name}}</td>
        <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
        <td>
          <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
          <a href="{{ url('category/softDelete/'.$category->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
@endforeach
</tbody>
</table>
{{ $categories->links() }} --}}



{{-- paginate mthod --}}









</div>

{{-- left secton end --}}

{{-- right  section start --}}

<div class=" card border-dark  col-md-8" style="height:fit-content;">

<div class="card-header">edid brand</div>

<div class="card-body">


    <form class="px-3" action="{{ url('/brand/update/' . $brands->id) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Update Brand Name</label>
            <input type="text" name="brand_name" class="form-control mt-1"
                id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $brands->brand_name }}">
            @error('brand_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
            <input type="file" name="brand_image" class="form-control mt-1"
                id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $brands->brand_image }}">
            @error('brand_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <img src="{{asset($brands->brand_image)}}" style="width: 200px; height: 200px">
        </div>

        <button type="submit" class="btn btn-dark my-2">Update Brand</button>




</div>


</div>

</div>

{{-- row --}}





{{--
trashed section here --}}



{{--
<hr >

<div class="card">
  <div class="card-header">
    Trashed
  </div>
  <div class="card-body">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">User</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <!-- @php($i = 1) -->
            @foreach($trashed_categories as $category)
                <tr>
                    <!-- <th scope="row">{{ $i++ }}</th> -->
                    <th scope="row">{{ $trashed_categories->firstItem()+$loop->index }}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->user->name}}</td>
                    <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                    <td>
                      <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>
                      <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-info">Permanetly Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $trashed_categories->links() }} --}}





            </div>

        {{-- container end p-12 --}}

</x-app-layout>
