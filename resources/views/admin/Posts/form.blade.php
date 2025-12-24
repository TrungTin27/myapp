<div class="card p-3">

    {{-- ================= TIÊU ĐỀ BÀI VIẾT ================= --}}
    <div class="form-group">
        <label>Tiêu đề</label>
        <input
            type="text"
            name="title" {{-- tên field, khớp DB --}}
            class="form-control"
            value="{{ old('title', $post->title ?? '') }}" {{-- lấy lại dữ liệu khi lỗi --}}
            required>
    </div>

    {{-- ================= SLUG (URL) ================= --}}
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
        <label>Hình ảnh</label>
        <input
            type="file"
            name="thumbnail" {{-- khớp request --}}
            class="form-control"
            accept="image/*">

        {{-- HIỂN THỊ ẢNH CŨ KHI EDIT --}}
        @if (!empty($post->thumbnail))
        <img
            src="{{ asset('storage/' . $post->thumbnail) }}"
            width="120"
            class="mt-2">
        @endif
    </div>

    {{-- ================= NỘI DUNG ================= --}}
    <div class="form-group mt-3">
        <label>Nội dung</label>
        <textarea
            name="content" {{-- field nội dung --}}
            rows="5"
            class="form-control">{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    {{-- ================= BÀI VIẾT NỔI BẬT ================= --}}
    <div class="form-group mt-3">
        <label>
            <input
                type="checkbox"
                name="is_featured"
                value="1"
                {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}>
            Bài viết nổi bật
        </label>
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
                @selected(old('status', $post->status ?? '') == 'published')>
                Xuất bản
            </option>
        </select>
    </div>

    {{-- ================= NÚT LƯU ================= --}}
    <button class="btn btn-info mt-4 w-100">
        Lưu bài viết
    </button>

</div>