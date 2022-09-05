@extends('layouts.app')

@section('beranda-active', 'active')

@section('content')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner">
	  <div class="carousel-item active">
	    <img src="{{ URL::asset('/img/guest/carousel_bg.jpg') }}">

	    <div class="container">
	      <div class="carousel-caption text-start">
	        <h1>SELAMAT DATANG DI</h1>
	        <h1>SISTEM PAKAR COVID-19</h1>
            <p>Sistem Pakar COVID-19 bertujuan untuk mendiagnosis secara dini dan mandiri oleh masyarakat terkait gejala-gejala yang dirasakan</p>
	        <p><a class="btn btn-lg btn-primary" href="{{ route('diagnosis.index') }}">Diagnosis sekarang</a></p>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<div class="container marketing">

    <div class="row">
      <div class="col-lg-4">
      	<img src="{{ URL::asset('/img/guest/virus.png') }}" class="bd-placeholder-img" width="140" height="140">

        <h2>Apa itu COVID-19?</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#kenali_covid">View details &raquo;</a></p>
      </div>

      <div class="col-lg-4">
        <img src="{{ URL::asset('/img/guest/denial.png') }}" class="bd-placeholder-img" width="140" height="140">

        <h2>Cara pencegahan</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#cegah_penularan">View details &raquo;</a></p>
      </div>

      <div class="col-lg-4">
        <img src="{{ URL::asset('/img/guest/detail.png') }}" class="bd-placeholder-img" width="140" height="140">

        <h2>Informasi gejala</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="{{ url('symptom_information') }}">View details &raquo;</a></p>
      </div>
    </div>

    <hr class="featurette-divider" id="kenali_covid">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Kenali COVID-19! <span class="text-muted">Hindari dan tetap sehat!</span></h2>
        <p>
        	Penyakit Coronavirus (Covid-19) adalah penyakit menular yang disebabkan oleh virus SARS-CoV-2. Kebanyakan orang yang jatuh sakit COVID-19 akan mengalami gejala ringan hingga sedang dan sembuh tanpa pengobatan khusus. Namun, beberapa akan menjadi sakit parah dan memerlukan perhatian medis. Kita tahu bahwa penyakit ini disebabkan oleh virus SARS-CoV-2, yang menyebar di antara orang-orang dengan beberapa cara berbeda. Virus dapat menyebar dari mulut atau hidung orang yang terinfeksi dalam partikel cairan kecil ketika mereka batuk, bersin, berbicara, bernyanyi atau bernapas. Partikel-partikel ini berkisar dari tetesan pernapasan yang lebih besar hingga aerosol yang lebih kecil.
        </p>
		<ul>
			<li>
				Bukti saat ini menunjukkan bahwa virus menyebar terutama di antara orang-orang yang melakukan kontak dekat satu sama lain, biasanya dalam jarak 1 meter (jarak dekat). Seseorang dapat terinfeksi ketika aerosol atau tetesan yang mengandung virus terhirup atau bersentuhan langsung dengan mata, hidung, atau mulut.
			</li>
			<li>
				Virus ini juga dapat menyebar di lingkungan dalam ruangan yang berventilasi buruk dan/atau ramai, di mana orang cenderung menghabiskan waktu lebih lama. Ini karena aerosol tetap melayang di udara atau bergerak lebih jauh dari 1 meter (jarak jauh).
			</li>
		</ul>

		<p>
			Orang juga dapat terinfeksi dengan menyentuh permukaan yang telah terkontaminasi virus saat menyentuh mata, hidung, atau mulut tanpa membersihkan tangan.
		</p>
		<span>
        	<i>Source : <a href="https://www.who.int" style="text-decoration: none;">World Health Organization (WHO)</a></i>
        </span>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider" id="cegah_penularan">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Cegah penularan COVID-19. <span class="text-muted">Mari hidup sehat!</span></h2>
        <ol>
        	<li>
        		Terapkan physical distancing, yaitu menjaga jarak minimal 2 meter dari orang lain, dan jangan dulu ke luar rumah kecuali ada keperluan mendesak.
        	</li>
        	<li>
        		Gunakan masker saat beraktivitas di tempat umum atau keramaian, termasuk saat pergi berbelanja bahan makanan.
        	</li>
        	<li>
        		Rutin mencuci tangan dengan air dan sabun atau hand sanitizer yang mengandung alkohol minimal 60%, terutama setelah beraktivitas di luar rumah atau di tempat umum.
        	</li>
        	<li>
        		Jangan menyentuh mata, mulut, dan hidung sebelum mencuci tangan.
        	</li>
        	<li>
        		Tingkatkan daya tahan tubuh dengan pola hidup sehat, misalnya olahraga rutin dan konsumsi makanan bergizi  serta suplemen.
        	</li>
        	<li>
        		Hindari kontak dengan penderita COVID-19, orang yang dicurigai positif terinfeksi COVID-19, atau orang yang sedang sakit demam, batuk, atau pilek.
        	</li>
        	<li>
        		Tutup mulut dan hidung dengan tisu saat batuk atau bersin, kemudian buang tisu ke tempat sampah.
        	</li>
        	<li>
        		Jaga kebersihan benda yang sering disentuh dan kebersihan lingkungan, termasuk kebersihan rumah.
        	</li>
        	<li>
        		Jaga sirkulasi dan kebersihan udara di dalam ruangan. Bila perlu, Anda bisa menggunakan air purifier.
        	</li>
        </ol>
        <span>
        	<i>Source : <a href="https://www.alodokter.com/covid-19" style="text-decoration: none;">Alodokter</a></i>
        </span>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>
    <hr class="featurette-divider">
</div>
@endsection
