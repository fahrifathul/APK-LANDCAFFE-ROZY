@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<h1 class="h3 mb-3">Edit User</h1>

<form method="POST" action="{{ route('admin.users.update', $user) }}">
  @csrf
  @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>

  <div class="row g-3">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control">
      </div>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
      @foreach($roles as $role)
        <option value="{{ $role }}" @selected(old('role', $user->role)==$role)>{{ ucfirst($role) }}</option>
      @endforeach
    </select>
    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="d-flex gap-2">
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
