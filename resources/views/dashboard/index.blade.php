@extends('layouts.admin')

@section('dashboard-active', 'active')

@section('main')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  	<div class="pt-3">

  		<div class="col mb-3">
			<div class="card shadow-sm">					

				<div class="card-body">
					<h4>SELAMAT DATANG DI DASHBOARD ADMIN SISTEM PAKAR COVID19</h4>
					<p>Menggunakan Metode "CASE BASED REASONING"</p>
				</div>
			</div>
		</div>

  		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
	  		<div class="col">
				<div class="card shadow-sm">					

					<div class="card-body">
						<h4>Total Gejala</h4>
						<span class="badge bg-secondary">{{ $symptom }}</span>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="card shadow-sm">					

					<div class="card-body">
						<h4>Total Responden</h4>
						<span class="badge bg-secondary">{{ $diagnosis }}</span>
					</div>
				</div>
			</div>
		</div>

  	</div>
</main>

@endsection