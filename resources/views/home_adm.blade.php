@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tela do ADM</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Controle de usuários</h2><br><br>

                    @foreach ($usrs as $usr)



                    <h3>{{$usr->name}}</h3>

                    <label>Email</label>:{{ $usr->email }}
                    <br>


                    <form action="{{route('usrs.destroy',[$usr->id])}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <input type="submit" value="Remover"></input>
                    </form>

                    <br><br>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection