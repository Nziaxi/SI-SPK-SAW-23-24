<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <title>Sub-Kriteria | Linked.Co</title>

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
                            <h4 class="card-header py-2 mt-3">Data Sub Kriteria</h4>
                            <div class="table-responsive text-nowrap">
                                <div class="card-body py-1 mt-2">
                                    <a href="{{ route('sub-kriteria.create') }}">
                                        <button type="button" class="btn btn-primary ps-3"><i
                                                class='bx bx-plus align-text-top'></i> Tambah Data</button>
                                    </a>
                                </div>
                                <table class="table table-hover mt-2">
                                    <thead>
                                        <tr>
                                            <th class="cell-fit">No</th>
                                            <th>Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($SubCriterias as $SubCriteria)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ $SubCriteria->criteria->nama_kriteria }}</td>
                                                <td>{{ $SubCriteria->keterangan }}</td>
                                                <td>{{ $SubCriteria->nilai }}</td>
                                                <td>
                                                    <div class="dropdown ps-3">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('sub-kriteria.edit', $SubCriteria->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <form
                                                                action="{{ route('sub-kriteria.destroy', $SubCriteria->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <span class="dropdown-item"><i
                                                                        class="bx bx-trash"></i><input type="submit"
                                                                        value="Delete"
                                                                        style="font-weight: 400; color: #697a8d;
                                                                                        background-color: transparent; border-color: transparent; padding-right: 5rem;"></span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
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