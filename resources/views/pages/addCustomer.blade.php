@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Add Customer</h6>
        <form method="post" action="/storecustomer">
        @csrf <!-- {{ csrf_field() }} -->
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Input</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">position</label>
            <input type="text" name="position" class="form-control" id="position" placeholder="Enter position">
          </div>
          <div class="mb-3">
            <label for="company" class="form-label">company</label>
            <input type="text" name="company" class="form-control" id="company" placeholder="Enter company">
          </div>
          <!-- <div class="mb-3">
            <label class="form-label" for="formFile">File upload</label>
            <input class="form-control" name="formFile" type="file" id="formFile">
          </div> -->
          <button class="btn btn-primary" type="submit">Add Customer</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
