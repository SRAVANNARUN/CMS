@extends('layouts.app')


@section('content')


    <div class="d-flex justify-content-end mb-2 mt-2">
    <a href="{{route('categories.create')}}"><div class="btn btn-primary">Add Category</div></a>
    </div>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->name}}</th>
                <td>
                  <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning btn-sm">Edit</a>
                  <button class="btn btn-danger btn-sm " onclick="handleDelete({{$category->id}})">Delete</button>
                </td>
               

            </tr>
            @endforeach
        </tbody>
      </table>
      <form action="" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <!-- Modal -->
        <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this category?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              </div>
            </div>
          </div>
        </div>
      </form>

@endsection
@section('scripts')
    <script>
      function handleDelete(id){
        var form=document.getElementById('deleteForm')
        form.action='/categories/'+id
        $('#deleteModal').modal('show')
        console.log(form)
      }
    </script>
@endsection

