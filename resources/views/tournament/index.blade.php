@extends('layouts.main')
@section('content')
    <div class="content wrapper">
        <div class="list-group w-auto">
            <div class="list-group-item">
                <h2>Tournaments List<h2>
            </div>
            @foreach ($tournaments as $tournament)
                <a href="{{ route('tournament.teams', $tournament->title) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                        class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $tournament->title }}</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">{{ $tournament->created_at }}</small>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
