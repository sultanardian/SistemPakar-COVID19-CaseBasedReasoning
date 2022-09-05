@extends('layouts.admin')

@section('symptoms-active', 'active')

@section('main')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  	<div class="pt-5">

	<!-- Modal trigger -->
	<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSymptom">Tambah Gejala</button>
	<!-- End of modal trigger -->

	<!-- Modal body -->
	<div class="modal fade" id="addSymptom" tabindex="-1" aria-labelledby="addSymptomLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addSymptomLabel">Tambah gejala baru</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <!-- Add symptom form -->
	        	<form action="{{ route('symptom.store') }}" method="POST">
	        		@csrf

		            <!-- 'Kode' form -->
		            <div class="mb-3 row">
		              <label for="code" class="col-sm-3 col-form-label">Kode</label>
		              <div class=" input-group col-sm">
		                <span class="input-group-text" id="basic-addon1">G</span>
		                <input type="number" class="form-control" id="code" name="code" autocomplete="off" required autofocus>
		              </div>
		            </div>
		            <!-- End of 'Kode' form -->

	        		<!-- 'Nama Gejala' form -->
    				<div class="mb-3 row">
    					<label for="symptom" class="col-sm-3 col-form-label">Nama Gejala</label>
    					<div class="col-sm">
    						<input type="text" class="form-control" id="symptom" name="symptom" autocomplete="off" required autofocus>
    					</div>
    				</div>
    				<!-- End of 'Nama Gejala' form -->

    				<!-- 'Bobot' form -->
    				<div class="mb-3 row">
    					<label for="weight" class="col-sm-3 col-form-label">Bobot</label>
    					<div class="col-sm">
    						<input type="number" class="form-control" id="weight" name="weight" autocomplete="off" required>
    					</div>
    				</div>
    				<!-- End of 'Bobot' form -->

		            <!-- 'Informasi' form -->
		            <div class="mb-3 row">
		              <label class="col-sm-3 col-form-label">Informasi</label>
		              <div class="col-sm">
		                <textarea class="form-control" rows="5" name="information" id="information" required></textarea>
		              </div>
		            </div>
		            <!-- End of 'Informasi' form -->

		            <!-- 'Penanganan' form -->
		            <div class="mb-3 row">
		              <label class="col-sm-3 col-form-label">Penanganan</label>
		              <div class="col-sm">
		                <textarea class="form-control" rows="5" name="treatment" id="treatment" required></textarea>
		              </div>
		            </div>
		            <!-- End of 'Penanganan' form -->

	        		<button type="submit" class="btn btn-primary">Tambah gejala</button>
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

	        	</form>
	        <!-- End of add symptom form -->
	      </div>
	    </div>
	  </div>
	</div>
	<!-- End of modal body -->

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Kode</th>
	      <th scope="col">Nama Gejala</th>
	      <th scope="col">Bobot</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>

	  	@foreach($symptoms as $symptom)

	    <tr>
	      <th scope="row">G{{ $symptom->code }}</th>
	      <td>{{ $symptom->symptom }}</td>
	      <td>{{ $symptom->weight }}</td>
	      <td>

	        <!-- Button edit -->
	      	<button type="button" class="badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#editSymptom{{ $symptom->id }}" style="border: none;">
	          <i class="fas fa-edit"></i>
	        </button>
	        <!-- End of button edit -->

	        <!-- Modal edit body -->
	        <div class="modal fade" id="editSymptom{{ $symptom->id }}" tabindex="-1" aria-labelledby="editSymptom{{ $symptom->id }}Label" aria-hidden="true">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <h5 class="modal-title" id="editSymptom{{ $symptom->id }}Label">Edit gejala "{{ $symptom->symptom }}"</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	              </div>
	              <div class="modal-body">
	                <!-- Edit symptom form -->
	                  <form action="{{ route('symptom.update', $symptom->id) }}" method="POST">
	                    @csrf
	                    @method('put')
	                    <!-- 'Kode' form -->
	                    <div class="mb-3 row">
	                      <label for="code" class="col-sm-3 col-form-label">Kode</label>
	                      <div class="input-group col-sm">
	                        <span class="input-group-text" id="basic-addon1">G</span>
	                        <input type="number" class="form-control" id="code" name="code" value="{{ $symptom->code }}" autocomplete="off" required autofocus>
	                      </div>
	                    </div>
	                    <!-- End of 'Kode' form -->

	                    <!-- 'Nama Gejala' form -->
	                    <div class="mb-3 row">
	                      <label for="symptom" class="col-sm-3 col-form-label">Nama Gejala</label>
	                      <div class="col-sm">
	                        <input type="text" class="form-control" id="symptom" name="symptom" value="{{ $symptom->symptom }}" autocomplete="off" required autofocus>
	                      </div>
	                    </div>
	                    <!-- End of 'Nama Gejala' form -->

	                    <!-- 'Bobot' form -->
	                    <div class="mb-3 row">
	                      <label for="weight" class="col-sm-3 col-form-label">Bobot</label>
	                      <div class="col-sm">
	                        <input type="number" class="form-control" id="weight" name="weight" value="{{ $symptom->weight }}" autocomplete="off" required>
	                      </div>
	                    </div>
	                    <!-- End of 'Bobot' form -->

	                    <!-- 'Informasi' form -->
	                    <div class="mb-3 row">
	                      <label for="symptom" class="col-sm-3 col-form-label">Informasi</label>
	                      <div class="col-sm">
	                        <textarea class="form-control" rows="5" name="information" id="information"required>{{ $symptom->information }}</textarea>
	                      </div>
	                    </div>
	                    <!-- End of 'Informasi' form -->

	                    <!-- 'Penanganan' form -->
			            <div class="mb-3 row">
			              <label class="col-sm-3 col-form-label">Penanganan</label>
			              <div class="col-sm">
			                <textarea class="form-control" rows="5" name="treatment" id="treatment" required>{{ $symptom->treatment }}</textarea>
			              </div>
			            </div>
			            <!-- End of 'Penanganan' form -->

	                    <button type="submit" class="btn btn-primary">Edit gejala</button>
	                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

	                  </form>
	                <!-- End of Edit symptom form -->
	              </div>
	            </div>
	          </div>
	        </div>
	        <!-- End of modal edit body -->

	        <!-- Button delete -->
	        <button type="button" class="badge rounded-pill bg-danger" style="border: none;" data-bs-toggle="modal" data-bs-target="#deleteSymptom{{ $symptom->id }}">
	          <i class="far fa-trash"></i>
	        </button>
	        <!-- End of button delete -->

	        <!-- Modal delete body -->
	        <div class="modal fade" id="deleteSymptom{{ $symptom->id }}" tabindex="-1" aria-labelledby="deleteSymptom{{ $symptom->id }}Label" aria-hidden="true">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <h5 class="modal-title" id="deleteSymptom{{ $symptom->id }}Label">Hapus gejala "{{ $symptom->symptom }}"</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	              </div>
	              <div class="modal-body">
	                <p>Apakah anda yakin ingin menghapus gejala <b>{{ $symptom->symptom }}</b>?</p>

	                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-{{ $symptom->id }}').submit()">Hapus gejala</button>
	                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

	                <form style="display: none;" action="{{ route('symptom.destroy', $symptom->id) }}" method="POST" id="delete-{{ $symptom->id }}">
	                  @csrf
	                  @method('delete')
	                </form>
	              </div>
	            </div>
	          </div>
	        </div>
	        <!-- Modal delete body -->

	        <!-- Button info -->
	        <button type="button" class="badge rounded-pill bg-primary" style="border: none;" data-bs-toggle="modal" data-bs-target="#infoSymptom{{ $symptom->id }}">
	          <i class="far fa-info"></i>
	        </button>
	        <!-- End of button info -->

	        <!-- Modal info body -->
	        <div class="modal fade" id="infoSymptom{{ $symptom->id }}" tabindex="-1" aria-labelledby="infoSymptom{{ $symptom->id }}Label" aria-hidden="true">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <h5 class="modal-title" id="infoSymptom{{ $symptom->id }}Label">Informasi gejala "{{ $symptom->symptom }}"</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	              </div>
	              <div class="modal-body">
	              	<h3>Informasi</h3>
	                <p style="white-space: pre-line">{{ $symptom->information }}</p>
	                <hr>
	                <h3>Penanganan</h3>
	                <p style="white-space: pre-line">{{ $symptom->treatment }}</p>

	                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
	              </div>
	            </div>
	          </div>
	        </div>
	        <!-- Modal info body -->

	      </td>
	    </tr>

	    @endforeach

	  </tbody>
	</table>

  </div>
</main>

@endsection