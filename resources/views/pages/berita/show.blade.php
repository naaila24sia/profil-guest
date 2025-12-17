@extends('layouts.guest.app')

@section('content')
    <style>
        /* Efek fade-in masuk halaman */
        .page-fade {
            animation: fadeSlide .5s ease;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container page-fade py-5" style="margin-top:80px;">

        {{-- Tombol Back --}}
        <a href="{{ route('berita.index') }}" class="btn btn-primary px-4 py-2 mb-4">
            ← Kembali
        </a>

        <h2 class="mb-3">{{ $berita->judul }}</h2>

        <div class="mb-4 text-muted">
            📂 {{ $berita->kategori->nama ?? '-' }} &nbsp; | &nbsp;
            ✍️ {{ $berita->penulis ?? '-' }} &nbsp; | &nbsp;
            🕒 {{ $berita->terbit_at ?? '-' }}
        </div>

        {{-- MEDIA (Foto) --}}
        @php
            $cover = \App\Models\Media::where('ref_table', 'berita')
                ->where('ref_id', $berita->berita_id)
                ->orderBy('media_id', 'desc')
                ->first();
        @endphp

        <div class="mb-4 d-flex justify-content-center">
            <div class="rounded overflow-hidden shadow-sm" style="width:90%; max-width:1100px;">
                @if ($cover)
                    <img src="{{ asset('storage/uploads/berita/' . $cover->file_name) }}" class="w-100"
                        style="height:430px; object-fit:cover;">
                @else
                    <img src="{{ asset('assets-guest/img/placeholder.jpg') }}" class="w-100"
                        style="height:430px; object-fit:cover;">
                @endif
            </div>
        </div>


        {{-- ISI BERITA --}}
        <div class="mb-5">
            {!! nl2br(e($berita->isi_html)) !!}
        </div>

        {{-- MODAL PREVIEW --}}
        <div class="modal fade" id="imageModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Preview Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">
                        <img id="modalImage" class="img-fluid rounded" style="max-height:80vh;">
                    </div>

                </div>
            </div>
        </div>

        <script>
            function openImageModal(imageUrl) {
                document.getElementById('modalImage').src = imageUrl;
                var modal = new bootstrap.Modal(document.getElementById('imageModal'));
                modal.show();
            }
        </script>
    @endsection
