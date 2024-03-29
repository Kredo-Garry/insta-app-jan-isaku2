@extends('layouts.app')

@section('title', $user->name)

@section('content')
     <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('profile.update') }}" method="post" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h2 class="h3 mb-3 fw-light text-muted">Update Profile</h2>

                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-auto align-self-end">
                        <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1" aria-describedby="avatar-info">
                        <div class="form-text">
                            Acceptable formats: jpeg, jpg, png, gig only<br>
                            Max file size: 1048kb
                        </div>
                        @error('avatar')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" autofocus>

                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">

                    @error('email')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="introduction" class="form-control">Introduction</label>
                    <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Describe yourself">{{ old('introduction', $user->introduction) }}</textarea>

                    @error('introduction')
                            <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning px-5">Save</button>

                {{-- <div class="password">
                    <div class="mb-3">
                        <label for="old-password" class="form-label">Old Password</label>
                        <input type="password" name="old-password" id="old-password" class="form-control" value="{{ old('password', $user->password) }}">

                        @error('old-password')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning px-5">Save</button>
                </div>                    --}}
            </form>

            <form action="{{ route('profile.updatepassword') }}" method="post" class="mt-5 bg-white shadow rounded-3 p-5">
                @csrf
                @method('PATCH')

                <H2 class="h3 mb-3 fw-light text-muted">Update Password</H2>

                <div class="mb-3">
                    <label for="current-password" class="form-label fw-bolf">Current Password</label>
                    <input type="password" name="current_password" id="current-pasword" class="form-control">
                    @if (session('current_password_error'))
                        <p class="text-danger small">{{ session('current_password_error') }}</p>
                    @endif
                    @error('current_password')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new-password" class="form-label fw-bold">New Password</label>
                    <input type="password" name="new_password" id="new-password" class="form-control" aria-describedby="password-info">
                    <div class="form-text" id="password-info">
                        Your password must be atleast 8 characters long, and contain letters and numbers.
                    </div>
                    @if (session('new_password_error'))
                        <p class="text-danger small">{{ session('new_password_error') }}</p>
                    @endif
                    @error('new_password')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new-password-confirmation" class="form-label fw-bold">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new-password-confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning px-5">Update Password</button>
            </form>
            
            {{-- <form action="{{ route('profile.updatepassword') }}" method="post" class="mt-5 bg-white shadow rounded-3 p-5">
                @csrf
                @method('PATCH')
                <H2 class="h3 mb-3 fw-light text-muted">Update Password</H2>

                <div class="mb-3">
                    <label for="current-password" class="form-label fw-bold">Current Password</label>
                    <input type="password" name="current_password" id="current-password" class="form-control">
                    @if (session('current_password_error'))
                        <p class="text-danger small">{{ session('current_password_error') }}</p>
                    @endif
                    @error('current_password')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new-password" class="form-label fw-bold">New Password</label>
                    <input type="password" name="new_password" id="new-password" class="form-control" aria-describedby="password-info">
                    <div class="form-text" id="password-info">
                        Your password must be atleast 8 characters long, and contain letters and numbers.
                    </div>
                    @if (session('new_password_error'))
                        <p class="text-danger small">{{ session('new_password_error') }}</p>
                    @endif
                    @error('new_password')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new-password-confirmation" class="form-label fw-bold">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new-password-confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning px-5">Update Password</button>
            </form> --}}
        </div>
     </div>
@endsection