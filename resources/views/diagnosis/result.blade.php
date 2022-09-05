@extends('layouts.app')

@section('diagnosis-active', 'active')

@section('content')

<div class="py-5">

  <div class="container mt-5">
    <h3>Hasil Diagnosis</h3>

    <table class="table table-bordered border-dark">
      <tbody>
        <tr>
          <th scope="row" width="200">Nama : </th>
          <td colspan="2">{{ $data['name'] }}</td>
        </tr>
        <tr>
          <th scope="row" width="200">NIK : </th>
          <td colspan="2">{{ $data['nik'] }}</td>
        </tr>
        <tr>
          <th scope="row" width="200">Jenis Kelamin : </th>
          <td colspan="2">{{ $data['gender'] }}</td>
        </tr>
        <tr>
          <th scope="row" width="200">Telepon : </th>
          <td colspan="2">{{ $data['telephone'] }}</td>
        </tr>
        <tr>
          <th scope="row" width="200">Alamat : </th>
          <td colspan="2">{{ $data['address'] }}</td>
        </tr>
        @foreach($data['symptoms'] as $symptoms)
        <tr>
          @if($loop->index == 0)
            <th scope="row" width="200" rowspan="{{ count($data['symptoms']) }}">Gejala yang dirasakan : </th>
          @endif

          <td>
            <p>{{ $symptoms->symptom }}</p>
          </td>

          <td>
            <p style="white-space: pre-line"><u>Cara Penanganan :</u>
            {{ $symptoms->treatment }}</p>
          </td>
          
        </tr>
  	    @endforeach  
        <tr>
          <th scope="row" width="200">Score : </th>
          <td colspan="2"><b>{{ $data['score'] }}% POSITIF</b></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection