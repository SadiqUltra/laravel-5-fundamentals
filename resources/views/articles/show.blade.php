@extends('app')

@section('content')


	<article>
		<h2>
			<a href="#">{{ $article->title }}</a>
		</h2>

		<div class="body">{{ $article->body }}</div>
	</article>


	@unless($article->tags->isEmpty())
		<h5>Tags:</h5>
		<u>
			@foreach($article->tags as $tag)
				<li>{{$tag->name}}</li>
			@endforeach
		</u>
	@endunless

@stop
