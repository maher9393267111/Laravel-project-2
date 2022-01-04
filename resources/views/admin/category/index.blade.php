<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

 <b style="float: left"> Category page </b>



<span style="float: right">Total users </span>



        </h2>
    </x-slot>

    <div class="py-12 ">

        {{-- <div class="row g-0">
            <div class="col-sm-6 col-md-8">.col-sm-6 .col-md-8</div>
            <div class="col-6 col-md-4">.col-6 .col-md-4</div>
          </div> --}}


          <div class="row g-0">

{{-- left section --}}

            <div class=" col-md-8 container">
                <div class="card-header">
Category
                </div>

<table class="table container">
  <thead>
    <tr>
      <th scope="col">slNo</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">create at</th>
    </tr>
  </thead>
  <tbody>


    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>


  </tbody>
</table>

</div>

{{-- left secton end --}}

{{-- right  section start --}}

<div class=" card border-dark  col-md-4" style="">

<div class="card-header">adda category</div>

<div class="card-body">

    <form action="{{route('store.category')}}" method="POST" class="mb-3">

@csrf
{{-- @method('POST') --}}

        <label for="exampleFormControlInput1" class="form-label">add category</label>
        <input type="text" name='category_name'  class="form-control"  placeholder="category name">

<button type='submit' class=' mt-3 btn btn-primary'>adda category</button>


@error('category_name')

<span>{{$message}}</span>


@enderror
      </form>




</div>


</div>

</div>

{{-- row --}}

            </div>

        {{-- container end p-12 --}}

</x-app-layout>
