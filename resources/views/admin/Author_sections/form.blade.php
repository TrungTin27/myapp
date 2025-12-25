<div class="card p-3">

    {{-- TITLE --}}
    <div class="form-group">
        <label>Tiêu đề</label>
        <input type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $author_section->title ?? '') }}"
            required>
    </div>

    {{-- SLUG --}}
    <div class="form-group mt-3">
        <label>Slug (URL)</label>
        <input type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $author_section->slug ?? '') }}">
    </div>

    {{-- DESCRIPTION --}}
    <div class="form-group mt-3">
        <label>Mô tả</label>
        <textarea
            name="description"
            rows="4"
            class="form-control"
            placeholder="Nhập nội dung giới thiệu">{{ old('description', $author_section->description ?? '') }}</textarea>
    </div>

    {{-- IMAGE --}}
    <div class="form-group mt-3">
        <label>Hình ảnh</label>
        <input type="file"
            name="image"
            class="form-control"
            accept="image/*">

        @if (!empty($author_section->image))
        <img src="{{ asset('storage/'.$author_section->image) }}"
            width="120"
            class="mt-2">
        @endif
    </div>

    {{-- BUTTON TEXT --}}
    <div class="form-group mt-3">
        <label>Nội dung nút (Button text)</label>
        <input type="text"
            name="button_text"
            class="form-control"
            value="{{ old('button_text', $author_section->button_text ?? '') }}"
            placeholder="Ví dụ: Xem thêm">
    </div>

    {{-- BUTTON LINK --}}
    <div class="form-group mt-3">
        <label>Link nút (Button link)</label>
        <input type="text"
            name="button_link"
            class="form-control"
            value="{{ old('button_link', $author_section->button_link ?? '') }}"
            placeholder="https://example.com">
    </div>

    {{-- ACTIVE --}}
    <div class="form-group mt-3">
        <label>
            <input type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $author_section->is_active ?? false) ? 'checked' : '' }}>
            Hiển thị ngoài website
        </label>
    </div>

    {{-- SORT ORDER --}}
    <div class="form-group mt-3">
        <label>Thứ tự hiển thị</label>
        <input type="number"
            name="sort_order"
            class="form-control"
            value="{{ old('sort_order', $author_section->sort_order ?? 0) }}">
    </div>

    <button class="btn btn-info mt-4 w-100">
        💾 Lưu nội dung
    </button>

</div>