@extends('admin.layouts.main')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование команды</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Команды</a></li>
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
                    <div class="col-12">
                        <form action="{{ route('admin.team.update', $team->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название команды"
                                    value="{{ $team->title }}">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>   
                            <div class="form-group w-50">
                                <label>Выберите группу</label>
                                <select name="group_id"class="form-control">
                                    @foreach ($tournaments as $tournament)
                                    @foreach ($tournament->groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ $group->id == $team->group_id ? 'selected' : '' }}>
                                            {{ $tournament->title }}/{{ $group->title }}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Игроки</label>
                                <select class="select2" name="player_ids[]" multiple="multiple"
                                    data-placeholder="Выберите игроков" style="width: 100%;">
                                    @foreach ($players as $player)
                                        <option 
                                            {{ is_array($team->players->pluck('id')->toArray()) && in_array($player->id, $team->players->pluck('id')->toArray()) ? 'selected' : '' }}
                                            value="{{ $player->id }}"> {{ $player->name }}</option>
                                    @endforeach
                                </select>
                            </div>             
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
