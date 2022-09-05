@extends('layouts.admin')

@section('respondent-active', 'active')

@section('main')

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> -->
    <div class="pt-5">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" width="200">Nama Responden</th>
              <th scope="col" width="200">NIK</th>
              <th scope="col" width="400">Gejala</th>
              <th scope="col" width="150">Skor</th>
              <th scope="col" width="100">Aksi</th>
            </tr>
          </thead>
          <tbody>

          	@foreach($datas as $data)

            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $data['name'] }}</td>
              <td>{{ $data['nik'] }}</td>
              <td><p>
              	@foreach($data['symptoms'] as $symptom)
              		{{ $symptom }}, 
              	@endforeach
              	</p>
              </td>
              <td>
              	<button type="button" class="badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#more{{ $data['id'] }}" style="border: none;">More</button>

                <!-- Modal body -->
                <div class="modal fade" id="more{{ $data['id'] }}" tabindex="-1" aria-labelledby="more{{ $data['id'] }}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="more{{ $data['id'] }}Label">Responden "{{ $data['name'] }}"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <!-- Edit symptom form -->
                        <table class="table">
        				  <tbody>
        				    <tr>
        				      <th scope="row">Nama : </th>
        				      <td>{{ $data['name'] }}</td>
        				    </tr>
        				    <tr>
        				      <th scope="row">NIK : </th>
        				      <td>{{ $data['nik'] }}</td>
        				    </tr>
        				    <tr>
        				      <th scope="row">Jenis Kelamin : </th>
        				      <td>{{ $data['gender'] }}</td>
        				    </tr>
        				    <tr>
        				      <th scope="row">Telepon : </th>
        				      <td>{{ $data['telephone'] }}</td>
        				    </tr>
        				    <tr>
        				      <th scope="row">Alamat : </th>
        				      <td>{{ $data['address'] }}</td>
        				    </tr>
        				    <tr>
        				      <th scope="row">Gejala yang dirasakan : </th>
        				      <td>
        				      	<ul>
        					      	@foreach($data['symptoms'] as $symptom)
        					      	<li>{{ $symptom }}</li>
        					      	@endforeach
        				      	</ul>
        				      </td>
        				    </tr>
        				    <tr>
        				      <th scope="row">Score : </th>
        				    </tr>
        				  </tbody>
        				</table>
                        <!-- End of Edit symptom form -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of modal body -->
              </td>
            </tr>

            @endforeach

          </tbody>
        </table>

    </div>
</main>

@endsection