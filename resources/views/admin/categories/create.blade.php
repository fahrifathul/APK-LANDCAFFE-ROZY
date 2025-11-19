@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<h1 class="h3 mb-3">Tambah Kategori</h1>

<form method="POST" action="{{ route('admin.categories.store') }}">
  @csrf
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Tipe</label>
    <select name="type" class="form-select @error('type') is-invalid @enderror" required>
      <option value="">Pilih tipe</option>
      <option value="makanan" @selected(old('type')=='makanan')>Makanan</option>
      <option value="minuman" @selected(old('type')=='minuman')>Minuman</option>
      <option value="Cake" @selected(old('type')=='Cake')>Cake</option>
    </select>
    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection
