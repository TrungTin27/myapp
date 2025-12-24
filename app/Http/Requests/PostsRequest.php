<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Cho phép request này chạy
     * (admin thì luôn true)
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Luật validate dữ liệu gửi lên
     */
    public function rules(): array
    {
        return [

            // Tiêu đề bài viết (bắt buộc)
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],

            // Slug cho URL bài viết
            // Không bắt buộc vì có thể tự generate
            'slug' => [
                'nullable',
                'string',
                'max:255',
            ],

            // Ảnh đại diện (Trending Now dùng cái này)
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            // Nội dung bài viết
            'content' => [
                'nullable',
                'string',
            ],

            // Mô tả ngắn (hiển thị list bài)
            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            // Đánh dấu bài trending hay không
            'is_trending' => [
                'nullable',
                'boolean',
            ],

            // Trạng thái bài viết
            'status' => [
                'required',
                'in:draft,published',
            ],

            // Ngày xuất bản
            'published_at' => [
                'nullable',
                'date',
            ],
        ];
    }

    /**
     * Tên tiếng Việt cho lỗi validate
     */
    public function attributes(): array
    {
        return [
            'title'        => 'Tiêu đề bài viết',
            'slug'         => 'Đường dẫn (URL)',
            'thumbnail'    => 'Ảnh đại diện',
            'content'      => 'Nội dung',
            'excerpt'      => 'Mô tả ngắn',
            'is_trending'  => 'Trending Now',
            'status'       => 'Trạng thái',
            'published_at' => 'Ngày xuất bản',
        ];
    }
}
