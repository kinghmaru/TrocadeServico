@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tela de edição do usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    
					<h1>Editar Informações</h1>

					<form action="{{route('usrs.update', ['id' => $usrs->id])}}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						
						<label>Nome</label>
						<input type="text" name="name" 
							value="{{$usrs->name}}">
						<label>Email</label>
						<input type="text" name="email" 
							value="{{$usrs->email}}">
						<button>Enviar</button>
					</form>

					<a href={{ route('home') }}>voltar</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection




