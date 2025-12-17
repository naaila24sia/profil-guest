@extends('layouts.guest.app')

@section('content')
    <div class="container py-5" style="margin-top:80px;">

        {{-- Tombol Back --}}
        <a href="{{ route('galeri.index') }}" class="btn btn-primary px-4 py-2 mb-4">
            ← Kembali
        </a>

        {{-- JUDUL --}}
        <h2>{{ $galeri->judul }}</h2>

        {{-- Deskripsi --}}
        <div class="mb-3 text-muted">
            {{ $galeri->deskripsi ?? '-' }}
        </div>

        {{-- ================== LIST FOTO ================== --}}
        <div class="row g-4 mb-5">

            @forelse ($media as $m)
                <div class="col-md-4 col-sm-6">

                    <div class="media-wrapper rounded shadow-sm overflow-hidden position-relative"
                        style="width:100%; height:230px; background:#f5f5f5;">

                        @auth
                            @if (auth()->user()->role === 'admin')
                                {{-- Tombol Delete --}}
                                <form action="{{ route('galeri.deleteMedia', $m->media_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus media ini?')"
                                    style="position:absolute; top:5px; right:5px; z-index:10;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">✕</button>
                                </form>
                            @endif
                        @endauth


                        {{-- Preview File --}}
                        @if (str_contains($m->mime_type, 'image'))
                            <img src="{{ asset('storage/uploads/galeri/' . $m->file_name) }}" alt="image"
                                style="width:100%; height:100%; object-fit:cover; cursor:pointer;"
                                onclick="openImageModal('{{ asset('storage/uploads/galeri/' . $m->file_name) }}')">
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100 p-3">
                                <a href="{{ asset('storage/uploads/galeri/' . $m->file_name) }}" target="_blank"
                                    class="text-decoration-none">
                                    📄 {{ $m->file_name }}
                                </a>
                            </div>
                        @endif

                    </div>
                </div>

            @empty
                {{-- Kalau tidak ada media --}}
                <div class="col-12 d-flex justify-content-center">
                    <div class="rounded overflow-hidden shadow-sm" style="width:90%; max-width:600px;">
                        <img src="{{ asset('assets-guest/img/placeholder.jpg') }}" class="w-100"
                            style="height:300px; object-fit:cover;" alt="Belum ada media">
                    </div>
                </div>
            @endforelse
        </div>

        <!-- MODAL IMAGE VIEWER -->
        <div class="modal fade" id="imageModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Preview Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">
                        <img id="modalImage" src="" class="img-fluid rounded" style="max-height:80vh;">
                    </div>

                    <div class="modal-footer">
                        <a id="downloadLink" href="#" download class="btn btn-success">
                            <i class="bi bi-download"></i> Download
                        </a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function openImageModal(imageUrl) {
                document.getElementById('modalImage').src = imageUrl;
                document.getElementById('downloadLink').href = imageUrl;
                var modal = new bootstrap.Modal(document.getElementById('imageModal'));
                modal.show();
            }
        </script>
    @endsection
