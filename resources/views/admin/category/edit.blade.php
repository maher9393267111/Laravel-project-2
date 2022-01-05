<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

 <b style="float: left">edit Category page </b>






        </h2>
    </x-slot>

    <div class="py-12 container ">






{{-- right  section start --}}

<div class=" card border-dark  col-md-4" style="height:fit-content;">

<div class="card-header">edit category</div>

<div class="card-body">

    <form action="{{url('category/update/'.$categories->id)}}" method="POST" class="mb-3">

@csrf
{{-- @method('POST') --}}

        {{-- <label for="exampleFormControlInput1" class="form-label">EDIT category</label> --}}
        <input type="text" name='category_name' value="{{$categories->category_name}}"  class="form-control"  placeholder="category name">

<button type='submit' class=' mt-3 btn btn-primary'>EDIT category</button>


@error('category_name')

<span>{{$message}}</span>


@enderror
      </form>




</div>


</div>







</x-app-layout>
