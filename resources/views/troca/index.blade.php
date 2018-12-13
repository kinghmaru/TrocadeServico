@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tela de troca</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					<br>

					<form method="POST" action="{{route('servTroca.store')}}">
						{{ csrf_field() }}

						Digite o nome de um dos seus serviços para trocar:<br>
						<input type="text" name="usrserv"><br>


						<br><br><br>
						Serviços disponiveis:<br>

						@foreach ($servs as $serv)
							@if ($serv->id_usr != Auth::user()->id)
								<input type="radio" name="idserv" value= {{$serv->id}}> {{$serv->nome}}<br>
							@endif
						@endforeach
					  

					    <br><br>
					    <input type="submit">
					</form> 

					<br>
					<a href={{ route('home') }}>voltar</a>
					
					

                </div>
            </div>
        </div>
    </div>
</div>
@endsection