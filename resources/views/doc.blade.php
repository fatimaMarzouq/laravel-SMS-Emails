@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome to Documentaion</h4>
  </div>
</div>



<div class="row">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">Customers Section</h6>
        </div>
        <div class="row align-items-start mb-2">
          <div class="col-md-7">
            <p class="text-muted tx-15 mb-3 mb-md-0">Customers are the people who you want to send the message and the emails to encourage them to leave a review.</p>
          </div>
        </div>

        <div class="row align-items-start m-2">

         <h6 class="card-title">Add Customer</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can add customers from <a href="{{ route('add-customer') }}">Add Customer</a> page. Name, Email and Phone are the required feilds and the others are optional. the phone must be with the international code(+).</p>
         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/addCustomer.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#addCustomer">
          <!-- Modal -->
          <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/addCustomer.PNG') }}" >
              </div>
            </div>
          </div>

        </div>
        <div class="row align-items-start m-2">

         <h6 class="card-title mt-2">Customers List</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can list your added customers in <a href="{{ route('customers-list') }}">Customers List</a> page.</p>
         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/CustomerList.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#CustomerList">
<!-- Modal -->
<div class="modal fade" id="CustomerList" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/CustomerList.PNG') }}">
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-start m-2">

         <h6 class="card-title mt-2">Update Customer</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can update an existing customer from the <span class="text-primary">Update</span> customer's button in <a href="{{ route('customers-list') }}">Customers List</a> page. Name, Email and Phone are the required feilds and the others are optional. the phone must be with the international code(+).</p>
         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/updateCustomer.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#updateCustomer">
<!-- Modal -->
<div class="modal fade" id="updateCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/updateCustomer.PNG') }}">
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-start m-2">

         <h6 class="card-title mt-2">Delete Customer</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can delete an existing customer from the <span class="text-primary">Delete</span> customer's button in <a href="{{ route('customers-list') }}">Customers List</a> page. it will redirect you to conformation page, you need to click <span class="text-primary">Delete Customer</span> to complete the deletion or click <span class="text-primary">Cancel</span> to rollback the process</p>
         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/deleteCustomer.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#deleteCustomer">
<!-- Modal -->
<div class="modal fade" id="deleteCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/deleteCustomer.PNG') }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->
<div class="row">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">Sending Section</h6>
        </div>
        <div class="row align-items-start mb-2">
          <div class="col-md-7">
            <p class="text-muted tx-15 mb-3 mb-md-0">Customers are the people who you want to send the message and the emails to encourage them to leave a review.</p>
          </div>
        </div>
        <div class="row align-items-start m-2">

         <h6 class="card-title">Emails & SMS List</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can list your emails & SMS being sent in <a href="{{ route('emails-list') }}">Emails & SMS List</a> page. You will find some statistics to help you listed below:</p>

           <p class="text-muted tx-15 mb-3 mb-md-0 "><span class="text-dark">Type: </span>either email or SMS, and we have 3 emails and one SMS.</p>
           <p class="text-muted tx-15 mb-3 mb-md-0 "><span class="text-dark">Sent: </span>how many times the email/sms was sent.</p>
           <p class="text-muted tx-15 mb-3 mb-md-0 "><span class="text-dark">Clicked: </span>how many times the link inside this email/sms was clicked.</p>

         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/emailsList.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#emailsList">
<!-- Modal -->
<div class="modal fade" id="emailsList" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/emailsList.PNG') }}">
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-start m-2">

         <h6 class="card-title mt-2">Update Email</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can update an email/sms from the <span class="text-primary">Update</span> email/sms's button in <a href="{{ route('emails-list') }}">Emails & SMS List</a> page. Subject and Message are the required feilds.</p>
         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/updateEmail.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#updateEmail">
<!-- Modal -->
<div class="modal fade" id="updateEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/updateEmail.PNG') }}">
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-start m-2">
         <h6 class="card-title mt-2">Redirect To URL</h6>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">You can list the URLs you want to redirect the customers to in <a href="{{ route('url-list') }}">Redirect To URL</a> page. ypu can edit the urls and switch between them by clicking on <span class="text-primary">Activate</span> switch button for the url you want to activate and don't forget to press <span class="text-primary">Save</span> to save the updates you made.</p>
         <p class="text-muted tx-15 mb-3 mb-md-0 ">**You can't choose all of them, only one can be choosen.</p>
         <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/urlList.PNG') }}" style="cursor: zoom-in;" data-toggle="modal" data-target="#urlslist">
<!-- Modal -->
<div class="modal fade" id="urlslist" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100% !important;">
              <div class="modal-content">
              <img class="text-muted tx-15 mt-3 mb-md-0 " src="{{ asset('/assets/images/doc/urlList.PNG') }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endpush
