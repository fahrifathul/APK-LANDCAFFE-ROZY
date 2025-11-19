@extends('admin.layouts.app')

@section('title', 'Users')
@section('page_title', 'Users Management')
@section('page_actions')
  <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">+ Add User</a>
@endsection

@section('content')
<div class="table-wrap p-0">
  <div class="table-responsive">
    <table class="table table-bordered align-middle mb-0 w-100">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Role</th>
      <th>Dibuat</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($users as $user)
    <tr>
      <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td class="text-uppercase"><span class="badge text-bg-dark">{{ $user->role }}</span></td>
      <td>{{ $user->created_at->format('d M Y H:i') }}</td>
      <td class="text-end">
        <div class="btn-group btn-group-sm" role="group">
          <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning" title="Edit User">✏️ Edit</a>
          <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus user ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" title="Hapus User">🗑️ Hapus</button>
          </form>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="6" class="text-center">Belum ada user.</td>
    </tr>
    @endforelse
  </tbody>
    </table>
  </div>
</div>

<div class="mt-3 d-flex justify-content-center">
  <div class="pagination-wrapper">
    {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
  </div>
</div>
@endsection
