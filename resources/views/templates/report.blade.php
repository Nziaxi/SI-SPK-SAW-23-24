<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <title>Perangkingan | Linked.Co</title>

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
                        <!-- Card Data -->
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class='bx bx-group bx-lg'></i> Data
                                            Karyawan</h5>
                                    </div>
                                    <div class="card-body text-end">
                                        <a href="{{ route('karyawan.print') }}">
                                            <button type="button" class="btn btn-primary">Cetak</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class='bx bx-history bx-lg'></i> Data
                                            Riwayat Karyawan</h5>
                                    </div>
                                    <div class="card-body text-end">
                                        <div>
                                            <label class="form-label">Pilih Tahun:</label>
                                            <select name="yearFilter" id="yr" class="form-control btn-group"
                                                style="width: 20% " onchange="this.form.submit()">
                                                @foreach ($availableYears as $year)
                                                    <option value="{{ $year }}"
                                                        {{ $yearFilter == $year ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <a href=""
                                                onclick="this.href='/riwayat-penilaian/'+ document.getElementById('yr').value"
                                                class="ps-2">
                                                <button type="button" class="btn btn-primary">Cetak</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class='bx bx-user bx-lg'></i> Data Pengguna
                                        </h5>
                                    </div>
                                    <div class="card-body text-end">
                                        <a href="{{ route('pengguna.print') }}">
                                            <button type="button" class="btn btn-primary">Cetak</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class='bx bx-task bx-lg'></i> Data
                                            Penilaian</h5>
                                    </div>
                                    <div class="card-body text-end">
                                        <a href="{{ route('penilaian.print') }}">
                                            <button type="button" class="btn btn-primary">Cetak</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class='bx bx-bar-chart-alt-2 bx-lg'></i> Data
                                            Perangkingan</h5>
                                    </div>
                                    <div class="card-body text-end">
                                        <a href="{{ route('templates.perangkingan-print') }}">
                                            <button type="button" class="btn btn-primary">Cetak</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Data -->
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
                                </script>2023
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
