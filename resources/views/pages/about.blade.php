@extends('app')

@section('content')
<!-- 
<h1>About Me: {{$first = 'John'}}</h1>
 -->
<!-- 
@if ($first == 'John')
	<h1>Hello John</h1>
@else
	<h1>Else</h1>
@endif
 -->

@if (count($people))
	 <h1>People I Like</h1>
	 <u>
	 	@foreach ($people as $person)
	 		<li>{{$person}}</li>
	 	@endforeach
	 </u>
@endif

<p>
	Hello, I am A S M Sadiqul Islam.
</p>
@stop