<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
        </h2>
    </x-slot>

    <div class="py-12">

      <div class="container">
        <div class="row">
          <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-9">
              <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                  <div class="card-header">
                    All Brand
                  </div>
                  <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <!-- @php($i = 1) -->
                            @foreach($brands as $brand)
                                <tr>
                                    <!-- <th scope="row">{{ $i++ }}</th> -->
                                    <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                    <td>{{$brand->brand_name}}</td>
                                    <td>
                                      <img style="width:50px;height:50px;"  src='{{ asset($brand->brand_image) }}' alt='brand logo' />
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}</td>
                                    <td>
                                      <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                                      <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $brands->links() }}
                  </div>
                </div>
                <hr >
            </div>
          </div>
          <div class="col-12 col-sm-3">
            <div class="card">
              <div class="card-header">
                Add Brand
              </div>
              <div class="card-body">
                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="brand_name" id="name">
                    @error('brand_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control" name="brand_image" id="logo">
                    @error('brand_image')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-success">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>