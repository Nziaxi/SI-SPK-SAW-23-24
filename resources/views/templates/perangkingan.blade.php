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
                        <!-- Table -->
                        <div class="card">
                            <h5 class="card-header">Matriks Keputusan</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th class="text-center" width=1%>No</th>
                                            <th width=25%>Nama Karyawan</th>
                                            @foreach ($weights as $weight)
                                                <th class="text-center" value="{{ $weight->criteria->nama_kriteria }}">
                                                    C{{ $loop->iteration }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uniqueScores as $US)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $US->employee->nama_karyawan }}</td>
                                                @foreach ($scres->where('employee_id', $US->employee_id) as $s)
                                                    <td class="text-center">{{ $s->subCriteria->nilai }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Table -->

                        <br>

                        <!-- Table -->
                        <div class="card">
                            <h5 class="card-header">Hasil Normalisasi</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th width=1%>No</th>
                                            <th width=25%>Nama Karyawan</th>
                                            @foreach ($weights as $weight)
                                                <th class="text-center" value="{{ $weight->criteria->nama_kriteria }}">
                                                    C{{ $loop->iteration }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uniqueScores as $US)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $US->employee->nama_karyawan }}</td>
                                                @php
                                                    $scr = $scores->where('ida', $US->employee_id)->all();
                                                @endphp
                                                @foreach ($scr as $s)
                                                    <td class="text-center">{{ $s->rating }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Table -->

                        <br>

                        <!-- Table -->
                        <div class="card">
                            <h5 class="card-header">Hasil Perangkingan</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th width=1%>No</th>
                                            <th width=25%>Nama Karyawan</th>
                                            @foreach ($weights as $weight)
                                                <th class="text-center" value="{{ $weight->criteria->nama_kriteria }}">
                                                    C{{ $loop->iteration }}
                                                </th>
                                            @endforeach
                                            <th class="text-center" width=10%>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rankings as $rank)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $rank->nama_karyawan }}</td>
                                                @php
                                                    $score = $cscores->where('ida', $rank->employee_id)->all();
                                                    $total = 0;
                                                @endphp
                                                @foreach ($score as $s)
                                                    @php
                                                        $total = $total + $s->rating;
                                                    @endphp
                                                    <td class="text-center">{{ $s->rating }}</td>
                                                @endforeach
                                                <td class="text-center">{{ $total }}</td>
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
