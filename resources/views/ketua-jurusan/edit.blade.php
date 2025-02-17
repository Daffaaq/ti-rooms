@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kepala Jurusan</h6>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('ketua-jurusan.index') }}"
                            class="{{ request()->routeIs('ketua-jurusan.index') ? 'active' : '' }}">Ketua Jurusan
                            Management</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('ketua-jurusan.edit', $ketuaJurusan->id) }}"
                            class="{{ request()->routeIs('ketua-jurusan.edit') ? 'active' : '' }}">Edit Kepala Jurusan</a>
                    </li>
                </ol>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <!-- Kepala Jurusan Edit Form -->
                <form method="POST" action="{{ route('ketua-jurusan.update', $ketuaJurusan->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Menampilkan Jurusan yang terkait dengan Ketua Jurusan -->
                    <div class="form-group">
                        <label for="jurusans_id">Jurusan:</label>
                        <input type="text" name="jurusans_id" id="jurusans_id" class="form-control"
                            value="{{ $ketuaJurusan->jurusan->nama_jurusan }}" disabled>
                    </div>

                    <!-- Nama Ketua Jurusan -->
                    <div class="form-group">
                        <label for="nama_ketua_jurusan">Nama Ketua Jurusan:</label>
                        <input type="text" name="nama_ketua_jurusan" id="nama_ketua_jurusan"
                            placeholder="Nama Ketua Jurusan"
                            class="form-control @error('nama_ketua_jurusan') is-invalid @enderror"
                            value="{{ old('nama_ketua_jurusan', $ketuaJurusan->nama_ketua_jurusan) }}">
                        @error('nama_ketua_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Nama Pendek Ketua Jurusan -->
                    <div class="form-group">
                        <label for="nama_pendek_ketua_jurusan">Nama Pendek Ketua Jurusan:</label>
                        <input type="text" name="nama_pendek_ketua_jurusan" id="nama_pendek_ketua_jurusan"
                            placeholder="Nama Pendek Ketua Jurusan"
                            class="form-control @error('nama_pendek_ketua_jurusan') is-invalid @enderror"
                            value="{{ old('nama_pendek_ketua_jurusan', $ketuaJurusan->nama_pendek_ketua_jurusan) }}">
                        @error('nama_pendek_ketua_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- NIP Ketua Jurusan -->
                    <div class="form-group">
                        <label for="nip_ketua_jurusan">NIP Ketua Jurusan:</label>
                        <input type="text" name="nip_ketua_jurusan" id="nip_ketua_jurusan"
                            placeholder="NIP Ketua Jurusan"
                            class="form-control @error('nip_ketua_jurusan') is-invalid @enderror"
                            value="{{ old('nip_ketua_jurusan', $ketuaJurusan->nip_ketua_jurusan) }}">
                        @error('nip_ketua_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Ketua Jurusan -->
                    <div class="form-group">
                        <label for="email_ketua_jurusan">Email Ketua Jurusan:</label>
                        <input type="email" name="email_ketua_jurusan" id="email_ketua_jurusan"
                            placeholder="Email Ketua Jurusan"
                            class="form-control @error('email_ketua_jurusan') is-invalid @enderror"
                            value="{{ old('email_ketua_jurusan', $ketuaJurusan->email_ketua_jurusan) }}">
                        @error('email_ketua_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Ketua Jurusan -->
                    <div class="form-group position-relative">
                        <label for="password_ketua_jurusan">Password Ketua Jurusan:</label>
                        <input type="password" name="password_ketua_jurusan" id="password_ketua_jurusan"
                            placeholder="Password Ketua Jurusan"
                            class="form-control @error('password_ketua_jurusan') is-invalid @enderror"
                            value="{{ old('password_ketua_jurusan') }}">
                        @error('password_ketua_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- Show/Hide Password -->
                        <button type="button" class="btn btn-link position-absolute" id="togglePassword"
                            style="top: 38px; right: 10px; padding: 0; background: none; border: none; font-size: 1.2rem;">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="{{ route('ketua-jurusan.index') }}">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item {
            font-size: 0.875rem;
        }

        .breadcrumb-item a {
            color: #464646;
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }

        .breadcrumb-item a.active {
            font-weight: bold;
            color: #007bff;
            pointer-events: none;
        }

        .position-relative {
            position: relative;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password_ketua_jurusan');
            const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', passwordFieldType);

            // Toggle the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
@endpush
