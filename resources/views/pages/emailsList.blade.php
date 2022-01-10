@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Emails list</h6>
        <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
        <div class="table-responsive">
          <table class="table table-hover table-sm">
              <thead>
              <tr>
                <th>Subject</th>
                <th>Type</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($emails as $email)
                <tr>
                <td>{{$email->subject}}</td>
                <td><span class="bg-secondary badge text-uppercase">{{$email->type}}</span></td>
                <td><a href="{{route('update-email',$email->id)}}" class="btn btn-primary">Update<a></td>
              </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
