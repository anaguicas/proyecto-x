@extends('layouts.formularios')
@section('content')
<div align="center">
	<div class="formulario">		
		{{  Form::open(array('action'=>'StudioController@getRegister', 'method' => 'post')) }} 
		<!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
		<div class="col-lg-12">
			@if(Session::has('message'))
			    <div class="alert alert-success alert-dissmissible col-xs-12">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    		<span aria-hidden="true">×</span>
			    	</button>			    	
			    	{{Session::get('message')}}
			    </div>
			@endif
			@if(Session::has('error'))
			    <div class="alert alert-danger alert-dissmissible col-xs-12">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    		<span aria-hidden="true">×</span>
			    	</button>			    	
			    	{{Session::get('error')}}
			    </div>
			@endif
			<div class="form-group">
				{{Form::text('studio_name',null,array('class' => 'form-control input-label', 'placeholder' => 'NAME'))}}
				@if($errors->has('studio_name'))
				<p class="text-danger">
					{{ $errors->first('studio_name') }}
				</p>
				@endif
			</div>
			<div class="form-group">
				{{Form::text('description',null,array('class' => 'form-control input-label', 'placeholder' => 'STUDIO DESCRIPTION'))}}
				@if($errors->has('description'))
				<p class="text-danger">
					{{ $errors->first('description') }}
				</p>
				@endif
			</div>					
			<div class="form-group">
				{{Form::email('email',null,array('class' => 'form-control input-label', 'placeholder' => 'EMAIL'))}}
				@if($errors->has('email'))
				<p class="text-danger">
					{{ $errors->first('email') }}
				</p>
				@endif
			</div>
			<div class="form-group">
				{{Form::text('name',null,array('class' => 'form-control input-label', 'placeholder' => 'USERNAME'))}}
				@if($errors->has('name'))
				<p class="text-danger">
					{{ $errors->first('name') }}
				</p>
				@endif
			</div>
			<div class="form-group">
				{{Form::password('password',['class' => 'form-control input-label', 'placeholder' => 'PASSWORD'])}}
				@if($errors->has('password'))
				<p class="text-danger">
					{{ $errors->first('password') }}
				</p>
				@endif
			</div>
			<div class="form-group">
				{{Form::password('password_confirmation',['class' => 'form-control input-label', 'placeholder' => 'PASSWORD CONFIRMATION'])}}
				@if($errors->has('password:confirmatio'))
				<p class="text-danger">
					{{ $errors->first('password_confirmation') }}
				</p>
				@endif
			</div>
			<div class="form-group">
				{{Form::text('studio_owner',null,array('class' => 'form-control input-label', 'placeholder' => 'STUDIO OWNER'))}}
				@if($errors->has('studio_owner'))
				<p class="text-danger">
					{{ $errors->first('studio_owner') }}
				</p>
				@endif
			</div>
			<div class="form-group">
				{{Form::label('bank', 'BANK', array('class' => 'col-lg-4 control-label'))}}
				<div class="col-lg-5 country">
					{{ Form::select('bank', $bank, null, array('class'=>'form-control select-label ', 'required' => 'required')) }}
					@if ($errors->has('bank'))
					<p class="text-danger">
						{{ $errors->first('bank') }}
					</p>
					@endif
				</div>
			</div>
			<div class="form-group">
				{{Form::text('number',null,array('class' => 'form-control input-label', 'placeholder' => 'BANK ACCOUNT NUMBER'))}}
				@if($errors->has('number'))
				<p class="text-danger">
					{{ $errors->first('number') }}
				</p>
				@endif					
			</div>

			<div class="form-group">
				{{ Form::submit('REGISTRARME', array('class' => 'btn boton-registro')) }}
			</div>					
		</div>		
		{{  Form::close()  }}  
	</div>
</div>
@endsection