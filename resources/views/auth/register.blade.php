@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h1 class="text-center">Register</h1>
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf
						<div class="row mb-3">
							<label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
							</div>
						</div>
						<div class="row mb-3">
							<label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
                        <div class="row mb-3">
							<label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>
							<div class="col-md-6">
								<input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
							</div>
						</div>
                        <div class="row mb-3">
							<label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">Tanggal Lahir</label>
							<div class="col-md-6">
								<input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
							</div>
						</div>
                        <div class="row mb-3">
							<label for="no_telepon" class="col-md-4 col-form-label text-md-end">Nomor Telepon</label>
							<div class="col-md-6">
								<input id="no_telepon" type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}" required>
							</div>
						</div>
						<div class="row mb-3">
							<label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
							<div class="col-md-6">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="role" value="guru" id="radio1">
									<label class="form-check-label" for="radio1">Guru</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="role" id="radio2" value="siswa" checked>
									<label class="form-check-label" for="radio2">Siswa</label>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
									name="password" required autocomplete="new-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
									autocomplete="new-password">
							</div>
						</div>
						<div class="row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row mb-0">
				<div class="text-center">
					Sudah Punya Akun?<a class="btn btn-link" href="{{ route('login') }}">Masuk</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
