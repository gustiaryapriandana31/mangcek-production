@extends('layouts.app')

@section('title', 'Admin - CRUD Pencatatan Usaha')

@section('content')
    <div class="px-4 pb-2">
        <div class="bg-gradient-to-r from-gray-50 to-white shadow-md rounded-b-lg mb-6 py-2 px-4 border-b border-gray-200">
            <div class="flex items-center justify-between max-w-6xl mx-auto">
                <!-- Logo Kiri -->
                <div class="flex items-center space-x-2 flex-shrink-0">
                    <div class="bg-white p-1 rounded-lg shadow-sm border border-gray-200">
                        <img src="{{ asset('images/logo-bps.svg') }}" alt="Logo BPS" class="w-8 h-8 object-contain"
                            onerror="this.src='https://via.placeholder.com/32x32/ccc/666?text=BPS';">
                    </div>
                </div>

                <!-- Judul Tengah dengan warna #f79039 dan #febd26 -->
                <div class="text-center flex-1 min-w-0 mx-2">
                    <h1
                        class="text-lg md:text-2xl lg:text-3xl font-bold tracking-tight whitespace-nowrap overflow-hidden text-ellipsis">
                        <span style="color: #f79039" class="inline-block">MANGCEK</span>
                        <span style="color: #febd26" class="inline-block ml-1 md:ml-2">SE2026</span>
                    </h1>
                    <div
                        class="mt-0 md:mt-1 text-gray-600 text-xs md:text-sm whitespace-nowrap overflow-hidden text-ellipsis px-1">
                        (Mitra Bantu Ground Check)
                    </div>
                </div>

                <!-- Logo Kanan -->
                <div class="flex items-center space-x-2 flex-shrink-0">
                    <div class="bg-white p-1 rounded-lg shadow-sm border border-gray-200">
                        <img src="{{ asset('images/logo-se2026.png') }}" alt="Logo SE2026" class="w-8 h-8 object-contain"
                            onerror="this.src='https://via.placeholder.com/32x32/ccc/666?text=SE2026';">
                    </div>
                </div>
            </div>
        </div>
        <!-- DASHBOARD DATA ONLY -->

        <div class="flex items-center gap-2 mb-3" id="filter-wrapper">

            <!-- kecamatan -->
            <select id="filter_kecamatan" class="px-2 py-1 text-xs border rounded">
                <option value="">Semua Kecamatan</option>
                @foreach ($kecamatan as $kec)
                    <option value="{{ $kec }}">{{ $kec }}</option>
                @endforeach
            </select>

            <!-- desa -->
            <select id="filter_desa" class="px-2 py-1 text-xs border rounded">
                <option value="">Semua Desa</option>
            </select>

            <!-- reset -->
            <button id="reset_filter" class="px-2 py-1 text-xs bg-gray-200 rounded hover:bg-gray-300">
                Reset
            </button>

            <!-- 🔥 spinner kecil -->
            <div id="filter-loading" class="hidden">
                <svg class="animate-spin h-4 w-4 text-orange-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                </svg>
            </div>

        </div>

        <!-- Card untuk tabel -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-sm font-medium text-gray-700">Daftar Pencatatan Usaha</h2>
                        <p class="text-gray-500 text-xs mt-0.5">Total data: <span id="totalRecords"
                                class="font-medium">0</span>
                            entri</p>
                    </div>
                </div>
            </div>

            <div>
                <div class="relative overflow-x-auto rounded border border-gray-200 px-3">
                    <table class="min-w-full text-xs" id="dataTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    No</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    IDSBR</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Nama Usaha</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Alamat Usaha</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kecamatan</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Desa</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kode Kec</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kode Desa</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kode Wilayah</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    GC Username</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    GCS Result</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Latitude GC</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Longitude GC</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Data akan diisi oleh DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    </div>

    @push('styles')
        <style>
            /* Dashboard Specific Styles */
            #filter_kecamatan,
            #filter_desa {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                background-position: right 0.5rem center;
                background-repeat: no-repeat;
                background-size: 1.5em 1.5em;
                padding-right: 2.5rem;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            /* Smooth transition for progress bars */
            #checked_bar,
            #unchecked_bar,
            #percentage_bar {
                transition: width 1.5s cubic-bezier(0.34, 1.56, 0.64, 1);
                background: linear-gradient(90deg, #fbbf24, #f79039) !important;
                opacity: 0.9;
                /* Kurangi opacity sedikit */
            }

            /* Card hover effects */
            .bg-gradient-to-br {
                transition: all 0.3s ease;
            }

            .bg-gradient-to-br:hover {
                transform: translateY(-1px);
                /* Kurangi efek hover */
                box-shadow: 0 4px 12px -2px rgba(0, 0, 0, 0.08);
                /* Shadow lebih soft */
            }

            /* Animation for numbers */
            @keyframes countUp {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Tambahkan animasi saat angka berubah */
            #total_data,
            #checked_data,
            #unchecked_data,
            #percentage_data {
                animation: countUp 0.6s ease-out;
            }

            /* Primary color utility */
            .text-primary {
                color: #f79039;
            }

            /* Tabel styling - NO FIXED WIDTHS */
            #dataTable th,
            #dataTable td {
                white-space: nowrap;
                vertical-align: middle;
                font-size: 0.75rem;
            }

            #dataTable th {
                background-color: #f9fafb;
                font-weight: 500;
                padding: 8px 12px;
            }

            #dataTable td {
                padding: 8px 12px;
                border-color: #e5e7eb;
            }

            #dataTable tbody tr:hover {
                background-color: #f9fafb;
            }

            /* Modal styling */
            #editModal .max-h-\[60vh\] {
                max-height: 60vh;
            }

            #editModal .max-h-\[60vh\]::-webkit-scrollbar {
                width: 4px;
            }

            #editModal .max-h-\[60vh\]::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            #editModal .max-h-\[60vh\]::-webkit-scrollbar-thumb {
                background: #cbd5e0;
            }

            /* Status badges */
            .status-badge {
                padding: 2px 6px;
                border-radius: 12px;
                font-size: 0.7rem;
                font-weight: 500;
                display: inline-block;
            }

            .status-tidak_ditemukan {
                background-color: #fee2e2;
                color: #991b1b;
            }

            .status-ditemukan {
                background-color: #dcfce7;
                color: #166534;
            }

            .status-tutup {
                background-color: #fef3c7;
                color: #92400e;
            }

            .status-ganda {
                background-color: #dbeafe;
                color: #1e40af;
            }

            /* DataTables customization */
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 4px 8px;
                margin: 0 1px;
                border-radius: 4px;
                border: 1px solid #e5e7eb;
                font-size: 0.75rem;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                background: #f79039;
                color: white !important;
                border-color: #f79039;
            }

            /* Tabulasi table styling */
            #tbl-kecamatan {
                border-collapse: separate;
                border-spacing: 0;
            }

            #tbl-kecamatan th {
                border-bottom: 2px solid #e5e7eb;
                font-weight: 600;
                text-transform: none;
                letter-spacing: normal;
            }

            #tbl-kecamatan td {
                border-bottom: 1px solid #f3f4f6;
                vertical-align: middle;
            }

            #tbl-kecamatan tbody tr {
                transition: background-color 0.2s ease;
            }

            #tbl-kecamatan tbody tr:hover {
                background-color: #f9fafb;
            }

            /* Toggle button styling */
            .toggle {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 6px;
                transition: all 0.2s;
                background-color: #f3f4f6;
                color: #6b7280;
                font-size: 14px;
            }

            .toggle:hover {
                background-color: #f79039;
                color: white;
                transform: scale(1.05);
            }

            /* Detail row styling */
            .detail-row td {
                background-color: #f8fafc !important;
                border-left: 3px solid #e5e7eb !important;
                /* Warna gray 200 - lebih clean */
            }

            /* Sub-table styling */
            #tbl-kecamatan table table {
                margin: 0;
                width: 100%;
                border: none;
            }

            #tbl-kecamatan table table th {
                background-color: #f1f5f9;
                font-weight: 500;
                padding: 8px 12px;
            }

            #tbl-kecamatan table table td {
                padding: 8px 12px;
                border-bottom: 1px solid #e2e8f0;
            }

            /* Progress percentage colors */
            .percentage-high {
                color: #10b981;
                font-weight: 600;
            }

            .percentage-medium {
                color: #f59e0b;
                font-weight: 600;
            }

            .percentage-low {
                color: #ef4444;
                font-weight: 600;
            }

            /* Row colors for checked status */
            .row-highlight {
                background-color: #f0fdf4;
            }

            /* Garis pemisah yang sangat clean */
            .clean-divider {
                border-color: #f1f5f9 !important;
            }

            /* Untuk tabel data utama */
            #dataTable th,
            #dataTable td {
                border-color: #f3f4f6 !important;
                /* Gray 100 */
            }

            /* Untuk tabel tabulasi */
            #tbl-kecamatan th,
            #tbl-kecamatan td {
                border-color: #f1f5f9 !important;
                /* Gray 100 yang lebih soft */
            }

            /* Hover effect yang lebih subtle */
            #tbl-kecamatan tbody tr:hover {
                background-color: #f8fafc !important;
                /* Sky 50 - sangat subtle */
            }

            /* Search loading animation */
            .search-loading .dataTables_filter input {
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none'%3E%3Ccircle cx='12' cy='12' r='10' stroke='%23f79039' stroke-width='3' stroke-dasharray='30 70' stroke-linecap='round'%3E%3CanimateTransform attributeName='transform' type='rotate' from='0 12 12' to='360 12 12' dur='0.8s' repeatCount='indefinite'/%3E%3C/circle%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 8px center;
                padding-right: 28px !important;
                border-color: #f79039 !important;
                box-shadow: 0 0 0 2px rgba(247, 144, 57, 0.15);
                transition: all 0.2s ease;
            }

            .search-done .dataTables_filter input {
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2310b981' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 8px center;
                padding-right: 28px !important;
                border-color: #10b981 !important;
                box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.15);
                transition: all 0.2s ease;
            }

            .search-empty .dataTables_filter input {
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23ef4444' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cline x1='18' y1='6' x2='6' y2='18'/%3E%3Cline x1='6' y1='6' x2='18' y2='18'/%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 8px center;
                padding-right: 28px !important;
                border-color: #ef4444 !important;
                box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.15);
                transition: all 0.2s ease;
            }

            /* Search hint text */
            #search-hint {
                transition: all 0.3s ease;
                font-size: 0.65rem;
            }

            /* Highlight search result di tabel */
            mark.search-highlight {
                background-color: #fef08a;
                color: #713f12;
                border-radius: 2px;
                padding: 0 2px;
                font-weight: 500;
            }

            #table-skeleton {
                min-height: 150px;
            }

            #dataTable tbody {
                transition: opacity 0.2s ease;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function() {

                function showFilterLoading() {
                    $('#filter-loading').removeClass('hidden');
                }

                function hideFilterLoading() {
                    $('#filter-loading').addClass('hidden');
                }

                var searchTimer = null;

                var table = $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    deferRender: true,

                    ajax: {
                        url: "{{ route('dashboard.index') }}",
                        type: 'GET',
                        data: function(d) {
                            d.kecamatan = $('#filter_kecamatan').val();
                            d.desa = $('#filter_desa').val();
                            return d;
                        },
                        error: function(xhr) {
                            console.error('Gagal memuat data:', xhr.responseText);
                        }
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            className: 'text-center',
                            width: '40px'
                        },
                        {
                            data: 'idsbr',
                            name: 'idsbr',
                            className: 'text-center font-medium',
                            searchable: false,
                            render: $.fn.dataTable.render.text()
                        },
                        {
                            data: 'nama_usaha',
                            name: 'nama_usaha',
                            searchable: true, // HANYA ini yang searchable
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'alamat_usaha',
                            name: 'alamat_usaha',
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'nmkec',
                            name: 'nmkec',
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'nmdesa',
                            name: 'nmdesa',
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'kdkec',
                            name: 'kdkec',
                            orderable: false,
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'kddesa',
                            name: 'kddesa',
                            orderable: false,
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'kode_wilayah',
                            name: 'kode_wilayah',
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'gc_username',
                            name: 'gc_username',
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'gcs_result',
                            name: 'gcs_result',
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'latitude_gc',
                            name: 'latitude_gc',
                            orderable: false,
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        },
                        {
                            data: 'longitude_gc',
                            name: 'longitude_gc',
                            orderable: false,
                            searchable: false,
                            defaultContent: '<span class="text-gray-400">-</span>'
                        }
                    ],

                    order: [
                        [1, 'asc']
                    ],
                    pageLength: 25,
                    lengthMenu: [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],

                    language: {
                        processing: `
    <div class="flex flex-col items-center justify-center py-6 gap-2 text-gray-500">
        <svg class="animate-spin h-6 w-6 text-orange-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
        </svg>
        <span class="text-xs">Memuat data...</span>
    </div>
    `,
                        search: '',
                        searchPlaceholder: 'Cari nama usaha...',
                        lengthMenu: 'Tampilkan _MENU_',
                        info: 'Menampilkan _START_&ndash;_END_ dari _TOTAL_ data',
                        infoEmpty: 'Tidak ada data',
                        zeroRecords: 'Nama usaha tidak ditemukan',
                        emptyTable: 'Tidak ada data tersedia',
                        paginate: {
                            next: '→',
                            previous: '←'
                        }
                    },

                    dom: '<"flex justify-between items-center p-2"<"text-xs"l><"text-xs"f>>' +
     'r' +   // ⬅️ pisahin
     't' +
     '<"flex justify-between items-center p-2"<"text-xs text-gray-600"i><"text-xs"p>>',

                    autoWidth: false,
                    scrollX: true,
                    stateSave: false,
                    responsive: false,

                    drawCallback: function(settings) {
                        if (settings.json && settings.json.recordsTotal !== undefined) {
                            $('#totalRecords').text(
                                Number(settings.json.recordsTotal).toLocaleString('id-ID')
                            );
                        }
                    },

                    initComplete: function() {
                        let api = this.api();
                        let searchTimer;

                        let $input = $('.dataTables_filter input');
                        let $wrapper = $('.dataTables_wrapper');

                        $input.addClass(
                            'px-2 py-1 text-xs border border-gray-300 rounded focus:outline-none'
                        );

                        function setState(state) {
                            $wrapper.removeClass('search-loading search-done search-empty');
                            if (state) $wrapper.addClass('search-' + state);
                        }

                        $input.on('keyup', function() {
                            clearTimeout(searchTimer);

                            let val = this.value.trim();

                            // kalau kosong → reset
                            if (val === '') {
                                setState(null);
                                api.search('').draw();
                                return;
                            }

                            // tampilkan loading
                            setState('loading');

                            searchTimer = setTimeout(function() {

                                // setelah draw selesai
                                api.one('draw', function() {
                                    let total = api.page.info().recordsDisplay;

                                    if (total > 0) {
                                        setState('done');
                                    } else {
                                        setState('empty');
                                    }
                                });

                                api.search(val).draw();

                            }, 400);
                        });

                        // kalau klik clear (x)
                        $input.on('search', function() {
                            setState(null);
                            api.search('').draw();
                        });
                    }
                });

                table.on('processing.dt', function(e, settings, processing) {

                    if (processing) {
                        showFilterLoading(); // spinner kecil
                    } else {
                        hideFilterLoading();
                    }

                });

                // 📍 ketika kecamatan berubah → load desa
                $('#filter_kecamatan').on('change', function() {

                    showFilterLoading();

                    let kecamatan = $(this).val();

                    // kasih waktu browser render loading dulu
                    setTimeout(() => {

                        $('#filter_desa').html('<option value="">Loading...</option>');

                        if (kecamatan === '') {
                            $('#filter_desa').html('<option value="">Semua Desa</option>');
                            table.draw();
                            return;
                        }

                        $.get('/get-desa', {
                            kecamatan: kecamatan
                        }, function(data) {
                            let html = '<option value="">Semua Desa</option>';

                            data.forEach(function(d) {
                                html += `<option value="${d}">${d}</option>`;
                            });

                            $('#filter_desa').html(html);

                            table.draw();
                        });

                    }, 0); // ⬅️ ini kuncinya
                });


                // 📍 ketika desa berubah
                $('#filter_desa').on('change', function() {
                    showFilterLoading();

                    setTimeout(() => {
                        table.draw();
                    }, 0);
                });


                // 📍 reset filter
                $('#reset_filter').on('click', function() {
                    showFilterLoading();
                    $('#filter_kecamatan').val('');
                    $('#filter_desa').html('<option value="">Semua Desa</option>');
                    table.draw();
                });

            });
        </script>
    @endpush
@endsection
