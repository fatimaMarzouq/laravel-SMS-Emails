@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Delete Customer {{$customer->name}}. Are you sure?</h6>
        <form method="post" action="/deletecustomer">
        @csrf <!-- {{ csrf_field() }} -->
        <input type="hidden" name='id' value="{{$customer->id}}">
          <button class="btn btn-primary" type="submit">Delete Customer</button>
          <a href="{{route('customers-list')}}" class="btn btn-primary">Cancel<a>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
