@extends('admin.layouts.app')

@section('title', 'Activity Logs')
@section('page_title', 'Activity Logs')

@section('content')
  <div class="table-wrap p-0">
  <table class="table align-middle mb-0 w-100">
    <thead>
      <tr>
        <th style="width:60px">#</th>
        <th style="width:200px">Waktu</th>
        <th style="width:260px">User</th>
        <th>Aktivitas</th>
      </tr>
    </thead>
    <tbody>
      @forelse($logs as $log)
      <tr>
        <td>{{ $loop->iteration + ($logs->currentPage() - 1) * $logs->perPage() }}</td>
        <td>{{ $log->created_at->format('d M Y H:i') }}</td>
        <td>{{ $log->user?->name }} ({{ $log->user?->role }})</td>
        <td>{{ $log->activity }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="text-center py-4 text-muted fst-italic">Belum ada aktivitas.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  </div>
  <div class="mt-3 d-flex justify-content-end">
    {{ $logs->onEachSide(1)->links('pagination::bootstrap-5') }}
  </div>
@endsection
