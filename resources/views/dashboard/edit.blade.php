@extends('dashboard.layout')
@section('content')
<div class="container content">  
    <form id="create-form" action="/dashboard/update/{{$item['id']}}" method="POST">
        @csrf
      <h3>Create Todo</h3>
      @method('PATCH')
      @if ($errors->any())
    <script>
    Swal.fire({
      icon: 'error',
      title: 'Error Validasi',
      text: 'Silahkan isi kembali',
    })
  </script>
    @endif
      <fieldset>
          <label for="">Title</label>
          <input placeholder="title of todo" type="text" name="title" value="{{$item['title']}}">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date" value="{{$item['date']}}">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          <textarea name="description" tabindex="5" >{{$item['description']}}</textarea>
      </fieldset>
      <fieldset>
          <button name="submit" type="submit" id="contactus-submit">Submit</button>
      </fieldset>
      <fieldset>
          <a href="/dashboard/" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>   
    </form>
  </div>
@endsection