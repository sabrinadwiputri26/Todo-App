@extends('dashboard.layout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 25rem;">
            <div class="card-body">
              
              <form method="POST" action="{{route('register.input')}}">
                @csrf
                  <fieldset>
                    <strong><legend>Register</legend></strong>
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Name</label>
                      <input type="text" id="disabledTextInput" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Username</label>
                      <input type="text" id="disabledTextInput" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                       <label for="disabledTextInput" class="form-label">Email</label>
                      <input type="text" id="disabledTextInput" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Password</label>
                      <input type="text" id="disabledTextInput" class="form-control" name="password">
                    <div class="mb-3">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </fieldset>
                </form>
            </div>
          </div>
    </div>
@endsection