<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <title>Riwayat Pengguna | Linked.Co</title>

    @include('templates.partials.head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('templates.partials.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('templates.partials.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Form -->
                        <div class="col-xl">
                            <h4 class="fw-light">Entri Data Riwayat Karyawan</h4>
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <a href="{{ route('riwayat-penilaian.index') }}">
                                        <h6 class="mb-0">&lt Kembali</h6>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('riwayat-penilaian.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama Karyawan</label>
                                            <select name="employee_id" class="form-select">
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">
                                                        {{ $employee->nama_karyawan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @foreach ($weights as $weight)
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="criteria[{{ $weight->id }}]">{{ $weight->criteria->nama_kriteria }}
                                                    (C{{ $loop->iteration }})
                                                </label>
                                                <select class="form-control" id="criteria[{{ $weight->id }}]"
                                                    name="criteria[{{ $weight->id }}]">
                                                    <!--
                                                        @php
                                                            $resC = $subCriterias->where('criteria_id', $weight->id)->all();
                                                        @endphp
                                                        -->
                                                    @foreach ($resC as $sc)
                                                        <option value="{{ $sc->id }}"
                                                            name="subCriteria[{{ $weight->id }}]">
                                                            {{ $sc->keterangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <label class="form-label">Tahun</label>
                                            <input type="number" name="year" class="form-control" min="1900"
                                                max="{{ date('Y') }}" placeholder="Masukkan tahun"
                                                value="{{ date('Y') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- / Form -->
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by Nziaxi using <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('templates.partials.script')
</body>

</html>
