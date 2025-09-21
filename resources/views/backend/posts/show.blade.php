@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm"><i
                            class="fas fa-arrow-left mr-2"></i>Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <h1 class="display-3">{{ $post->title }}</h1>
                <div class="d-flex align-items-center mb-4">
                    @if($post->published_at)
                    <span class="badge badge-success mr-3">Published</span>
                    @else
                    <span class="badge badge-secondary mr-3">Draft</span>
                    @endif
                    <small class="text-muted">
                        <i class="fas fa-user mr-1"></i> {{ $post->user->name }} |
                        <i class="fas fa-folder ml-2 mr-1"></i> {{ $post->category }} |
                        <i class="fas fa-clock ml-2 mr-1"></i> {{ $post->created_at->isoFormat('D MMMM Y') }}
                    </small>
                </div>

                @if($post->image)
                <div class="text-center mb-4">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded"
                        style="max-height: 400px;">
                </div>
                @endif

                <div class="post-content">
                    {!! $post->body !!}
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary"><i
                        class="fas fa-edit mr-2"></i>Edit Postingan Ini</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .post-content {
        line-height: 1.8;
        font-size: 1rem;
    }

    .post-content h1,
    .post-content h2,
    .post-content h3 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .post-content p {
        margin-bottom: 1rem;
    }

    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.25rem;
    }
</style>
@endpush