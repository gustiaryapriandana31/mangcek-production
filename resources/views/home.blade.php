    @extends('layouts.app')

    @section('title', 'MANGCEK - Mitra Bantu Ground CEK')

    @section('content')

        {{-- alert --}}
        @if (session('success'))
            <div id="successModal"
                class="fixed inset-0 flex items-center justify-center z-50 pointer-events-none opacity-0 transition-opacity duration-300">
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black bg-opacity-30 pointer-events-auto"></div>

                <!-- Modal Card -->
                <div
                    class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 z-50 pointer-events-auto transform translate-y-4 transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-green-700">Sukses!</h3>
                        <button id="closeModal" class="text-gray-500 font-bold">&times;</button>
                    </div>
                    <p class="text-gray-700">{{ session('success') }}</p>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const modal = document.getElementById('successModal');
                    const modalCard = modal.querySelector('div.bg-white');
                    const closeBtn = document.getElementById('closeModal');

                    // Fade in
                    requestAnimationFrame(() => {
                        modal.classList.remove('opacity-0');
                        modalCard.classList.remove('translate-y-4');
                    });

                    // Auto fade out after 4 detik
                    setTimeout(() => {
                        modal.classList.add('opacity-0');
                        modalCard.classList.add('translate-y-4');
                        modalCard.addEventListener('transitionend', () => modal.remove());
                    }, 4000);

                    // Close manual
                    closeBtn.addEventListener('click', () => {
                        modal.classList.add('opacity-0');
                        modalCard.classList.add('translate-y-4');
                        modalCard.addEventListener('transitionend', () => modal.remove());
                    });
                });
            </script>
        @endif


        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 px-4 pb-2">
            <div
                class="bg-gradient-to-r from-gray-50 to-white shadow-md rounded-b-lg mb-6 py-2 px-4 border-b border-gray-200">
                <div class="flex items-center justify-between max-w-6xl mx-auto">
                    <!-- Logo Kiri -->
                    <div class="flex items-center space-x-2 flex-shrink-0">
                        <div class="bg-white p-1 rounded-lg shadow-sm border border-gray-200">
                            <img src="{{ asset('images/logo-bps.svg') }}" alt="Logo BPS" class="w-8 h-8 object-contain">
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
                            <img src="{{ asset('images/logo-se2026.png') }}" alt="Logo SE2026"
                                class="w-8 h-8 object-contain">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Utama -->
            <form id="mangcekForm" action="{{ route('pencatatan.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4 max-w-md mx-auto pb-6">
                @csrf

                <!-- Data Hasil SBR 2025 Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                    <div class="bg-primary text-white px-4 py-3">
                        <h2 class="font-bold text-sm">Data Hasil SBR 2025</h2>
                    </div>
                    <div class="p-4 space-y-4">
                        <!-- Input Kecamatan -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">
                                Kecamatan <span class="text-red-500">*</span>
                            </label>
                            <select
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white"
                                id="kecamatan" required>
                                <option value="" selected disabled class="text-gray-400">Pilih Kecamatan</option>
                            </select>
                        </div>

                        <!-- Input Desa/Kelurahan -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">
                                Desa/Kelurahan <span class="text-red-500">*</span>
                            </label>
                            <select
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white"
                                id="desa" name="kode_desa" required>
                                <option value="" selected disabled class="text-gray-400">Pilih Desa/Kelurahan</option>
                            </select>
                        </div>

                        <!-- Input Nama Usaha -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">
                                Nama Usaha <span class="text-red-500">*</span>
                            </label>
                            <select id="usahaSelect" name="kode_nama_usaha"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white"
                                required>
                            </select>
                        </div>


                        <!-- Input Alamat -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Alamat Usaha</label>
                            <textarea
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-gray-50"
                                id="alamatUsaha" rows="2" readonly>{{ $data->alamat ?? '' }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Alamat otomatis terisi</p>
                        </div>

                        <!-- Koordinat -->
                        <div class="mt-3">
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Koordinat</label>

                            <div class="flex border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                                <!-- Latitude -->
                                <div class="flex-1 border-r border-gray-200">
                                    <div class="px-3 py-2">
                                        <p class="text-xs text-gray-500 mb-1">Latitude</p>
                                        <p id="latitude_database" class="text-sm">
                                            {{ $data->latitude ?? 'Tidak tersedia' }}</p>
                                    </div>
                                </div>

                                <!-- Longitude -->
                                <div class="flex-1">
                                    <div class="px-3 py-2">
                                        <p class="text-xs text-gray-500 mb-1">Longitude</p>
                                        <p id="longitude_database" class="text-sm">
                                            {{ $data->longitude ?? 'Tidak tersedia' }}</p>
                                    </div>
                                </div>
                            </div>

                            <p class="text-xs text-gray-500 mt-2">Koordinat otomatis dari sistem</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">
                                Hasil Profiling SBR25</span>
                            </label>
                            <input type="text"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                id="profiling_sbr25" readonly>
                            <p class="text-xs text-gray-500 mt-1">Profiling otomatis terisi</p>
                        </div>
                    </div>
                </div>

                <!-- Hasil Cek Lapangan Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                    <div class="bg-primary text-white px-4 py-3">
                        <h2 class="font-bold text-sm">Hasil Ground Check</h2>
                    </div>
                    <div class="p-4 space-y-4">


                        <!-- Keberadaan Usaha -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">
                                Keberadaan Usaha <span class="text-red-500">*</span>
                            </label>
                            <select id="keberadaan" name="status_usaha"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white"
                                required>
                                <option value="">Pilih Status</option>
                                <option value="ditemukan">Ditemukan</option>
                                <option value="tidak_ditemukan">Tidak Ditemukan</option>
                                <option value="tutup">Tutup</option>
                                <option value="ganda">Ganda</option>
                            </select>
                        </div>

                        <div id="field-fisik" class="space-y-4">
                            <!-- Nama Usaha (Hasil Cek) -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">
                                    Nama Usaha (Hasil Cek)
                                </label>

                                <input type="text" id="namaUsahaHasil" name="nama_usaha_hasil"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                                    readonly>

                                <!-- Radio -->
                                <div class="flex gap-4 mt-2 text-sm">
                                    <label class="flex items-center gap-1">
                                        <input type="radio" name="nama_usaha_sesuai" value="1" checked>
                                        <span>Sesuai</span>
                                    </label>

                                    <label class="flex items-center gap-1">
                                        <input type="radio" name="nama_usaha_sesuai" value="0">
                                        <span>Tidak sesuai</span>
                                    </label>
                                </div>

                                <p class="text-xs text-gray-500 mt-1">
                                    Jika tidak sesuai, silakan perbaiki nama usaha
                                </p>
                            </div>

                            <!-- Input Alamat Baru -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">Alamat (Hasil Cek) <span
                                        class="text-red-500">*</span></label>
                                <textarea
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white"
                                    id="alamatBaru" name="alamat" rows="2" placeholder="Masukkan alamat sesuai hasil cek lapangan"
                                    data-required></textarea>
                            </div>

                            <!-- RT dan RW -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1">RW/Dusun <span
                                            class="text-red-500">*</span></label>
                                    <input type="text"
                                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                        id="rw" name="rw" placeholder="Contoh: 001, Dusun 01" data-required>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-1">RT <span
                                            class="text-red-500">*</span></label>
                                    <input type="text"
                                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                        id="rt" name="rt" placeholder="Contoh: 002" data-required>
                                </div>
                            </div>

                            <!-- Input Foto -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">
                                    Foto Usaha
                                </label>

                                <!-- Input File Hidden -->
                                <input type="file" id="foto" name="photo" class="hidden" accept="image/*"
                                    capture="environment">

                                <!-- Tombol Kamera -->
                                <button type="button" onclick="document.getElementById('foto').click()"
                                    class="w-full py-3 border-2 border-dashed border-primary rounded-lg bg-orange-50 hover:bg-orange-100 transition-colors duration-200">
                                    <div class="flex items-center justify-center space-x-2">
                                        <i class="fas fa-camera text-primary"></i>
                                        <span class="text-sm font-medium text-primary">Ambil Foto dengan Kamera</span>
                                    </div>
                                </button>
                                <p class="text-xs text-gray-500 mt-1 text-center">Klik tombol di atas untuk membuka kamera
                                </p>

                                <!-- Preview Foto -->
                                <div class="mt-3 flex justify-center">
                                    <img id="previewFoto"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='150' viewBox='0 0 200 150'%3E%3Crect width='200' height='150' fill='%23f3f4f6'/%3E%3Ccircle cx='100' cy='60' r='20' fill='%23d1d5db'/%3E%3Crect x='70' y='90' width='60' height='40' rx='5' fill='%23d1d5db'/%3E%3Ctext x='100' y='140' font-family='Arial' font-size='12' text-anchor='middle' fill='%236b7280'%3EKamera%3C/text%3E%3C/svg%3E"
                                        alt="Preview Foto"
                                        class="rounded-lg border border-gray-300 max-w-full h-auto max-h-48 object-cover">
                                </div>
                            </div>

                            <!-- Koordinat -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1">
                                    Koordinat
                                </label>

                                <div class="space-y-2">
                                    <!-- Latitude -->
                                    <div class="flex gap-2">
                                        <input type="text"
                                            class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                            id="latitude" name="latitude" placeholder="Latitude">
                                        <button type="button" id="btnGetLocation"
                                            class="px-4 py-2 text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200 flex items-center space-x-1">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Ambil</span>
                                        </button>
                                    </div>

                                    <!-- Longitude -->
                                    <div class="flex gap-2">
                                        <input type="text"
                                            class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                            id="longitude" name="longitude" placeholder="Longitude">
                                        <button type="button" id="btnGetLocation2"
                                            class="px-4 py-2 text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200 flex items-center space-x-1">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Ambil</span>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Gunakan tombol "Ambil" untuk lokasi otomatis</p>

                                <p id="distanceInfo" class="text-xs text-gray-500 mt-1"></p>

                            </div>






                        </div>



                        <!-- Nama Petugas -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">
                                Nama Petugas <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                id="petugas" name="nama_petugas" placeholder="Masukkan nama petugas" required>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-3 mt-6">
                    <button type="reset"
                        class="flex-1 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 rounded-lg font-medium text-sm transition-colors duration-200 shadow-sm">
                        Reset Form
                    </button>
                    <button type="submit"
                        class="flex-1 py-3 bg-primary hover:bg-primary-dark text-white rounded-lg font-medium text-sm transition-colors duration-200">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

        <!-- Notification Alert Container -->
        <div id="alertContainer" class="fixed top-4 right-4 z-50 max-w-sm w-full"></div>



    @endsection
    @push('scripts')
        <script>
            $(function() {

                /* =========================
                   ELEMENT
                ========================== */
                const form = document.getElementById('mangcekForm');

                const kecamatanSelect = document.getElementById('kecamatan');
                const desaSelect = document.getElementById('desa');

                const alamatUsaha = document.getElementById('alamatUsaha');
                const profilingSbr25 = document.getElementById('profiling_sbr25');
                const latitudeDatabase = document.getElementById('latitude_database');
                const longitudeDatabase = document.getElementById('longitude_database');

                const fotoInput = document.getElementById('foto');
                const previewFoto = document.getElementById('previewFoto');

                const btnLat = document.getElementById('btnGetLocation');
                const btnLng = document.getElementById('btnGetLocation2');

                /* =========================
                   HELPER FETCH JSON
                ========================== */
                function fetchJson(url) {
                    return fetch(url, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    }).then(res => {
                        if (!res.ok) throw new Error(res.status);
                        return res.json();
                    });
                }

                /* =========================
                   FETCH KECAMATAN
                ========================== */
                fetchJson('/api/kecamatan')
                    .then(data => {
                        data.forEach(kec => {
                            kecamatanSelect.insertAdjacentHTML('beforeend', `
                    <option value="${kec.kode_kecamatan}">
                        ${kec.nama_kecamatan}
                    </option>
                `);
                        });
                    })
                    .catch(err => console.error('Gagal load kecamatan', err));

                /* =========================
                   FETCH DESA
                ========================== */
                kecamatanSelect.addEventListener('change', function() {
                    desaSelect.innerHTML = '<option value="">Pilih Desa</option>';

                    fetchJson(`/api/desa/${this.value}`)
                        .then(data => {
                            data.forEach(d => {
                                desaSelect.insertAdjacentHTML('beforeend', `
                        <option value="${d.kode_desa}">
                            ${d.nama_desa}
                        </option>
                    `);
                            });
                        });

                    resetUsaha();
                });

                /* =========================
                   SELECT2 USAHA (INFINITE)
                ========================== */
                const usahaSelect = $('#usahaSelect').select2({
                    placeholder: 'Pilih / Cari Nama Usaha',
                    allowClear: true,
                    width: '100%',
                    minimumInputLength: 0,
                    ajax: {
                        delay: 300,
                        url: function() {
                            const desa = $('#desa').val();
                            return desa ? `/api/usaha/by-desa/${desa}` : null;
                        },
                        dataType: 'json',
                        data: function(params) {
                            return {
                                q: params.term || '',
                                page: params.page || 1
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.results,
                                pagination: {
                                    more: data.pagination.more
                                }
                            };
                        }
                    }
                });


                // default disable
                usahaSelect.prop('disabled', true);

                /* =========================
                   AKTIFKAN SAAT DESA DIPILIH
                ========================== */
                $('#desa').on('change', function() {
                    resetUsaha();
                    if (!this.value) return;

                    usahaSelect.prop('disabled', false);

                    setTimeout(() => {
                        usahaSelect.select2('open');
                    }, 200);

                });

                /* =========================
                   SAAT USAHA DIPILIH
                ========================== */
                $('#usahaSelect').on('select2:select', function(e) {

                    syncNamaUsahaReadonly();

                    const data = e.params.data; // ⬅️ AMBIL DATA SELECT2
                    const id = data.id;

                    // isi nama usaha hasil (dari select2 text)
                    $('#namaUsahaHasil').val(data.text);
                    syncNamaUsahaReadonly();


                    // default: SESUAI
                    $('input[name="nama_usaha_sesuai"][value="1"]').prop('checked', true);

                    // fetch detail SBR
                    fetchJson(`/api/usaha/detail/${id}`)
                        .then(u => {
                            alamatUsaha.value = u.alamat ?? '';
                            profilingSbr25.value = u.status_profiling_sbr ?? '';
                            latitudeDatabase.textContent = u.latitude ?? '';
                            longitudeDatabase.textContent = u.longitude ?? '';
                        })
                        .catch(err => {
                            console.error('Gagal load detail usaha', err);
                        });
                });


                $('input[name="nama_usaha_sesuai"]').on('change', syncNamaUsahaReadonly);



                function resetUsaha() {
                    usahaSelect.val(null).trigger('change');
                    usahaSelect.prop('disabled', true);
                    alamatUsaha.value = '';
                    profilingSbr25.value = '';
                    latitudeDatabase.textContent = '';
                    longitudeDatabase.textContent = '';
                }

                /* =========================
                   FOTO PREVIEW + COMPRESS
                ========================== */
                fotoInput.addEventListener('change', async function(e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    const compressed = await compressImage(file, 500);
                    const dt = new DataTransfer();
                    dt.items.add(compressed);
                    fotoInput.files = dt.files;
                    previewFoto.src = URL.createObjectURL(compressed);
                });

                /* =========================
                   GEOLOCATION
                ========================== */
                function getDistance(lat1, lon1, lat2, lon2) {
                    const R = 6371000;
                    const dLat = (lat2 - lat1) * Math.PI / 180;
                    const dLon = (lon2 - lon1) * Math.PI / 180;
                    const a =
                        Math.sin(dLat / 2) ** 2 +
                        Math.cos(lat1 * Math.PI / 180) *
                        Math.cos(lat2 * Math.PI / 180) *
                        Math.sin(dLon / 2) ** 2;
                    return R * (2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)));
                }

                function getCurrentLocation() {
                    navigator.geolocation.getCurrentPosition(pos => {
                        latitude.value = pos.coords.latitude.toFixed(6);
                        longitude.value = pos.coords.longitude.toFixed(6);

                        if (latitudeDatabase.textContent) {
                            const d = getDistance(
                                parseFloat(latitudeDatabase.textContent),
                                parseFloat(longitudeDatabase.textContent),
                                pos.coords.latitude,
                                pos.coords.longitude
                            );
                            document.getElementById('distanceInfo').textContent =
                                `Jarak ${d.toFixed(1)} meter dari database`;
                        }
                    });
                }

                btnLat.addEventListener('click', getCurrentLocation);
                btnLng.addEventListener('click', getCurrentLocation);

                /* =========================
                   SUBMIT VALIDATION
                ========================== */
                form.addEventListener('submit', function(e) {
                    if (!$('#usahaSelect').val()) {
                        e.preventDefault();
                        alert('Pilih Nama Usaha terlebih dahulu');
                    }
                });

            });

            /* =========================
               IMAGE COMPRESS
            ========================== */
            function compressImage(file, maxKB) {
                return new Promise(resolve => {
                    const img = new Image();
                    const reader = new FileReader();

                    reader.onload = e => img.src = e.target.result;

                    img.onload = () => {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        let w = img.width,
                            h = img.height;
                        if (w > 1280) {
                            h *= 1280 / w;
                            w = 1280;
                        }

                        canvas.width = w;
                        canvas.height = h;
                        ctx.drawImage(img, 0, 0, w, h);

                        let q = 0.7;
                        (function compress() {
                            canvas.toBlob(blob => {
                                if (blob.size / 1024 <= maxKB || q <= 0.4) {
                                    resolve(new File([blob], file.name, {
                                        type: 'image/jpeg'
                                    }));
                                } else {
                                    q -= 0.1;
                                    compress();
                                }
                            }, 'image/jpeg', q);
                        })();
                    };

                    reader.readAsDataURL(file);
                });
            }


            const statusSelect = document.getElementById('keberadaan');
            const fieldFisik = document.getElementById('field-fisik');
            const fieldInputs = fieldFisik.querySelectorAll(
                'input:not([name="nama_usaha_sesuai"]), textarea, button'
            );


            function toggleFieldFisik(status) {
                const isDitemukan = status === 'ditemukan';

                if (isDitemukan) {
                    fieldFisik.classList.remove('hidden');

                    fieldInputs.forEach(el => {
                        el.disabled = false;
                        if (el.hasAttribute('data-required')) {
                            el.setAttribute('required', 'required');
                        }
                    });

                    syncNamaUsahaReadonly();

                    const selectedData = $('#usahaSelect').select2('data');
                    if (selectedData.length > 0) {
                        $('#namaUsahaHasil').val(selectedData[0].text);

                    }

                } else {
                    fieldFisik.classList.add('hidden');

                    fieldInputs.forEach(el => {
                        el.disabled = true;
                        el.removeAttribute('required');

                        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                            el.value = '';
                        }
                    });
                }
            }

            statusSelect.addEventListener('change', function() {
                toggleFieldFisik(this.value);
            });

            // kondisi awal
            toggleFieldFisik(statusSelect.value);

            function syncNamaUsahaReadonly() {
                const sesuai = $('input[name="nama_usaha_sesuai"]:checked').val();

                if (sesuai === '0') {
                    $('#namaUsahaHasil')
                        .prop('readonly', false)
                        .removeClass('bg-gray-100')
                        .addClass('bg-white');
                } else {
                    $('#namaUsahaHasil')
                        .prop('readonly', true)
                        .addClass('bg-gray-100');
                }
            }
        </script>
    @endpush
