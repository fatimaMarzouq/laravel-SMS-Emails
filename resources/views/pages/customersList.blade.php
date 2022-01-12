@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Customers list</h6>
        <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Company</th>                
                <th>Date Added</th>
                <th>Invite</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->position}}</td>
                <td>{{$customer->company}}</td>
                <td>{{$customer->created_at}}</td>
                <!-- <td>@if ($customer->link_clicked)
                  <span class="badge bg-success">Clicked</span>
                  @elseif ($customer->email3_sent)
                  <span class="badge bg-danger">3 Emails Sent</span>
                  @elseif ($customer->email2_sent)
                  <span class="badge bg-warning">2 Emails Sent</span>
                  @elseif ($customer->email1_sent)
                  <span class="badge bg-info">1 Email Sent</span>
                  @elseif ($customer->sms_sent)
                  <span class="badge bg-secondary">SMS Sent</span>
                  @else
                  <span class="badge bg-dark">none</span>
                  @endif
                </td> -->
                @if ($customer->sms_sent)
                <td>Invited</td>
                @else
                <td><a href="{{route('invite-customer',$customer->id)}}" class="text-primary">Invite<a></td>
                @endif
                <td><a href="{{route('update-customer',$customer->id)}}" class="btn btn-primary">Update<a></td>
                <td><a href="{{route('delete-customer',$customer->id)}}" class="btn btn-primary">Delete<a></td>
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

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush