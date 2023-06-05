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
                        <!-- Table -->
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success mb-0" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('info'))
                                <div class="alert alert-info mb-0" role="alert">
                                    {{ session('info') }}
                                </div>
                            @elseif(session('danger'))
                                <div class="alert alert-danger mb-0" role="alert">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <span class="card-header d-flex justify-content-between align-items-center pb-0">
                                <h4>Data Riwayat Penilaian</h4>
                            </span>
                            <div class="table-responsive text-nowrap">
                                <div class="card-body py-1 mb-2">
                                    <a href="{{ route('riwayat-penilaian.create') }}">
                                        <button type="button" class="btn btn-primary ps-3"><i
                                                class='bx bx-plus align-text-top'></i> Tambah Data</button>
                                    </a>
                                </div>
                                <form action="{{ route('riwayat-penilaian.index') }}" method="GET">
                                    <div class="card-body py-1 mb-2" style="padding-right: 87%;">
                                        <label class="form-label">Filter Tahun:</label>
                                        <select name="yearFilter" class="form-control" onchange="this.form.submit()">
                                            @foreach ($availableYears as $year)
                                                <option value="{{ $year }}"
                                                    {{ $yearFilter == $year ? 'selected' : '' }}>{{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <table class="table table-hover mt-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="1%">No</th>
                                                <th>Nama Karyawan</th>
                                                @foreach ($weights as $weight)
                                                    <th>{{ $weight->criteria->nama_kriteria }}</th>
                                                @endforeach
                                                <th class="text-center">Tahun</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $item)
                                                @if ($index % 5 == 0)
                                                    <tr>
                                                        <td class="text-center">{{ $i++ }}</td>
                                                        <td>{{ $item->employee->nama_karyawan }}</td>
                                                        @foreach ($weights as $weight)
                                                            <td>
                                                                @php
                                                                    $criteriaValue = $data
                                                                        ->where('criteria_id', $weight->criteria_id)
                                                                        ->where('employee_id', $item->employee_id)
                                                                        ->first();
                                                                @endphp
                                                                @if ($criteriaValue && $criteriaValue->subCriteria)
                                                                    {{ $criteriaValue->subCriteria->keterangan }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        @endforeach
                                                        <td class="text-center">{{ $yearFilter }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown ps-3">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('riwayat-penilaian.edit', ['id' => $item->employee_id, 'year' => $yearFilter]) }}"><i
                                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                    <form
                                                                        action="{{ route('riwayat-penilaian.destroy', $item->employee_id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <span class="dropdown-item"><i
                                                                                class="bx bx-trash"></i><input
                                                                                type="submit" value="Delete"
                                                                                style="font-weight: 400; color: #697a8d;
                                                                                    background-color: transparent; border-color: transparent; padding-right: 5rem;"></span>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
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
