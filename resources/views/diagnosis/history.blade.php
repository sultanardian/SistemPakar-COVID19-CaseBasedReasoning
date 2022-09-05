@extends('layouts.app')

@section('diagnosis-active', 'active')

@section('content')

<div class="py-5">
  <div class="container my-5">
    <h3 class="mt-3">Riwayat Diagnosis</h3>

    @if (session('alert'))
    <div class="alert alert-danger mt-3" role="alert">
      {{ session('alert') }}
    </div>

    @else
    <p>Nama Lengkap : {{ $datas[0]['name'] }}</p>
    <p>NIK : {{ $datas[0]['nik'] }}</p>
    <p>Jenis Kelamin : {{ $datas[0]['gender'] }}</p>
    <p>Telepon : {{ $datas[0]['telephone'] }}</p>
    <p>Alamat : {{ $datas[0]['address'] }}</p>

    <hr>

    <table class="table">
      <thead>
        <tr>
          <th scope="col" width="50">No.</th>
          <th scope="col" width="200">Tanggal Diagnosis</th>
          <th scope="col" width="200">Skor</th>
          <th scope="col" width="200">Gejala</th>
        </tr>
      </thead>
      <tbody>

      	@foreach($datas as $data)

        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $data['date'] }}</td>
          <td>{{ $data['score'] }}% Positif</td>
          <td><p>
          	@foreach($data['symptoms'] as $symptom)
          		{{ $symptom }}, 
          	@endforeach
          	</p>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
    @endif
    <div>
      <span><i><a href="{{ route('diagnosis.index') }}">Kembali ke diagnosis</a></i></span>
    </div>
  </div>
</div>

@endsection