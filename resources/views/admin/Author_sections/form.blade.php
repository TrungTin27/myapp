<div class="card p-3">

    {{-- TITLE --}}
    <div class="form-group">
        <label>Tiêu đề</label>
        <input type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $how_to->title ?? '') }}"
            required>
    </div>

    {{-- SLUG --}}
    <div class="form-group mt-3">
        <label>Slug (URL)</label>
        <input type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $how_to->slug ?? '') }}"
            placeholder="learn-how-to-cook-egg">
    </div>

    {{-- THUMBNAIL --}}
    <div class="form-group mt-3">
        <label>Hình ảnh</label>
        <input type="file"
            name="thumbnail"
            class="form-control"
            accept="image/*">

        @if (!empty($how_to->thumbnail))
        <img src="{{ asset('storage/'.$how_to->thumbnail) }}"
            width="120"
            class="mt-2 rounded">
        @endif
    </div>

    {{-- ACTIVE --}}
    <div class="form-group mt-3">
        <label>
            <input type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $how_to->is_active ?? false) ? 'checked' : '' }}>
            Hiển thị ngoài website
        </label>
    </div>

    {{-- SORT ORDER --}}
    <div class="form-group mt-3">
        <label>Thứ tự hiển thị</label>
        <input type="number"
            name="sort_order"
            class="form-control"
            value="{{ old('sort_order', $how_to->sort_order ?? 0) }}">
    </div>

    <button class="btn btn-info mt-4 w-100">
        💾 Lưu How To
    </button>

</div>