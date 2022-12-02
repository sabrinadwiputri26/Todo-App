@extends('dashboard.layout')
@section('content')
    @if (session('notAllowedd'))
        <div class="alert alert-danger">
            Anda Sudah Login
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('succesAdd'))
        <div class="alert alert-success">
            {{ session('succesAdd') }}
        </div>
    @endif
    @if (session('successdelete'))
        <div class="alert alert-warning">
            {{ session('successdelete') }}
        </div>
    @endif
    @if (session('done'))
        <div class="alert alert-success">
            {{ session('done') }}
        </div>
    @endif
    <div class="wrapper bg-white">
        <div class="d-flex align-items-start">
            <div class="d-flex flex-column">
                <div class="h5">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a href="/dashboard/createtodo" class="text-success">Create</a>
                </span>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted  btn"><i class="fa-regular fa-comment"
                            style="margin-right: -10px !important"></i> </span>
                </div>
                <div class="text-muted">{{ $todo->count() }} todos</div>
                <button class="ml-auto btn bg-white text-muted " type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
            </div>
        </div>
        @foreach ($todo as $item)
            <div id="comments" class="mt-1">
                <div class="comment d-flex align-items-start">
                    <div class="mr-2">
                        <label class="option">

                        </label>
                    </div>
                    <div class="d-flex flex-column w-75">
                        <a href="edit/{{ $item['id'] }} "class="text-justify">
                            {{ $item['title'] }}
                        </a>
                        <p> {{ $item['description'] }}</p>
                        <p class="text-muted">{{ $item->status == 1 ? 'completed' : 'On-process' }}
                            <span class="date">{{ \Carbon\Carbon::parse($item['date'])->format('j F, Y ') }}</span>
                        </p>
                        <span class="date">
                            @if ($item->status == 1)
                                selesai pada : {{ \Carbon\Carbon::parse($item['done_time'])->format('j F, Y ') }}
                            @else
                                Target : {{ \Carbon\Carbon::parse($item['date'])->format('j F, Y ') }}
                            @endif
                        </span>
                        @if ($item->status == 1)
                            <span class="fa-solid fa-bookmark text-secondary btn"> </span>
                        @else
                            <div class="d-flex">
                                <form action="{{ route('update-complated', $item['id']) }}"method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-regular-check fa-calender-check ms-1 px-2"></i>Complate</button>
                                </form>
                        @endif
                        <div class="d-flex">
                            <a href="/edit/{{ $item->id }}" type="button" class="btn btn-success mx-3">Edit</a>
                            <form action="/delete/{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="ml-md-4 ml-0">
                        <span class=""></span>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
