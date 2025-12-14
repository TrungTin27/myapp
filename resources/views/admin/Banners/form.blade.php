    <div class="card p-3">
        <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" value="{{ $title }}" required>
        </div>
        <div class="form-group mt-3">
            <label>Hình ảnh</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="form-group mt-3">
            <label>Nội dung</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $subtitle }}" required>
        </div>
        <div class="form-group">
            <label>Đường dẫn</label>
            <input type="text" name="link" class="form-control" value="{{ $link }}" required>
        </div>
        <div class="form-group">
            <label>Thứ tự hiển thị</label>
            <input type="number" name="sort_order" class="form-control" value="{{ $sort_order }}" required>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-from-label font-weight-500">Trạng thái<span class="text-vali">&#9913;</span></label>
            <div class="col-sm-9">
                <select class=" font-weight-500 form-control @error('status') is-invalid  @enderror" name="is_active">
                    <option value="1" @selected(old('is_active', $is_active ?? 1)=='1' )> Hiện </option>
                    <option value="0" @selected(old('is_active', $is_active ?? 1)=='0' )> Ẩn </option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <button class="btn btn-info mt-4 w-100">Lưu</button>
    </div>
</form>