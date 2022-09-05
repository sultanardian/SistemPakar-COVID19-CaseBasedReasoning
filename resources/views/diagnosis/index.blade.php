@extends('layouts.app')

@section('diagnosis-active', 'active')

@section('content')

<div class="py-5">

	<div class="container mt-5">
		<h2>Cek Diagnosis Gejala COVID-19</h2>

		@if (session('alert_notready'))
	    <div class="alert alert-danger mt-3" role="alert">
	      {{ session('alert_notready') }}
	    </div>

	    @else
		<!-- Modal trigger -->
		<button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#history">Cek riwayat anda</button>
		<!-- End of modal trigger -->

		<!-- Modal body -->
		<div class="modal fade" id="history" tabindex="-1" aria-labelledby="historyLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="historyLabel">Cek riwayat anda</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      		<p>Pastikan data yang diisi harus sesuai dengan data awal ketika mengisi diagnosis</p>
		        	<!-- History form -->
		        	<form action="{{ url('history.index') }}" method="POST">
		        		@csrf

			            <!-- 'Nama Lengkap' form -->
			            <div class="mb-3 row">
			              <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
			              <div class="col-sm">
			                <input type="text" class="form-control" id="name" name="name" autocomplete="off" required autofocus>
			              </div>
			            </div>
			            <!-- End of 'Nama Lengkap' form -->

		        		<!-- 'Nama NIK' form -->
						<div class="mb-3 row">
							<label for="nik" class="col-sm-3 col-form-label">NIK</label>
							<div class="col-sm">
								<input type="number" class="form-control" id="nik" name="nik" autocomplete="off" required autofocus>
							</div>
						</div>
						<!-- End of 'Nama NIK' form -->

						<!-- 'Nomor Telepon' form -->
						<div class="mb-3 row">
							<label for="telephone" class="col-sm-3 col-form-label">Nomor Telepon</label>
							<div class="col-sm">
								<input type="number" class="form-control" id="telephone" name="telephone" autocomplete="off" required>
							</div>
						</div>
						<!-- End of 'Nomor Telepon' form -->

		        		<button type="submit" class="btn btn-primary">Cari</button>
		        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

		        	</form>
		        <!-- End of History form -->
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of modal body -->

		<!-- Form -->
		<form action="{{ route('diagnosis.store') }}" method="POST">
			@csrf
			<h3 class="mb-3">Identitas diri</h3>
			<p class="mb-5">Silakan isi identitas diri terlebih dahulu dan pastikan data yang anda isi adalah benar</p>
			<!-- Identity row -->
			<div class="row">

				<!-- Left col -->
				<div class="col mr-3">
					<!-- Left col content -->
					<!-- 'Nama Lengkap' form -->
					<div class="mb-3 row">
						<label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm">
							<input type="text" class="form-control" id="name" name="name" autocomplete="off" required autofocus>
						</div>
					</div>
					<!-- End of 'Nama Lengkap' form -->

					<!-- 'Jenis Kelamin' form -->
					<div class="mb-3 row">
						<label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
						<div class="col-sm">
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="jenisKelamin" id="Laki-laki" value="Laki-laki" required>
							  <label class="form-check-label" for="Laki-laki">
							    Laki-laki
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="jenisKelamin" id="Perempuan" value="Perempuan">
							  <label class="form-check-label" for="Perempuan">
							    Perempuan
							  </label>
							</div>
						</div>
					</div>
					<!-- End of 'Jenis Kelamin' form -->

					<!-- 'Telepon' form -->
					<div class="mb-3 row">
						<label for="telephone" class="col-sm-3 col-form-label">Telepon</label>
						<div class="col-sm">
							<input type="number" class="form-control" id="telephone" name="telephone" autocomplete="off" required >
						</div>
					</div>
					<!-- End of 'Telepon' form -->

					<!-- 'Alamat' form -->
					<div class="mb-3 row">
						<label for="address" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm">
							<textarea class="form-control" id="address" rows = 3 name="address" autocomplete="off" required></textarea>
						</div>
					</div>
					<!-- End of 'Alamat' form -->

					<!-- End of the left col content -->
				</div>
				<!-- End of the left col -->

				<!-- Right col -->
				<div class="col ml-3">
					<!-- Right col content -->

					<!-- 'Nomor NIK' form -->
					<div class="mb-3 row">
						<label for="nik" class="col-sm-3 col-form-label">Nomor NIK</label>
						<div class="col-sm">
							<input type="number" class="form-control" id="nik" name="nik" autocomplete="off" required>
						</div>
					</div>
					<!-- End of the 'Nomor NIK' form -->

					<!-- End of the right col content -->
				</div>
				<!-- End of the right col -->

			</div>
			<!-- End of the identity row-->

			<hr>

			<h3 class="mb-3">Gejala</h3>
			<p class="mb-3">Silakan isi gejala yang anda rasakan saat ini dan pastikan data yang anda isi adalah benar</p>

			<!-- Symptom row -->
			<div class="row">
				<div class="checkbox-group required">
					@foreach($symptoms as $symptom)
						<div class="card" style="width: 18rem;">
						  <div class="card-body">
						  	<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="{{ $symptom->id }}" id="{{ $loop->iteration }}" name="symptom[]">
							  <label class="form-check-label" for="{{ $loop->iteration }}">
							    {{ $symptom->symptom }}
							  </label>
							</div>
						  </div>
						</div>
						<br>
					@endforeach
				</div>
			</div>

			<button type="submit" class="btn btn-primary mt-5">Submit</button>
		</form>
		@endif
	</div>
</div>

@endsection