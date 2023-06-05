<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <title>Dashboard | Linked.Co</title>

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
                        <!-- Card Explan -->
                        <div class="card">
                            <h5 class="card-header">Penjelasan Singkat</h5>
                            <div class="card-body">
                                <p>Aplikasi ini adalah aplikasi sistem pendukung keputusan untuk menentukan karyawan
                                    teraktif dengan metode SAW (Simple Additive Weighting) yang mengharuskan untuk
                                    menginput data karyawan dulu kemudian baru data kriteria dan tahap akhir dengan
                                    melakukan perangkingan pada data rangking dan melihat laporan hasil akhir</p>
                            </div>
                        </div>
                        <!--/ Card Explan -->

                        <br />

                        <!-- Card Data -->
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title text-white"><i class='bx bx-group bx-lg'></i> Data
                                            Karyawan</h5>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-text text-end text-white">{{ $jumlahEmployees }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card bg-success text-white mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title text-white"><i class='bx bx-list-ul bx-lg'></i> Data
                                            Divisi</h5>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-text text-end text-white">{{ $jumlahDepartements }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card bg-warning text-white mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title text-white"><i class='bx bx-user bx-lg'></i> Data Pengguna
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-text text-end text-white">{{ $jumlahUsers }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Data -->

                        <!-- Table -->
                        <div class="card">
                            <h5 class="card-header px-3">Perangkingan 5 Teratas</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width=1%>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Divisi</th>
                                            <th class="text-center">Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rankings as $rank)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $rank->nama_karyawan }}</td>
                                                <td>{{ $rank->departement->nama_divisi }}</td>
                                                <td class="text-center" width=20%>{{ $rank->total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Table -->
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
