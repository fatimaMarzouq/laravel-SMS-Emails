
@extends('layout.master')
@push('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
  jQuery(document).ready(function(){
    // console.log("hi");
    if(jQuery('input#formSwitch1')){
      jQuery('input#formSwitch1').on('change', function() {
      jQuery('input#formSwitch1').not(this).prop('checked', false);  
});
    }
    
  });
</script>
@endpush
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">urls list</h6>
        <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
        <div class="table-responsive">
          <table class="table table-hover table-sm">
              <thead>
              <tr>
                <th>Name</th>
                <th>Url</th>
                <th>Status</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($urls as $url)
                <tr><form method="post" action="/saveurl">
        @csrf <!-- {{ csrf_field() }} -->
        
          
                <td>{{$url->name}}</td>
                <td>
                  <input type="hidden" name='id' value="{{$url->id}}">
            <input type="url" name="url" class="form-control" id="url" placeholder="Enter Url" value="{{$url->url}}">
            @error('url')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </td>
                <td>
                <div class="form-check form-switch my-2">
                <input type="checkbox" class="form-check-input" name="status" id="formSwitch1" value="1"
                @if($url->status==1)
                checked
                @elseif($url->status==0)
                " "
                @endif
                >
              <label class="form-check-label" for="formSwitch1">Activate</label>
</div>
  
                </td>
                <td><button type="submit" class="btn btn-primary">Save</button></td>
</form>
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
