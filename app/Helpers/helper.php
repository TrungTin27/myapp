<?php

//highlights the selected navigation on admin panel

use App\Enums\DiscountType;
use App\Enums\FoodTypeCombo;
use App\Enums\LocationBanner;
use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PositionBanner;
use App\Enums\StatusType;
use App\Enums\TypeNotification;
use App\Models\Cart;
use App\Models\ComboPublicDate;
use App\Models\Food;
use App\Models\Material;
use App\Models\Menu;
use App\Models\MenuItem;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


if (!function_exists('dateRemaining')) {
    function dateRemaining($endDate)
    {
        date_default_timezone_set('Asia/Bangkok');
        $currentDate = Carbon::now(); // Thay thế bằng thời gian hiện tại
        $endDate = Carbon::parse($endDate);
        $daysRemaining = $endDate->diffInDays($currentDate);
        $hoursRemaining = $endDate->copy()->subDays($daysRemaining)->diffInHours($currentDate);
        $minutesRemaining = $endDate->copy()->subDays($daysRemaining)->subHours($hoursRemaining)->diffInMinutes($currentDate);

        return $daysRemaining . ' ngày ' . $hoursRemaining . ' giờ ' . $minutesRemaining . ' phút.';
    }
}

if (!function_exists('getImage')) {
    function getImage($path = null)
    {
        if (empty($path) || $path==='null') {
            return asset('image/mota.jpg');
        }
        if (strpos($path, 'upload') !== false) {
            return Storage::url($path);
        }

        return asset('storage/' . $path);
    }
}
if (!function_exists('getVideo')) {
    function getVideo($path = null)
    {
        // Kiểm tra nếu đường dẫn bắt đầu với 'upload/video'
        if (strpos($path, 'upload/video') !== false) {
            return Storage::url($path); // Trả về URL của video trong storage
        }

        return asset('storage/' . $path); // Phòng trường hợp khác nếu cần
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $path = 'upload/product', $defaultImage = 'noproduct.png')
    {
        if ($file) {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs($path, $fileName, 'public');

            return $path . $fileName;
        }

        return $defaultImage;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($path = 'upload/product')
    {
        $filePath = storage_path('app/public/' . $path);
        if (file_exists($filePath) && strpos($path, 'upload') !== false) {
            unlink($filePath);
        }
    }
}

if (!function_exists('uploadMultipleImages')) {
    function uploadMultipleImages($files, $path = 'upload/product/')
    {
        $fileNames = [];
        if ($files && is_array($files)) {
            foreach ($files as $file) {
                $fileName = uploadImage($file, $path);
                $fileNames[] = $fileName;
            }
        }

        return $fileNames;
    }
}

if (!function_exists('uploadMultipleVideos')) {
    function uploadMultipleVideos($files, $path = 'upload/video/')
    {
        $fileNames = [];

        if ($files && is_array($files) && count($files) > 0) {
            foreach ($files as $file) {
                if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['mp4', 'avi', 'mov', 'wmv'])) {
                    $fileName = uploadImage($file, $path, null);
                    $fileNames[] = $fileName;
                }
            }
        }

        return $fileNames;
    }
}

if (!function_exists('deleteMultipleImages')) {
    function deleteMultipleImages($fileNames, $path = 'upload/product', $defaultImage = 'noproduct.png')
    {
        if ($fileNames && is_array($fileNames)) {
            foreach ($fileNames as $fileName) {
                deleteImage($fileName, $path, $defaultImage);
            }
        }
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $path = 'upload/product', $defaultImage = 'noproduct.png')
    {
        if ($file) {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs($path, $fileName, 'public');

            return $fileName;
        }

        return $defaultImage;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($fileName, $path = 'upload/product', $defaultImage = 'noproduct.png')
    {
        $filePath = storage_path('app/' . $path . '/' . $fileName);
        if (file_exists($filePath) && $fileName !== $defaultImage) {
            unlink($filePath);
        }
    }
}

if (!function_exists('uploadMultipleImages')) {
    function uploadMultipleImages($files, $path = 'upload/product')
    {
        $fileNames = [];
        if ($files && is_array($files)) {
            foreach ($files as $file) {
                $fileName = uploadImage($file, $path);
                $fileNames[] = $fileName;
            }
        }

        return $fileNames;
    }
}

if (!function_exists('deleteMultipleImages')) {
    function deleteMultipleImages($fileNames, $path = 'upload/product', $defaultImage = 'noproduct.png')
    {
        if ($fileNames && is_array($fileNames)) {
            foreach ($fileNames as $fileName) {
                deleteImage($fileName, $path, $defaultImage);
            }
        }
    }
}


if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = 'active')
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}

if (!function_exists('routeNameActive')) {
    function routeNameActive(string $name, $output = 'active')
    {
        if (Route::is("$name.*") || Route::is($name)) {
            return $output;
        }

        return '';
    }
}

//highlights the selected navigation on frontend
if (!function_exists('areActiveRoutesHome')) {
    function areActiveRoutesHome(array $routes, $output = 'active')
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('default_language')) {
    function default_language()
    {
        return env('DEFAULT_LANGUAGE');
    }
}

//formats currency
if (!function_exists('format_price')) {
    function format_price($price)
    {
        $fomated_price = number_format($price, 0, '', ',');

        return $fomated_price . ' VNĐ';
    }
}


function paginateAjax($items, $paginate, $url, $page = null)
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    $custom = new LengthAwarePaginator($items->forPage($page, $paginate), $items->count(), $paginate, $page, ['path' => '/admin/statistical-reports/sell']);

    return $custom;
}

function translate($key, $lang = null)
{
    return $key;
}

function remove_invalid_charcaters($str)
{
    $str = str_ireplace(['\\'], '', $str);

    return str_ireplace(['"'], '\"', $str);
}

function timezones()
{
    return Timezones::timezonesToArray();
}

if (!function_exists('app_timezone')) {
    function app_timezone()
    {
        return config('app.timezone');
    }
}

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            if (Storage::exists($path)) {
                return app('url')->asset($path, $secure);
            }

            return no_asset();
        }
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}

if (!function_exists('api_asset')) {
    function api_asset($id)
    {
        if (empty($id)) {
            return null;
        }
        if (($asset = Upload::find($id)) != null) {
            return $asset->file_name;
        }

        return '';
    }
}
if (!function_exists('no_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function no_asset()
    {
        return static_asset('assets/img/default_menu.png');
    }
}

if (!function_exists('isHttps')) {
    function isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on');
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        // $root = (isHttps() ? "https://" : "https://").$_SERVER['HTTP_HOST'];
        // $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return config('app.url');
    }
}

if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('AWS_URL') . '/';
        } else {
            return getBaseURL();
        }
    }
}

if (!function_exists('handleAvatarUpload')) {
    /**
     * Xử lý upload avatar: xóa avatar cũ (nếu có), lưu avatar mới
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $model - model có chứa cột avatar (User, Profile, ...)
     * @param string $field - tên trường file trong form (mặc định: 'avatar')
     * @return string|null - đường dẫn file đã lưu
     */
    function handleAvatarUpload($request, $model, $field = 'avatar')
    {
        if ($request->hasFile($field) && $request->file($field) instanceof UploadedFile) {
            // Xóa file cũ nếu tồn tại
            if ($model->$field && Storage::disk('public')->exists($model->$field)) {
                Storage::disk('public')->delete($model->$field);
            }

            // Lưu file mới
            return $request->file($field)->store('avatars', 'public');
        }

        return $model->$field; // Không thay đổi
    }
}

