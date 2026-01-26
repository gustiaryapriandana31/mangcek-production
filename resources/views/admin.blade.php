@extends('layouts.app')

@section('title', 'Admin - CRUD Pencatatan Usaha')

@section('content')
    <div class="px-4 pb-2">
        <div class="bg-gradient-to-r from-gray-50 to-white shadow-md rounded-b-lg mb-6 py-2 px-4 border-b border-gray-200">
            <div class="flex items-center justify-between max-w-6xl mx-auto">
                <!-- Logo Kiri -->
                <div class="flex items-center space-x-2 flex-shrink-0">
                    <div class="bg-white p-1 rounded-lg shadow-sm border border-gray-200">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg/2560px-Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg.png"
                            alt="Logo BPS" class="w-8 h-8 object-contain"
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
        <!-- DASHBOARD - REDESIGN -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
            <!-- HEADER DASHBOARD -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-base font-bold text-gray-800">Dashboard Monitoring</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Statistik Ground Check per Wilayah</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="text-xs text-gray-500 px-2 py-1 bg-gray-50 rounded">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        <span id="currentDate"></span>
                    </div>
                </div>
            </div>

            <!-- FILTER -->
            <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-100 rounded-lg p-4 mb-5 shadow-inner">
                <div class="flex items-center mb-2">
                    <i class="fas fa-filter text-sm text-primary mr-2"></i>
                    <h3 class="text-sm font-semibold text-gray-700">Filter Wilayah</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5 flex items-center">
                            <i class="fas fa-map-marker-alt mr-1.5 text-primary text-xs"></i>
                            Kecamatan
                        </label>
                        <select id="filter_kecamatan"
                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-white shadow-sm">
                            <option value="">Semua Kecamatan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5 flex items-center">
                            <i class="fas fa-map-pin mr-1.5 text-primary text-xs"></i>
                            Desa/Kelurahan
                        </label>
                        <select id="filter_desa"
                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 bg-white shadow-sm">
                            <option value="">Semua Desa</option>
                        </select>
                    </div>

                    <div class="flex items-end">
                        <button onclick="resetFilter()"
                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200 bg-white shadow-sm flex items-center justify-center">
                            <i class="fas fa-redo-alt mr-1.5 text-xs"></i>
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- STATISTICS CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Usaha -->
                <div
                    class="bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 rounded-lg bg-gray-100">
                            <i class="fas fa-store text-lg text-gray-600"></i>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-gray-100 text-gray-600">
                            TOTAL
                        </span>
                    </div>
                    <div class="mb-1">
                        <p class="text-xs text-gray-500 mb-1">Total Usaha</p>
                        <p id="total_data" class="text-2xl font-bold text-gray-800">0</p>
                    </div>
                    <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gray-400 rounded-full" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Sudah Dicek -->
                <div
                    class="bg-gradient-to-br from-green-50 to-white border border-green-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 rounded-lg bg-green-100">
                            <i class="fas fa-check-circle text-lg text-green-600"></i>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-green-100 text-green-600">
                            DONE
                        </span>
                    </div>
                    <div class="mb-1">
                        <p class="text-xs text-green-600 mb-1">Sudah Dicek</p>
                        <p id="checked_data" class="text-2xl font-bold text-green-700">0</p>
                    </div>
                    <div class="h-1 w-full bg-green-200 rounded-full overflow-hidden">
                        <div id="checked_bar" class="h-full bg-green-500 rounded-full" style="width: 0%"></div>
                    </div>
                </div>

                <!-- Belum Dicek -->
                <div
                    class="bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 rounded-lg bg-red-100">
                            <i class="fas fa-clock text-lg text-red-600"></i>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-red-100 text-red-600">
                            PENDING
                        </span>
                    </div>
                    <div class="mb-1">
                        <p class="text-xs text-red-600 mb-1">Belum Dicek</p>
                        <p id="unchecked_data" class="text-2xl font-bold text-red-700">0</p>
                    </div>
                    <div class="h-1 w-full bg-red-200 rounded-full overflow-hidden">
                        <div id="unchecked_bar" class="h-full bg-red-500 rounded-full" style="width: 0%"></div>
                    </div>
                </div>

                <!-- Persentase -->
                <div
                    class="bg-gradient-to-br from-[#fef6e6] to-white border border-[#fde9c8] rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 rounded-lg" style="background-color: rgba(247, 144, 57, 0.1)">
                            <i class="fas fa-chart-line text-lg" style="color: #f79039"></i>
                        </div>
                        <span class="text-xs font-medium px-2 py-1 rounded-full"
                            style="background-color: rgba(247, 144, 57, 0.1); color: #f79039">
                            PROGRESS
                        </span>
                    </div>
                    <div class="mb-1">
                        <p class="text-xs mb-1" style="color: #f79039">Persentase Selesai</p>
                        <div class="flex items-baseline space-x-1">
                            <p id="percentage_data" class="text-2xl font-bold" style="color: #f79039">0%</p>
                            <span class="text-xs text-gray-500">dari target</span>
                        </div>
                    </div>
                    <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div id="percentage_bar" class="h-full rounded-full transition-all duration-1000"
                            style="background: linear-gradient(90deg, #febd26, #f79039); width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Tabulasi --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-base font-bold text-gray-800">Rekapitulasi per Kecamatan</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Detail statistik ground check per wilayah</p>
                </div>
                <div class="text-xs text-gray-500 px-2 py-1 bg-gray-50 rounded">
                    <i class="fas fa-table mr-1"></i>
                    Tabulasi Data
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table id="tbl-kecamatan" class="w-full text-sm">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr class="text-left">
                            <th class="px-4 py-3 text-center font-medium text-gray-700">#</th>
                            <th class="px-4 py-3 font-medium text-gray-700">Kecamatan</th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-store mr-1 text-xs"></i>
                                    <span>Total</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-check-circle mr-1 text-xs text-green-600"></i>
                                    <span>GC</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-chart-line mr-1 text-xs" style="color: #f79039"></i>
                                    <span>%</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-check mr-1 text-xs text-blue-600"></i>
                                    <span>Ditemukan</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-times mr-1 text-xs text-red-600"></i>
                                    <span>Tdk</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-door-closed mr-1 text-xs text-yellow-600"></i>
                                    <span>Tutup</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center font-medium text-gray-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-copy mr-1 text-xs text-purple-600"></i>
                                    <span>Ganda</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white"></tbody>
                </table>
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
                    <button onclick="exportToCSV()"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs flex items-center transition-all duration-200">
                        <i class="fas fa-file-csv mr-1 text-xs"></i> Export CSV
                    </button>
                </div>
            </div>

            <div>
                <div class="overflow-x-auto rounded border border-gray-200 px-3">
                    <table class="min-w-full text-xs" id="dataTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    No</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kode Usaha</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Nama Usaha</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Nama Usaha Baru</th>

                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kode Kecamatan</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kecamatan</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Kode Desa</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Desa</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Status</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Alamat</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    RT</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    RW</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Latitude</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Longitude</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Foto</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Petugas</th>
                                <th
                                    class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                    Tanggal</th>
                                <th class="px-3 py-2 text-center font-medium text-gray-700 uppercase tracking-wider">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Data akan diisi oleh DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white rounded-lg shadow-lg w-full max-w-sm mx-auto">
                    <!-- Header -->
                    <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 rounded-t-lg">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-gray-900">Edit Pencatatan Usaha</h3>
                            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                        <p class="text-gray-500 text-xs mt-0.5">Perbarui data pencatatan usaha</p>
                    </div>

                    <!-- Body -->
                    <div class="px-4 py-3 max-h-[60vh] overflow-y-auto">
                        <form id="editForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit_id" name="id">

                            <div class="space-y-3">
                                <!-- Kode Usaha -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">
                                        Kode Nama Usaha <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="edit_kode_nama_usaha" name="kode_nama_usaha" required
                                        class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary">
                                </div>

                                <!-- Status Usaha -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">
                                        Status Usaha <span class="text-red-500">*</span>
                                    </label>
                                    <select id="edit_status_usaha" name="status_usaha" required
                                        class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary appearance-none bg-white">
                                        <option value="tidak_ditemukan">Tidak Ditemukan</option>
                                        <option value="ditemukan">Ditemukan</option>
                                        <option value="tutup">Tutup</option>
                                        <option value="ganda">Ganda</option>
                                    </select>
                                </div>

                                <!-- Alamat -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">
                                        Alamat <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="edit_alamat" name="alamat" rows="2" required
                                        class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary resize-none"></textarea>
                                </div>

                                <!-- RT & RW -->
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 mb-1">
                                            RT <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="edit_rt" name="rt" required maxlength="10"
                                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary text-center">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 mb-1">
                                            RW <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="edit_rw" name="rw" required maxlength="10"
                                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary text-center">
                                    </div>
                                </div>

                                <!-- Latitude & Longitude -->
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 mb-1">
                                            Latitude
                                        </label>
                                        <input type="number" step="any" id="edit_latitude" name="latitude"
                                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 mb-1">
                                            Longitude
                                        </label>
                                        <input type="number" step="any" id="edit_longitude" name="longitude"
                                            class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary">
                                    </div>
                                </div>

                                <!-- Nama Petugas -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">
                                        Nama Petugas <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="edit_nama_petugas" name="nama_petugas" required
                                        class="w-full px-3 py-2 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary">
                                </div>

                                <!-- Foto -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">
                                        Foto Usaha (Opsional)
                                    </label>
                                    <div class="border border-dashed border-gray-300 rounded p-2 text-center">
                                        <input type="file" id="edit_photo" name="photo" accept="image/*"
                                            class="hidden" onchange="previewFileName(this)">
                                        <label for="edit_photo" class="cursor-pointer">
                                            <i class="fas fa-camera text-lg text-gray-400 mb-1"></i>
                                            <p class="text-xs text-gray-600">Klik untuk upload foto</p>
                                            <p class="text-xs text-gray-500 mt-0.5">Maks 2MB (JPG, PNG, JPEG)</p>
                                        </label>
                                        <div id="fileName" class="text-xs text-primary mt-1 hidden"></div>
                                    </div>

                                    <!-- Current Photo -->
                                    <div id="current_photo_container" class="mt-2 hidden">
                                        <p class="text-xs font-medium text-gray-700 mb-1">Foto saat ini:</p>
                                        <div id="current_photo"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 rounded-b-lg">
                        <div class="flex justify-end space-x-2">
                            <button type="button" onclick="closeEditModal()"
                                class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                                Batal
                            </button>
                            <button type="submit" form="editForm"
                                class="px-3 py-1.5 text-xs font-medium text-white bg-primary border border-transparent rounded hover:bg-orange-600">
                                Update Data
                            </button>
                        </div>
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
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.0/papaparse.min.js"></script>
        <script>
            // =============================
            // GLOBAL FILTER DASHBOARD
            // =============================
            let filterWilayah = {
                kode_kecamatan: '',
                kode_desa: '',
                kode_nama_usaha: ''
            };
            // File name preview
            function previewFileName(input) {
                const fileNameDiv = document.getElementById('fileName');
                if (input.files && input.files[0]) {
                    fileNameDiv.textContent = 'File: ' + input.files[0].name;
                    fileNameDiv.classList.remove('hidden');
                } else {
                    fileNameDiv.classList.add('hidden');
                }
            }

            // Modal Functions
            function openEditModal() {
                document.getElementById('editModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                document.body.style.overflow = 'auto';
                document.getElementById('fileName').classList.add('hidden');
            }

            // Export to CSV function - Menggunakan data mentah dari route baru
            // Export to CSV function - PERBAIKAN LENGKAP
            function exportToCSV() {
                $.ajax({
                    url: "{{ route('pencatatan.index') }}",
                    type: 'GET',
                    data: {
                        draw: 1,
                        start: 0,
                        length: -1
                    },
                    success: function(response) {
                        const data = response.data;
                        const csvData = [];

                        // ===== HEADER CSV =====
                        csvData.push([
                            'No',
                            'Kode Usaha',
                            'Nama Usaha',
                            'Nama Usaha Baru',
                            'Kode Kecamatan',
                            'Kecamatan',
                            'Kode Desa',
                            'Desa',
                            'Status Usaha',
                            'Alamat',
                            'RT',
                            'RW',
                            'Latitude',
                            'Longitude',
                            'Link Foto',
                            'Petugas',
                            'Tanggal'
                        ]);

                        // ===== HELPER =====
                        function clean(value) {
                            if (!value) return '';

                            let str = String(value);

                            // 1. Hapus HTML tag
                            str = str.replace(/<[^>]*>/g, '');

                            // 2. Decode HTML entities (&lt; &gt; &amp; dll)
                            const txt = document.createElement('textarea');
                            txt.innerHTML = str;
                            str = txt.value;

                            return str.trim();
                        }

                        function statusText(val) {
                            return {
                                tidak_ditemukan: 'Tidak Ditemukan',
                                ditemukan: 'Ditemukan',
                                tutup: 'Tutup',
                                ganda: 'Ganda'
                            } [val] || '';
                        }



                        // ===== DATA ROWS =====
                        data.forEach((row, index) => {
                            let photoLink = '';

                            if (row.photo_path) {
                                let path = row.photo_path;

                                // extract href jika HTML
                                if (path.includes('href=')) {
                                    const match = path.match(/href="([^"]+)"/);
                                    if (match) path = match[1];
                                }

                                path = path.replace(/<[^>]*>/g, '').trim();

                                if (path) {
                                    photoLink = path.startsWith('http') ?
                                        path :
                                        window.location.origin + (path.startsWith('/') ? path :
                                            '/storage/' + path);
                                }
                            }

                            csvData.push([
                                index + 1,
                                clean(row.kode_nama_usaha),
                                clean(row.nama_usaha_text),
                                clean(row.nama_usaha_hasil),
                                clean(row.kode_kecamatan),
                                clean(row.nama_kecamatan),
                                clean(row.kode_desa),
                                clean(row.nama_desa),
                                statusText(row.status_usaha),
                                clean(row.alamat),
                                clean(row.rt),
                                clean(row.rw),
                                clean(row.latitude),
                                clean(row.longitude),
                                photoLink,
                                clean(row.nama_petugas),
                                // new Date(row.created_at).toLocaleDateString('id-ID', {
                                //     day: '2-digit',
                                //     month: 'short',
                                //     year: 'numeric'
                                // })
                                (() => {
                                    const d = new Date(row.created_at);

                                    const tanggal = d.toLocaleDateString('id-ID', {
                                        day: '2-digit',
                                        month: '2-digit',
                                        year: 'numeric'
                                    });

                                    const jam = d.toLocaleTimeString('id-ID', {
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        second: '2-digit'
                                    });

                                    return `${tanggal} ${jam}`;
                                })()

                            ]);
                        });

                        // ===== EXPORT =====
                        const csv = Papa.unparse(csvData);
                        const blob = new Blob([csv], {
                            type: 'text/csv;charset=utf-8;'
                        });
                        const link = document.createElement("a");

                        link.href = URL.createObjectURL(blob);
                        link.download = "pencatatan_usaha_lengkap_" + new Date().toISOString().slice(0, 10) +
                            ".csv";
                        link.style.visibility = 'hidden';

                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'CSV berhasil diexport lengkap',
                            timer: 2000,
                            showConfirmButton: false,
                            toast: true,
                            position: 'top-end',
                            width: 300
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal mengexport CSV',
                            toast: true,
                            position: 'top-end',
                            width: 300
                        });
                    }
                });
            }

            // Initialize DataTable - AUTO WIDTH ENABLED
            $(document).ready(function() {

                // load dashboard
                loadDashboardStats();

                // load tabulasi data
                loadTabulasiData();
                
                // init datatables all data
                var table = $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('pencatatan.index') }}",
                        dataSrc: function(json) {
                            $('#totalRecords').text(json.recordsTotal);
                            return json.data;
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'kode_nama_usaha',
                            name: 'kode_nama_usaha',
                            className: 'font-medium',
                            render: $.fn.dataTable.render.text() // 🔥 INI KUNCINYA
                        },
                        {
                            data: 'nama_usaha',
                            name: 'pencatatan_usaha.nama_usaha_hasil',
                            className: 'font-medium',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'nama_usaha_hasil',
                            name: 'pencatatan_usaha.nama_usaha_hasil',
                            className: 'font-medium',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'kode_kecamatan',
                            name: 'nama_usaha.kode_kecamatan',
                            className: 'text-center',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },

                        {
                            data: 'nama_kecamatan',
                            name: 'kecamatan.nama_kecamatan',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'kode_desa',
                            name: 'nama_usaha.kode_desa',
                            className: 'text-center',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'nama_desa',
                            name: 'desa.nama_desa',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'status_usaha',
                            name: 'status_usaha',
                            className: 'text-center',
                            render: function(data) {
                                const statusMap = {
                                    'tidak_ditemukan': '<span class="status-badge status-tidak_ditemukan">Tidak Ditemukan</span>',
                                    'ditemukan': '<span class="status-badge status-ditemukan">Ditemukan</span>',
                                    'tutup': '<span class="status-badge status-tutup">Tutup</span>',
                                    'ganda': '<span class="status-badge status-ganda">Ganda</span>'
                                };
                                return statusMap[data] || data;
                            }
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'rt',
                            name: 'rt',
                            className: 'text-center'
                        },
                        {
                            data: 'rw',
                            name: 'rw',
                            className: 'text-center'
                        },
                        {
                            data: 'latitude',
                            name: 'latitude',
                            className: 'text-center',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'longitude',
                            name: 'longitude',
                            className: 'text-center',
                            render: function(data) {
                                return data || '<span class="text-gray-400">-</span>';
                            }
                        },
                        {
                            data: 'photo_path',
                            name: 'photo_path',
                            orderable: false,
                            className: 'text-center',
                            render: function(data, type, row) {

                                // 🔒 AMAN TOTAL: cek null, '-', dan HTML span
                                if (
                                    !data ||
                                    data === '-' ||
                                    data.includes('<span') ||
                                    data.trim() === ''
                                ) {
                                    return '<span class="text-gray-400">-</span>';
                                }

                                let photoUrl = data;

                                // Jika HTML <a>, extract href
                                if (typeof data === 'string' && data.includes('href=')) {
                                    const match = data.match(/href="([^"]+)"/);
                                    if (match) {
                                        photoUrl = match[1];
                                    }
                                }

                                // Normalisasi path
                                if (!photoUrl.startsWith('http') && !photoUrl.startsWith('/')) {
                                    photoUrl = '/storage/' + photoUrl;
                                }

                                return `
                                    <a href="${photoUrl}" target="_blank"
                                    class="inline-flex items-center space-x-1 bg-white border border-gray-300 rounded px-2 py-1 hover:bg-gray-50 text-xs">
                                        <i class="fas fa-eye text-blue-600"></i>
                                        <span class="text-blue-600">Lihat</span>
                                    </a>
                                `;
                            }
                        },

                        {
                            data: 'nama_petugas',
                            name: 'nama_petugas',
                            className: 'font-medium'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            className: 'text-center',
                            render: function(data) {
                                if (!data) return '-';

                                const date = new Date(data);

                                const tanggal = date.toLocaleDateString('id-ID', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric'
                                });

                                const jam = date.toLocaleTimeString('id-ID', {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    second: '2-digit'
                                });

                                return `
                                    <div class="text-xs leading-tight text-center">
                                        <div>${tanggal}</div>
                                        <div class="text-gray-500">Pukul ${jam} WIB</div>
                                    </div>
                                `;
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            className: 'text-center',
                            render: function(data, type, row) {
                                return `
                            <div class="flex justify-center space-x-1">
                                <button class="edit-btn bg-blue-100 text-blue-700 hover:bg-blue-200 rounded p-1" data-id="${row.id}" title="Edit">
                                    <i class="fas fa-edit text-xs"></i>
                                </button>
                                <button class="delete-btn bg-red-100 text-red-700 hover:bg-red-200 rounded p-1" data-id="${row.id}" title="Hapus">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        `;
                            }
                        }
                    ],
                    order: [
                        [12, 'desc']
                    ],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "→",
                            previous: "←"
                        }
                    },
                    dom: '<"flex justify-between items-center p-2"<"text-xs"l><"text-xs"f>>rt<"flex justify-between items-center p-2"<"text-xs text-gray-600"i><"text-xs"p>>',
                    pageLength: 25,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Semua"]
                    ],
                    responsive: true,
                    scrollX: false,
                    autoWidth: true, // INI YANG PENTING: Biarkan kolom menyesuaikan lebar data
                    drawCallback: function(settings) {
                        $('#totalRecords').text(settings.json ? settings.json.recordsTotal : 0);
                    },
                    initComplete: function() {
                        $('.dataTables_filter input').addClass(
                            'px-2 py-1 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary'
                        );
                        $('.dataTables_length select').addClass(
                            'px-2 py-1 text-xs border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary'
                        );
                    }
                });

                // Handle edit button click - FIXED PHOTO PATH BUG
                $(document).on('click', '.edit-btn', function() {
                    var id = $(this).data('id');

                    $.ajax({
                        url: "{{ route('pencatatan.edit', ':id') }}".replace(':id', id),
                        type: 'GET',
                        success: function(response) {
                            $('#edit_id').val(response.id);
                            $('#edit_kode_nama_usaha').val(response.kode_nama_usaha);
                            $('#edit_status_usaha').val(response.status_usaha);
                            $('#edit_alamat').val(response.alamat);
                            $('#edit_rt').val(response.rt);
                            $('#edit_rw').val(response.rw);
                            $('#edit_latitude').val(response.latitude);
                            $('#edit_longitude').val(response.longitude);
                            $('#edit_nama_petugas').val(response.nama_petugas);

                            // Display current photo if exists - FIXED BUG
                            if (response.photo_path) {
                                // PERBAIKAN: Gunakan logika yang sama dengan tabel
                                var photoUrl = response.photo_path.startsWith('http') ? response
                                    .photo_path :
                                    (response.photo_path.startsWith('/') ? response.photo_path :
                                        '/storage/' + response.photo_path);

                                $('#current_photo').html(`
                            <a href="${photoUrl}" target="_blank" 
                                class="inline-flex items-center space-x-1 bg-white border border-gray-300 rounded px-2 py-1 hover:bg-gray-50 text-xs">
                                <i class="fas fa-eye text-blue-600"></i>
                                <span class="text-blue-600">Lihat Foto</span>
                            </a>
                        `);
                                $('#current_photo_container').removeClass('hidden');
                            } else {
                                $('#current_photo').html(
                                    '<span class="text-gray-500 text-xs">Tidak ada foto</span>');
                                $('#current_photo_container').addClass('hidden');
                            }

                            openEditModal();
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal memuat data',
                                toast: true,
                                position: 'top-end',
                                width: 300
                            });
                        }
                    });
                });

                // Handle edit form submission
                $('#editForm').submit(function(e) {
                    e.preventDefault();

                    var id = $('#edit_id').val();
                    var formData = new FormData(this);

                    $.ajax({
                        url: "{{ route('pencatatan.update', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-HTTP-Method-Override': 'PUT'
                        },
                        success: function(response) {
                            closeEditModal();
                            table.ajax.reload();

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.success,
                                timer: 1500,
                                showConfirmButton: false,
                                toast: true,
                                position: 'top-end',
                                width: 300
                            });
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';

                            $.each(errors, function(key, value) {
                                errorMessage += value[0] + '\n';
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: errorMessage,
                                toast: true,
                                position: 'top-end',
                                width: 300
                            });
                        }
                    });
                });

                // Handle delete button click
                $(document).on('click', '.delete-btn', function() {
                    var id = $(this).data('id');

                    Swal.fire({
                        title: 'Hapus Data?',
                        text: "Data akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#f79039',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        width: 300
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('pencatatan.destroy', ':id') }}".replace(':id',
                                    id),
                                type: 'DELETE',
                                data: {
                                    '_token': "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    if (response.success) {
                                        table.ajax.reload();

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: response.message,
                                            timer: 1500,
                                            showConfirmButton: false,
                                            toast: true,
                                            position: 'top-end',
                                            width: 300
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: response.message,
                                            toast: true,
                                            position: 'top-end',
                                            width: 300
                                        });
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat menghapus data',
                                        toast: true,
                                        position: 'top-end',
                                        width: 300
                                    });
                                }
                            });
                        }
                    });


                });

                // Close modal when clicking outside
                window.onclick = function(event) {
                    var editModal = document.getElementById('editModal');
                    if (event.target == editModal) {
                        closeEditModal();
                    }
                }

                // ===============================
                // LOAD KECAMATAN
                // ===============================
                $.get('/api/kecamatan', function(data) {
                    $('#filter_kecamatan').html('<option value="">Semua Kecamatan</option>');
                    data.forEach(item => {
                        $('#filter_kecamatan').append(
                            `<option value="${item.kode_kecamatan}">${item.nama_kecamatan}</option>`
                        );
                    });
                });


                // ===============================
                // CHANGE KECAMATAN
                // ===============================
                $('#filter_kecamatan').on('change', function() {
                    filterWilayah.kode_kecamatan = $(this).val();
                    filterWilayah.kode_desa = '';

                    $('#filter_desa').html('<option value="">Semua Desa</option>');

                    if (filterWilayah.kode_kecamatan) {
                        $.get('/api/desa/' + filterWilayah.kode_kecamatan, function(data) {
                            data.forEach(item => {
                                $('#filter_desa').append(
                                    `<option value="${item.kode_desa}">${item.nama_desa}</option>`
                                );
                            });
                        });
                    }

                    table.ajax.reload(); // ✅ AMAN
                    loadDashboardStats(); // 🔥 update angka dashboard
                });


                // ===============================
                // CHANGE DESA
                // ===============================
                $('#filter_desa').on('change', function() {
                    filterWilayah.kode_desa = $(this).val();

                    table.ajax.reload();
                    loadDashboardStats();
                });
            });

            function updateProgressBars(checked, unchecked, percentage) {
                const checkedBar = document.getElementById('checked_bar');
                const uncheckedBar = document.getElementById('unchecked_bar');
                const percentageBar = document.getElementById('percentage_bar');

                const total = checked + unchecked;
                const checkedPercent = total > 0 ? (checked / total) * 100 : 0;
                const uncheckedPercent = total > 0 ? (unchecked / total) * 100 : 0;

                // Update progress bars dengan animasi
                if (checkedBar) checkedBar.style.width = `${checkedPercent}%`;
                if (uncheckedBar) uncheckedBar.style.width = `${uncheckedPercent}%`;
                if (percentageBar) percentageBar.style.width = `${percentage}%`;
            }

            // Reset filter function untuk tombol reset di dashboard
            function resetFilter() {
                filterWilayah = {
                    kode_kecamatan: '',
                    kode_desa: '',
                    kode_nama_usaha: ''
                };

                $('#filter_kecamatan').val('');
                $('#filter_desa').html('<option value="">Semua Desa</option>');

                // Reload table dan dashboard
                if (typeof table !== 'undefined') {
                    table.ajax.reload();
                }
                loadDashboardStats();

                // Show notification
                Swal.fire({
                    icon: 'success',
                    title: 'Filter Direset!',
                    text: 'Semua filter telah direset',
                    toast: true,
                    position: 'top-end',
                    timer: 2000,
                    showConfirmButton: false,
                    width: 300
                });
            }

            // Enhanced dashboard stats dengan progress bars
            function loadDashboardStats() {
                $.get('/dashboard/groundcheck', {
                    kode_kecamatan: filterWilayah.kode_kecamatan,
                    kode_desa: filterWilayah.kode_desa
                }, function(res) {
                    const total = res.total || 0;
                    const checked = res.checked || 0;
                    const unchecked = res.unchecked || 0;
                    const percentage = res.percentage || 0;

                    // Format angka dengan pemisah ribuan
                    const formatNumber = (num) => num.toLocaleString('id-ID');

                    // Update main stats dengan animasi
                    $('#total_data').text(formatNumber(total));
                    $('#checked_data').text(formatNumber(checked));
                    $('#unchecked_data').text(formatNumber(unchecked));
                    $('#percentage_data').text(percentage + '%');

                    // Update progress bars
                    updateProgressBars(checked, unchecked, percentage);
                }).fail(function() {
                    console.error('Gagal memuat statistik dashboard');
                });
            }


            function loadTabulasiData() {
                fetch('/dashboard/rekap-kecamatan')
                    .then(r => {
                        if (!r.ok) {
                            throw new Error(`HTTP error! status: ${r.status}`);
                        }
                        return r.json();
                    })
                    .then(data => {
                        console.log('Data tabulasi:', data); // Debug: cek apakah data diterima

                        const tbody = document.querySelector('#tbl-kecamatan tbody');
                        if (!tbody) {
                            console.error('TBody tidak ditemukan!');
                            return;
                        }

                        tbody.innerHTML = ''; // Clear existing data

                        if (!data || data.length === 0) {
                            tbody.innerHTML = `
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            <i class="fas fa-database text-2xl mb-2 block"></i>
                            Tidak ada data yang tersedia
                        </td>
                    </tr>
                `;
                            return;
                        }

                        data.forEach((row, index) => {
                            let persen = row.total > 0 ?
                                ((row.checked / row.total) * 100).toFixed(1) :
                                0;

                            // Determine percentage color
                            let percentageClass = 'text-gray-700';
                            if (persen >= 80) percentageClass = 'percentage-high';
                            else if (persen >= 50) percentageClass = 'percentage-medium';
                            else percentageClass = 'percentage-low';

                            // Determine row highlight
                            let rowClass = '';
                            if (persen >= 80) rowClass = 'row-highlight';

                            // GANTI bagian HTML generation untuk tabel kecamatan:
                            tbody.insertAdjacentHTML('beforeend', `
    <tr data-kec="${row.kode_kecamatan}" class="${rowClass} hover:bg-gray-50 transition-colors">
        <td class="px-4 py-3">
            <div class="toggle cursor-pointer w-6 h-6 flex items-center justify-center mx-auto rounded-md bg-gray-100 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-plus text-xs"></i>
            </div>
        </td>
        <td class="px-4 py-3 font-medium text-gray-800">${row.nama_kecamatan || '-'}</td>
        <td class="px-4 py-3 text-center font-semibold">${(row.total || 0).toLocaleString('id-ID')}</td>
        <td class="px-4 py-3 text-center font-semibold text-green-700">${(row.checked || 0).toLocaleString('id-ID')}</td>
        <td class="px-4 py-3 text-center font-bold ${percentageClass}">${persen}%</td>
        <td class="px-4 py-3 text-center text-blue-700">${(row.ditemukan || 0).toLocaleString('id-ID')}</td>
        <td class="px-4 py-3 text-center text-red-700">${(row.tidak_ditemukan || 0).toLocaleString('id-ID')}</td>
        <td class="px-4 py-3 text-center text-yellow-700">${(row.tutup || 0).toLocaleString('id-ID')}</td>
        <td class="px-4 py-3 text-center text-purple-700">${(row.ganda || 0).toLocaleString('id-ID')}</td>
    </tr>
    <tr class="detail-row hidden" id="detail-${row.kode_kecamatan}">
        <td colspan="9" class="px-4 py-4">
            <div class="flex items-center mb-3">
                <div class="p-2 rounded-lg mr-2" style="background-color: rgba(247, 144, 57, 0.1)">
                    <i class="fas fa-map-marker-alt text-sm" style="color: #f79039"></i>
                </div>
                <h4 class="text-sm font-semibold text-gray-800">Detail per Desa: ${row.nama_kecamatan || '-'}</h4>
            </div>
            <div class="pl-10">
                <div class="text-gray-400 text-sm">
                    <i class="fas fa-spinner fa-spin mr-2"></i>
                    Memuat data desa...
                </div>
            </div>
        </td>
    </tr>
`);
                        });

                        // Initialize event listeners setelah data dimuat
                        initTabulasiEvents();
                    })
                    .catch(error => {
                        console.error('Error loading tabulasi data:', error);
                        const tbody = document.querySelector('#tbl-kecamatan tbody');
                        if (tbody) {
                            tbody.innerHTML = `
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-red-500">
                            <i class="fas fa-exclamation-triangle text-2xl mb-2 block"></i>
                            Gagal memuat data. Silakan refresh halaman.
                            <p class="text-xs text-gray-500 mt-2">${error.message}</p>
                        </td>
                    </tr>
                `;
                        }
                    });
            }

            function initTabulasiEvents() {
                // Event delegation untuk toggle
                document.querySelector('#tbl-kecamatan').addEventListener('click', function(e) {
                    const toggleDiv = e.target.closest('.toggle');
                    if (!toggleDiv) return;

                    const icon = toggleDiv.querySelector('i');
                    const tr = toggleDiv.closest('tr');
                    const kode = tr.dataset.kec;
                    const detail = document.getElementById(`detail-${kode}`);

                    if (!detail) return;

                    // Toggle icon dan visibility
                    if (detail.classList.contains('hidden')) {
                        icon.className = 'fas fa-minus text-xs';
                        detail.classList.remove('hidden');

                        // Load data jika belum dimuat
                        if (!detail.dataset.loaded) {
                            loadDesaData(kode, detail);
                        }
                    } else {
                        icon.className = 'fas fa-plus text-xs';
                        detail.classList.add('hidden');
                    }
                });
            }

            function loadDesaData(kodeKecamatan, detailElement) {
                const loadingDiv = detailElement.querySelector('.pl-10');

                fetch(`/dashboard/rekap-desa?kode_kecamatan=${kodeKecamatan}`)
                    .then(r => {
                        if (!r.ok) throw new Error(`HTTP error! status: ${r.status}`);
                        return r.json();
                    })
                    .then(rows => {
                        if (!rows || rows.length === 0) {
                            loadingDiv.innerHTML = `
                    <div class="text-gray-500 text-sm">
                        <i class="fas fa-info-circle mr-2"></i>
                        Tidak ada data desa untuk kecamatan ini
                    </div>
                `;
                            return;
                        }

                        let html = `
                <div class="overflow-x-auto rounded-lg border border-gray-100 shadow-sm">
                    <table class="w-full text-xs">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left font-medium text-gray-700">Desa/Kelurahan</th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">Total</th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">GC</th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">%</th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">
                                    <i class="fas fa-check text-blue-600 mr-1"></i>Ditemukan
                                </th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">
                                    <i class="fas fa-times text-red-600 mr-1"></i>Tdk
                                </th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">
                                    <i class="fas fa-door-closed text-yellow-600 mr-1"></i>Tutup
                                </th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">
                                    <i class="fas fa-copy text-purple-600 mr-1"></i>Ganda
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
            `;

                        rows.forEach(d => {
                            let p = d.total > 0 ? ((d.checked / d.total) * 100).toFixed(1) : 0;
                            let progressColor = p >= 80 ? 'text-green-600' :
                                p >= 50 ? 'text-yellow-600' : 'text-red-600';

                            let progressBarColor = p >= 80 ? 'bg-green-500' :
                                p >= 50 ? 'bg-yellow-500' : 'bg-red-500';

                            html += `
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">${d.nama_desa || '-'}</td>
                        <td class="px-4 py-2 text-center">${(d.total || 0).toLocaleString('id-ID')}</td>
                        <td class="px-4 py-2 text-center font-semibold text-green-700">${(d.checked || 0).toLocaleString('id-ID')}</td>
                        <td class="px-4 py-2 text-center font-bold ${progressColor}">${p}%</td>
                        <td class="px-4 py-2 text-center text-blue-700">${(d.ditemukan || 0).toLocaleString('id-ID')}</td>
                        <td class="px-4 py-2 text-center text-red-700">${(d.tidak_ditemukan || 0).toLocaleString('id-ID')}</td>
                        <td class="px-4 py-2 text-center text-yellow-700">${(d.tutup || 0).toLocaleString('id-ID')}</td>
                        <td class="px-4 py-2 text-center text-purple-700">${(d.ganda || 0).toLocaleString('id-ID')}</td>
                    </tr>
                `;
                        });

                        html += `</tbody></table></div>`;
                        loadingDiv.innerHTML = html;
                        detailElement.dataset.loaded = true;
                    })
                    .catch(error => {
                        console.error('Error loading desa data:', error);
                        loadingDiv.innerHTML = `
                <div class="text-red-500 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    Gagal memuat data desa
                </div>
            `;
                    });
            }
        </script>
    @endpush
@endsection
