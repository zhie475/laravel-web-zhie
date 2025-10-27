@extends('admin.layouts.app')
@section('title', 'Edit Pelanggan')
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pelanggan</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3">
            <h1 class="h4">Edit Pelanggan</h1>
            <p class="mb-0">Form untuk mengubah data pelanggan.</p>
        </div>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-lg-4 col-12">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ old('first_name', $dataPelanggan->first_name) }}" class="form-control" required>
                                @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" name="last_name"
                                    value="{{ old('last_name', $dataPelanggan->last_name) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" id="birthday" name="birthday"
                                    value="{{ old('birthday', $dataPelanggan->birthday) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="" disabled {{ !$dataPelanggan->gender ? 'selected' : '' }}>Pilih Gender</option>
                                    <option value="Female" {{ $dataPelanggan->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Male" {{ $dataPelanggan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $dataPelanggan->email) }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" id="phone" name="phone"
                                    value="{{ old('phone', $dataPelanggan->phone) }}" class="form-control">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
