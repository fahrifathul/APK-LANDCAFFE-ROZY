@extends('admin.layouts.app')

@section('title', 'Kasir - Buat Pesanan')

@section('content')
<style>
    .select2-container--default .select2-results__option {
        padding: 8px;
    }
    .menu-option {
        display: flex;
        align-items: center;
    }
    .menu-option img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 10px;
    }
    .menu-info {
        flex: 1;
    }
    .menu-name {
        font-weight: 500;
    }
    .menu-price {
        color: #6c757d;
        font-size: 0.85em;
    }
    .select2-container--default .select2-selection--single {
        height: 42px;
        padding: 5px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 32px;
    }
</style>

<h1 class="h3 mb-3">Buat Pesanan</h1>

<form method="POST" action="{{ route('kasir.orders.store') }}" id="order-form">
  @csrf
  <div class="row g-3 mb-3">
    <div class="col-md-6">
      <label class="form-label">Nama Pelanggan (opsional)</label>
      <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">Nomor Meja (opsional)</label>
      <input type="text" name="table_number" value="{{ old('table_number') }}" class="form-control">
    </div>
  </div>

  <div class="mb-2 d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Item Pesanan</h5>
    <button type="button" class="btn btn-sm btn-outline-primary" id="add-row">Tambah Item</button>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered align-middle" id="items-table">
      <thead>
        <tr>
          <th style="width:45%">Menu</th>
          <th style="width:15%">Qty</th>
          <th>Catatan</th>
          <th style="width:10%"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <select name="items[0][menu_id]" class="form-select menu-select" required>
              <option value="">Pilih menu</option>
              @foreach($menus as $m)
                <option 
                  value="{{ $m->id }}" 
                  data-image="{{ $m->image ? asset('storage/' . $m->image) : asset('images/default-food.png') }}"
                  data-price="{{ $m->price }}"
                >
                  {{ $m->name }} - Rp {{ number_format($m->price, 0, ',', '.') }}
                </option>
              @endforeach
            </select>
          </td>
          <td>
            <input type="number" name="items[0][quantity]" class="form-control" min="1" value="1" required>
          </td>
          <td>
            <input type="text" name="items[0][notes]" class="form-control" placeholder="Opsional">
          </td>
          <td class="text-center">
            <button type="button" class="btn btn-sm btn-outline-danger remove-row">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="d-flex gap-2 mt-3">
    <a href="{{ route('kasir.orders.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button class="btn btn-primary">Simpan Pesanan</button>
  </div>
</form>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Format tampilan dropdown
    function formatMenu(menu) {
        if (!menu.id) return menu.text;
        
        var $menu = $(
            '<div class="menu-option">' +
            '<img src="' + $(menu.element).data('image') + '" onerror="this.src=\'{{ asset("images/default-food.png") }}\'" />' +
            '<div class="menu-info">' +
            '<div class="menu-name">' + menu.text.split(' - ')[0] + '</div>' +
            '<div class="menu-price">Rp ' + parseInt($(menu.element).data('price')).toLocaleString('id-ID') + '</div>' +
            '</div></div>'
        );
        return $menu;
    }

    // Format tampilan yang dipilih
    function formatMenuSelection(menu) {
        if (!menu.id) return menu.text;
        return $(menu.element).text().split(' - ')[0];
    }

    // Inisialisasi select2
    $('.menu-select').select2({
        templateResult: formatMenu,
        templateSelection: formatMenuSelection,
        escapeMarkup: function(markup) {
            return markup;
        }
    });

    // Fungsi untuk menambahkan baris baru
    let rowCount = 1;
    $('#add-row').click(function() {
        const newRow = `
            <tr>
                <td>
                    <select name="items[${rowCount}][menu_id]" class="form-select menu-select" required>
                        <option value="">Pilih menu</option>
                        @foreach($menus as $m)
                            <option 
                                value="{{ $m->id }}" 
                                data-image="{{ $m->image ? asset('storage/' . $m->image) : asset('images/default-food.png') }}"
                                data-price="{{ $m->price }}"
                            >
                                {{ $m->name }} - Rp {{ number_format($m->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="items[${rowCount}][quantity]" class="form-control" min="1" value="1" required></td>
                <td><input type="text" name="items[${rowCount}][notes]" class="form-control" placeholder="Opsional"></td>
                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger remove-row">Hapus</button></td>
            </tr>
        `;
        
        $('#items-table tbody').append(newRow);
        
        // Inisialisasi select2 untuk baris baru
        $('.menu-select').select2({
            templateResult: formatMenu,
            templateSelection: formatMenuSelection,
            escapeMarkup: function(markup) {
                return markup;
            }
        });
        
        rowCount++;
    });

    // Hapus baris
    $(document).on('click', '.remove-row', function() {
        if ($('#items-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
        }
    });
});
</script>
@endpush
@endsection
