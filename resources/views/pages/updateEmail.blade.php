@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Email</h6>
        <form method="post" action="/updateemail">
        @csrf <!-- {{ csrf_field() }} -->
        <input type="hidden" name='id' value="{{$email->id}}">
          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" value="{{$email->subject}}">
            @error('subject')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" id="message" placeholder="Enter your message">{{$email->Message}}</textarea>
            @error('message')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- <div class="mb-3">
            <label class="form-label" for="formFile">File upload</label>
            <input class="form-control" name="formFile" type="file" id="formFile">
          </div> -->
          <button class="btn btn-primary" type="submit">Update Email</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
