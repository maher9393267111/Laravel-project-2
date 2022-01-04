<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

Hi.... <b style="float: left"> {{Auth::user()->name}} </b>



<span style="float: right">Total users {{count($users)}}</span>



        </h2>
    </x-slot>

    <div class="py-12">

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

@php($i=1)




@foreach ($users as $user)


    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at}}</td>
    </tr>
@endforeach

  </tbody>
</table>



            </div>
        </div>
    </div>
</x-app-layout>
