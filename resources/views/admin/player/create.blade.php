@extends('admin.layouts.main')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление игрока</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.player.index') }}">Игроки</a></li>
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
                        <form action="{{ route('admin.player.store') }}" method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="name" placeholder="Имя игрока"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите позицию</label>
                                <select name="position_id"class="form-control">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"
                                            {{ $position->id == old('position_id') ? 'selected' : '' }}>
                                            {{ $position->title }}</option>
                                    @endforeach
                                </select>
                            </div>   
                            <div class="form-group w-50">
                                <label>Выберите команду</label>
                                <select name="team_id"class="form-control">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}"
                                            {{ $team->id == old('team_id') ? 'selected' : '' }}>
                                            {{ $team->title }}</option>
                                    @endforeach
                                </select>
                            </div>                
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
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
