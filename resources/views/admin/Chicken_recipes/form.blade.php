<div class="card p-3">

    {{-- TITLE --}}
    <div class="form-group">
        <label>Tiêu đề</label>
        <input type="text"
            name="title"
            class="form-control"
            value="{{ old('title', $recipe->title ?? '') }}"
            required>
    </div>

    {{-- SLUG --}}
    <div class="form-group mt-3">
        <label>Slug (URL)</label>
        <input type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $recipe->slug ?? '') }}">
    </div>

    {{-- THUMBNAIL --}}
    <div class="form-group mt-3">
        <label>Hình ảnh</label>
        <input type="file"
            name="thumbnail"
            class="form-control"
            accept="image/*">

        @if (!empty($recipe->thumbnail))
        <img src="{{ asset('storage/'.$recipe->thumbnail) }}"
            width="120"
            class="mt-2">
        @endif
    </div>

    {{-- RECIPE PRICE --}}
    <div class="form-group mt-3">
        <label>Giá công thức ($)</label>
        <input type="number"
            step="0.01"
            name="recipe_price"
            class="form-control"
            value="{{ old('recipe_price', $recipe->recipe_price ?? '') }}">
    </div>

    {{-- SERVING PRICE --}}
    <div class="form-group mt-3">
        <label>Giá mỗi serving ($)</label>
        <input type="number"
            step="0.01"
            name="serving_price"
            class="form-control"
            value="{{ old('serving_price', $recipe->serving_price ?? '') }}">
    </div>

    {{-- FEATURED --}}
    <div class="form-group mt-3">
        <label>
            <input type="checkbox"
                name="is_featured"
                value="1"
                {{ old('is_featured', $recipe->is_featured ?? false) ? 'checked' : '' }}>
            Công thức nổi bật
        </label>
    </div>

    {{-- STATUS --}}
    <div class="form-group mt-3">
        <label>Trạng thái</label>
        <select class="form-control" name="status">
            <option value="draft"
                @selected(old('status', $recipe->status ?? 'draft') == 'draft')>
                Nháp
            </option>
            <option value="published"
                @selected(old('status', $recipe->status ?? '') == 'published')>
                Xuất bản
            </option>
        </select>
    </div>

    <button class="btn btn-info mt-4 w-100">
        Lưu công thức
    </button>

</div>