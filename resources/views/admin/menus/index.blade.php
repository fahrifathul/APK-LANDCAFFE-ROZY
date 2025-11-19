@extends('admin.layouts.app')

@section('title', 'Menu')
@section('page_title', 'Menus Management')
@section('page_actions')
  <a href="{{ route('admin.menus.create') }}" class="btn btn-primary btn-sm">+ Tambah Menu</a>
@endsection

@section('content')
<div class="table-wrap p-0">
  <div class="table-responsive">
    <table class="table table-bordered align-middle mb-0 w-100">
  <thead>
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Tersedia</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($menus as $menu)
    <tr>
      <td>{{ $loop->iteration + ($menus->currentPage() - 1) * $menus->perPage() }}</td>
      <td style="width:90px">
        @if($menu->image)
          <img src="{{ asset('storage/'.$menu->image) }}" alt="{{ $menu->name }}" class="rounded shadow-sm" style="max-width:80px; height:60px; object-fit:cover;">
        @else
          <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width:80px; height:60px;">
            <span class="text-muted">📷</span>
          </div>
        @endif
      </td>
      <td>{{ $menu->name }}</td>
      <td>{{ $menu->category?->name }}</td>
      <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
      <td>
        @if($menu->is_available)
          <span class="badge text-bg-success">Ya</span>
        @else
          <span class="badge text-bg-secondary">Tidak</span>
        @endif
      </td>
      <td class="text-end">
        <div class="btn-group btn-group-sm" role="group">
          <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-warning" title="Edit Menu">✏️ Edit</a>
          <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus menu ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" title="Hapus Menu">🗑️ Hapus</button>
          </form>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="7" class="text-center">Belum ada menu.</td>
    </tr>
    @endforelse
  </tbody>
    </table>
  </div>
</div>

<div class="mt-3 d-flex justify-content-center">
  <div class="pagination-wrapper">
    {{ $menus->onEachSide(1)->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection
