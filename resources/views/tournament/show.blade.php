@extends('layouts.main')
@section('content')
    <div class="content wrapper">
        <div>
            <h1>{{ $tournament->title }}<h1>
        </div>
        <div class="mb-3">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist"
            style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item" role="presentation">
                <a href="{{ route('tournament.teams', $tournament->title) }}">
                <button class="nav-link {{ route('tournament.teams', $tournament->title) == url()->current() ? 'active' : '' }} rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab"
                    aria-selected="true">Teams</button></a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('tournament.games', $tournament->title) }}">
                <button class="nav-link {{ route('tournament.games', $tournament->title) == url()->current() ? 'active' : '' }} rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab"
                    aria-selected="false">Games</button></a>
            </li>
        </ul>
        </div>
        @yield('content2')
    </div>
@endsection
