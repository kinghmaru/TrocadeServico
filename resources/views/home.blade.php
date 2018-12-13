@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tela do usuário comum</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h1>Suas informações</h1>
                    <label>Usuario</label>:{{ Auth::user()->name }}
                    <br>
                    <label>Email</label>:{{ Auth::user()->email }}
                    <br>

                    <a href="{{route('usrs.edit',[Auth::user()->id])}}">Editar informações</a><br><br>

                    Seus servicos:<br>
                    
                    @foreach ($servs as $serv)

                    <label>Nome do servico</label>:{{$serv->nome}}

                    <form action="{{route('serv.destroy',[$serv->id])}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <input type="submit" value="Remover"></input>
                    </form>                   
                    <br>

                    @endforeach


                    <br><br>
                    <form method="POST" action="{{route('serv.store')}}">
        
                        {{csrf_field()}}    

                        <h5>Cadastrar novo serviço</h5> 

                        <label>Nome:</label>
                        <input type="text" name="nome">
                        <br>

                        <label>Descricao:</label>
                        <input type="text" name="desc">
                        <br>
                        <input type="submit">
                    </form>

                    <br><br>

                    @if (sizeof($servs) != 0)
                        <a href="{{route('servTroca.index')}}">Trocar Servicos</a><br><br>
                    @endif
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

