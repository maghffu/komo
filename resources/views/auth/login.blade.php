@extends('layoute.app')
@section('konten')
<div class="row">
	<br/>
	<div class="col s12 m5 offset-m3 ">
		<div class="card blue darken-1" style=" padding: 1%;">
			<h5 class="white-text col s12">Form Login</h5>
			<hr/>
			<div class="card grey lighten-3" style=" padding: 1%;">
				<form class="col s12" action="{{url('auth/login')}}" method="POST">
					{!!csrf_field()!!}
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="email" value="{{old('email')}}" />
							<label class="active">Username</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password" />
							<label class="active">Password</label>
						</div>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-raised red darken-3" >Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@if (count($errors) > 0)
	@foreach ($errors->all() as $error)
	<script type="text/javascript">
		Materialize.toast('<?php echo $error ?>', 3000);
	</script>
	@endforeach
@endif
@endsection