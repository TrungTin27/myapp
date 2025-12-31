<div class="card p-3">

    {{-- ================= TIÊU ĐỀ ================= --}}
    <div class="form-group">
        <label>Tiêu đề bài viết</label>
        <input type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $post->title ?? '') }}"
            required>
    </div>

    {{-- ================= SLUG ================= --}}
    <div class="form-group mt-3">
        <label>Slug (URL)</label>
        <input type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    {{-- ================= HÌNH ẢNH ================= --}}
    <div class="form-group mt-3">
        <label>Hình ảnh</label>
        <input type="file"
            name="thumbnail"
            class="form-control"
            accept="image/*">

        @if (!empty($post->thumbnail))
        <img src="{{ asset('storage/'.$post->thumbnail) }}"
            width="120"
            class="mt-2">
        @endif
    </div>

    {{-- ================= RATING ================= --}}
    <div class="form-group mt-3">
        <label>Đánh giá (0 - 5 sao)</label>
        <select name="rating" class="form-control">
            <option value="">-- Chọn số sao --</option>
            @for ($i = 0; $i <= 5; $i++)
                <option value="{{ $i }}"
                @selected(old('rating', $post->rating ?? 0) == $i)>
                {{ $i }} sao
                </option>
                @endfor
        </select>
    </div>

    {{-- ================= MÔ TẢ ================= --}}
    <div class="form-group mt-3">
        <label>Mô tả ngắn</label>
        <textarea name="excerpt"
            rows="3"
            class="form-control">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    {{-- ================= HIỂN THỊ HOME ================= --}}
    <div class="form-group mt-3">
        <label>
            <input type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $post->is_active ?? true) ? 'checked' : '' }}>
            Hiển thị ngoài trang chủ
        </label>
    </div>

    {{-- ================= SORT ORDER ================= --}}
    <div class="form-group mt-3">
        <label>Thứ tự hiển thị</label>
        <input type="number"
            name="sort_order"
            class="form-control"
            value="{{ old('sort_order', $post->sort_order ?? 0) }}"
            min="0">
    </div>

    {{-- ================= BUTTON ================= --}}
    <button class="btn btn-info mt-4 w-100">
        Lưu bài viết
    </button>

</div>