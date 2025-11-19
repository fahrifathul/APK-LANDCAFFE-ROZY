@extends('admin.layouts.app')

@section('title', 'Edit Menu')

@section('content')
<h1 class="h3 mb-3">Edit Menu</h1>

<form method="POST" action="{{ route('admin.menus.update', $menu) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}" @selected(old('category_id', $menu->category_id)==$cat->id)>{{ $cat->name }}</option>
      @endforeach
    </select>
    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="row g-3">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" value="{{ old('name', $menu->name) }}" class="form-control @error('name') is-invalid @enderror" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-md-3">
      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $menu->price) }}" class="form-control @error('price') is-invalid @enderror" required>
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-md-3">
      <div class="mb-3 form-check mt-4">
        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" @checked(old('is_available', $menu->is_available))>
        <label class="form-check-label" for="is_available">Tersedia</label>
      </div>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $menu->description) }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Gambar Saat Ini</label>
    <div>
      @if($menu->image)
        <img src="{{ asset('storage/'.$menu->image) }}" alt="{{ $menu->name }}" class="img-thumbnail" style="max-width:120px">
      @else
        <em>Tidak ada</em>
      @endif
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Gambar Baru (opsional)</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="d-flex gap-2">
    <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
