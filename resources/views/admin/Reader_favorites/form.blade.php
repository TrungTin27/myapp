<div class="card p-3">

    {{-- ================= TIÊU ĐỀ ================= --}}
    <div class="form-group">
        <label>Tiêu đề bài viết</label>
        <input type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $post->title ?? '') }}"
            required>
        {{-- title: tên món / bài viết hiển thị ngoài web --}}
    </div>

    {{-- ================= SLUG ================= --}}
    <div class="form-group mt-3">
        <label>Slug (URL)</label>
        <input type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $post->slug ?? '') }}">
        {{-- slug: dùng cho đường dẫn SEO --}}
    </div>

    {{-- ================= HÌNH ẢNH ================= --}}
    <div class="form-group mt-3">
        <label>Hình ảnh</label>
        <input type="file"
            name="thumbnail"
            class="form-control"
            accept="image/*">
        {{-- thumbnail: ảnh hiển thị card Reader’s Favorites --}}

        @if (!empty($post->thumbnail))
        <img src="{{ asset('storage/'.$post->thumbnail) }}"
            width="120"
            class="mt-2">
        @endif
    </div>

    {{-- ================= RATING ================= --}}
    <div class="form-group mt-3">
        <label>Đánh giá (1 - 5 sao)</label>
        <select name="rating" class="form-control">
            <option value="">-- Chọn số sao --</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}"
                @selected(old('rating', $post->rating ?? '') == $i)>
                {{ $i }} sao
                </option>
                @endfor
        </select>
        {{-- rating: số sao hiển thị dưới ảnh --}}
    </div>

    {{-- ================= MÔ TẢ ================= --}}
    <div class="form-group mt-3">
        <label>Mô tả ngắn</label>
        <textarea name="description"
            rows="3"
            class="form-control">{{ old('description', $post->description ?? '') }}</textarea>
        {{-- description: đoạn text ngắn dưới tiêu đề --}}
    </div>

    {{-- ================= READER'S FAVORITES ================= --}}
    <div class="form-group mt-3">
        <label>
            <input type="checkbox"
                name="is_featured"
                value="1"
                {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}>
            Hiển thị trong Reader’s Favorites
        </label>
        {{-- is_featured: đánh dấu để show ở section này --}}
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
        {{-- status: kiểm soát bài có hiện ra web hay không --}}
    </div>

    {{-- ================= BUTTON ================= --}}
    <button class="btn btn-info mt-4 w-100">
        Lưu bài viết
    </button>

</div>