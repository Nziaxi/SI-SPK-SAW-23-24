<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <title>Divisi | Linked.Co</title>

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
                        <div class="row">
                            <h4 class="fw-light">Edit Data Divisi</h4>
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <a href="{{ route('divisi.index') }}">
                                            <h6 class="mb-0">&lt Kembali</h6>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('divisi.update', $departement->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">Nama Divisi</label>
                                                <input type="text" name="nama_divisi"
                                                    class="form-control
                                                    @error('nama_divisi')
                                                        is-invalid
                                                    @enderror"
                                                    placeholder="Masukkan Nama Divisi"
                                                    value="{{ old('nama_divisi') ?? $departement->nama_divisi }}">
                                                @error('nama_divisi')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Keterangan</label>
                                                <input type="text" name="keterangan"
                                                    class="form-control
                                                    @error('keterangan')
                                                        is-invalid
                                                    @enderror"
                                                    placeholder="Masukkan Keterangan"
                                                    value="{{ old('keterangan') ?? $departement->keterangan }}">
                                                @error('keterangan')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form -->
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
