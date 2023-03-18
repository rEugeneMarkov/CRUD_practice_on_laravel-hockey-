@extends('admin.layouts.main')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $team->title }}</h1>
                        <a href="{{ route('admin.team.edit', $team->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.team.delete', $team->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Команды</a></li>
                            <li class="breadcrumb-item active">{{ $team->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-8">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $team->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Название</td>
                                            <td>{{ $team->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Турнир</td>
                                            <td>
                                                <a href="{{ route('admin.tournament.show', $team->group->tournament->id) }}">
                                                    {{ $team->group->tournament->title }}
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-sm-6">
                    <h3>Игроки</h3>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Имя</th>
                                            <th>Позиция</th>
                                            <th>Команда</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($team->players as $player)
                                            <tr>
                                                <td>{{$loop->iteration}}.</td>
                                                <td>
                                                    <a href="{{ route('admin.player.show', $player->id)}}" aria-current="true">
                                                        {{ $player->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $player->position->title }}</td>
                                                <td>{{ $team->title }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- ./col -->
        </section>
        <!-- /.content -->
    </div>
@endsection
