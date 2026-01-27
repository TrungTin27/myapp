<div class="card p-3">

    {{-- ================= TIÊU ĐỀ ================= --}}
    <div class="form-group">
        <label>Tiêu đề</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $post->title ?? '') }}"
            required>
    </div>

    {{-- ================= SLUG ================= --}}
    <div class="form-group mt-3">
        <label>Slug (URL)</label>
        <input
            type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    {{-- ================= ẢNH ĐẠI DIỆN ================= --}}
    <div class="form-group mt-3">
        <label>Ảnh đại diện</label>
        <input
            type="file"
            name="thumbnail"
            class="form-control"
            accept="image/*">

        @if (!empty($post?->thumbnail))
            <img
                src="{{ asset('storage/' . $post->thumbnail) }}"
                width="120"
                class="mt-2">
        @endif
    </div>

    {{-- ================= MÔ TẢ NGẮN ================= --}}
    <div class="form-group mt-3">
        <label>Mô tả ngắn</label>
        <input
            type="text"
            name="excerpt"
            class="form-control"
            value="{{ old('excerpt', $post->excerpt ?? '') }}">
    </div>

    {{-- ================= NỘI DUNG ================= --}}
    <div class="form-group mt-3">
        <label>Nội dung</label>
        <textarea
            name="content"
            rows="5"
            class="form-control">{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    {{-- ================= TRENDING NOW (FIX CHUẨN) ================= --}}
    <div class="form-group mt-3">
        <label>Bài viết Trending</label>

        {{-- hidden để luôn gửi giá trị --}}
        <input type="hidden" name="is_trending" value="0">

        <div>
            <input
                type="checkbox"
                name="is_trending"
                value="1"
                {{ old('is_trending', $post->is_trending ?? 0) == 1 ? 'checked' : '' }}>
            Hiển thị ở TRENDING NOW
        </div>
    </div>

    {{-- ================= TRẠNG THÁI ================= --}}
    <div class="form-group mt-3">
        <label>Trạng thái</label>
        <select class="form-control" name="status">
            <option value="draft"
                @selected(old('status', $post->status ?? 'draft') == 'draft')>
                Nháp
            </option>

            <option value="published"
                @selected(old('status', $post->status ?? 'published') == 'published')>
                Xuất bản
            </option>
        </select>
    </div>
    {{-- ================= NÚT LƯU ================= --}}
    <button class="btn btn-info mt-4 w-100">
        Lưu bài viết
    </button>

</div>
