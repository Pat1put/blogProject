@extends('master')

@section('title', 'Vote CRUD')

@section('content')

    <br>
    <h1>Show All Vote</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vote</th>
                <th>Contents ID</th>
            </tr>
        </thead>

        <tbody>
                @foreach ($votes as $vote)
                    <tr>
                        <td>{{ $vote->id }}</td>
                        @if ($vote->vote == 1)
                            <td>Like</td>
                        @else
                            <td>Dislike</td>
                        @endif
                        <td>{{ $vote->content_id }}</td>
                    </tr>
                @endforeach
        </tbody>

    </table>

@endsection
