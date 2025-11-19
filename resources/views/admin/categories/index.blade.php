@extends('admin.layouts.app')

@section('title', 'Kategori')
@section('page_title', 'Categories')
@section('page_actions')
  <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">+ Add Category</a>
@endsection

@section('content')
  <div class="table-wrap p-0">
    <div class="table-responsive">
      <table class="table align-middle mb-0 w-100">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Tipe</th>
          <th>Deskripsi</th>
          <th class="text-end">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
        <tr>
          <td class="fw-semibold">{{ $category->name }}</td>
          <td>
            <span class="badge bg-secondary-subtle text-secondary-emphasis">
              {{ ucfirst($category->type) }}
            </span>
          </td>
          <td class="text-muted">
            @if(empty($category->description))
              <span class="fst-italic">Tidak ada deskripsi</span>
            @else
              {{ \Illuminate\Support\Str::limit($category->description, 80) }}
            @endif
          </td>
          <td class="text-end">
            <div class="btn-group btn-group-sm" role="group">
              <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning" title="Edit Kategori">✏️ Edit</a>
              <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini? Tindakan tidak dapat dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Hapus Kategori">🗑️ Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center py-4 text-muted fst-italic">
            Belum ada kategori.
          </td>
        </tr>
        @endforelse
      </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3 d-flex justify-content-center">
    <div class="pagination-wrapper">
      {{ $categories->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
  </div>
@endsection
