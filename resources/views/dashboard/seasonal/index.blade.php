@extends('layouts.dashboard')
@section('content')
<style>
    .section-container{
        min-height: 600px;
        background-color: whitesmoke;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
    }

    .campaign-side-link{
        min-height: 190px;
        background-color: #ececec;
    }

    .list-else-message{
        text-align: center;
        padding: 100px;
        color: #b1aeae;
        font-size: 1rem;
    }
</style>

<div class="d-flex justify-content-between">
    <h4 class="">
        Campaigns
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg>
        Messages
    </h4>

    <div class="mb-2">
        <a href="{{route('dashboard.seasonal-message.create')}}" class="btn btn-success btn-sm">Add message</a>
    </div>
</div>


<div class="section-container">

    @if ($messages->count() > 0)
    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Heading</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Created By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($messages as $message)
            <tr>
                <td scope="row">{{$message->id}}</td>
                <td>{{$message->heading}}</td>
                <td>{{$message->status}}</td>
                <td>{{$message->created_at->isoFormat('LL')}}</td>
                <td>{{$message->admin->name}}</td>

                <td class="d-flex">
                    <span><a href="#" class="btn btn-success btn-sm">VIEW</a></span>
                    <span class="mx-1">
                        <form action="{{route('dashboard.seasonal-message.destroy', $message->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm ml-2">DELETE</button>
                        </form>
                    </span>


                </td>
            </tr>
            @empty
                <td>No messages</td>
            @endforelse
        </tbody>
    </table>
    @else
    <div class="list-else-message">
        <span >No message sent.</span>
        <div class="my-4">
            <span class="fs-2">Previously sent <b>messages</b> will appear here.</span>
        </div>
    </div>

    @endif



</div>


@endsection
