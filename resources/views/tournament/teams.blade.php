@extends('tournament.show')
@section('content2')
    <div class="list-group w-auto">
        @foreach ($tournament->teams as $team)
            <a href="{{ route('tournament.team', [$tournament->title, $team->title]) }}"
                class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <div class="d-flex gap-3 w-100 justify-content-between">
                    <div>
                        <h6>{{$loop->iteration}}. {{ $team->title }}</h6>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
