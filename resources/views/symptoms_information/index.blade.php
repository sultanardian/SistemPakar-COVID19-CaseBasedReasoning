@extends('layouts.app')

@section('informasi-active', 'active')

@section('content')

<div class="album py-5 bg-light">
	<div class="container mt-5">

		<h2 class="mb-3">Informasi Gejala COVID-19</h2>

		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
			@foreach($symptoms as $symptom)
			<div class="col">
				<div class="card shadow-sm">					

					<div class="card-body">
						<h4>{{ $symptom->symptom }}</h4>
						<p class="card-text">{{ $symptom->information }}</p>
						<hr>
						<h5>Cara penanganan :</h5>
						<p style="white-space: pre-line">{{ $symptom->treatment }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>


@endsection