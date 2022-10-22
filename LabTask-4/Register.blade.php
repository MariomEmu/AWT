@extend('layouts.app')
@section('title')
Home
@endsection
@section('content')
<center>
    <html>
    <body>
    <h1> Manager Registration Form</h1>
        <from action="/registrarion" method='post'>
            {{csrf_field()}}

      <label>Name:</label><br>
      <label><input type="text" name='name' value="{{old('name')}}"></label><br>
      @if ($errors ->has('name'))
      <span class="">
        <strong>{{$error ->first('name')}}</strong>
      </span>
      @endif<br>
      <label>ID:</label><br>
	<label><input type="text" name='id' value="{{old('id')}}"></label>
	
	@if ($errors ->has('id'))
	<span class="">
			<strong>{{ $errors -> first('id')}}</strong>
	</span>
	@endif<br>
      <label>email:</label><br>
	<label><input type="email" name='email' value="{{old('mail')}}"></label>
	
	@if ($errors ->has('email'))
	<span class="">
			<strong>{{ $errors -> first('email')}}</strong>
	</span>
	@endif<br>
      <label>password:</label><br>
      <label><input type="password" name='pass' value="{{old('pass')}}"></label><br>
      @if ($errors ->has('pass'))
      <span class="">
        <strong>{{$errors -> first('pass')}}</strong>

      </span>
      @endif<br>
      <label><input type="submit" value="submit"></label>




        </from>
    </body>
</html>
</center>