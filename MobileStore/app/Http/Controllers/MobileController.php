<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileController extends Controller
{
    // lấy điện thoại mới nhất 
    public function new_mobile(Request $request)
    {

        $type = $request->input('type');
        $mobile = null;

        if (isset($type)) {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'")
                )
                ->orderByDesc('product.meeting_day')
                ->limit(10)
                ->get();
        } else {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'")
                )
                ->orderByDesc('product.meeting_day')
                ->get();
        }

        return response()->json($mobile, 200);
    }

    // lấy điện thoại khuyến mại 
    public function promotion_mobile(Request $request)
    {
        $type = $request->input('type');
        $mobile = null;
        if (isset($type)) {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->join('product_promotion', 'product.id', '=', 'product_promotion.product_id', 'inner')
                ->join('promotion', 'product_promotion.promotion_id', '=', 'promotion.id')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'"),
                    DB::raw("promotion.name as 'promotion'")
                )
                ->limit(10)
                ->get();
        } else {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->join('product_promotion', 'product.id', '=', 'product_promotion.product_id', 'inner')
                ->join('promotion', 'product_promotion.promotion_id', '=', 'promotion.id')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'"),
                    DB::raw("promotion.name as 'promotion'")
                )
                ->get();
        }

        return response()->json($mobile, 200);
    }


    // lấy điện thoại nổi bật 
    public function order_mobile(Request $request)
    {
        $type = $request->input('type');
        $mobile = null;
        if (isset($type)) {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'")
                )
                ->whereIn('product.id', function ($query) {
                    $query->select('product_orders.product_id')
                        ->from('product_orders')
                        ->groupBy('product_orders.product_id')
                        ->orderByRaw('SUM(product_orders.count) DESC')
                        ->get();
                })
                ->limit(10)
                ->get();
        } else {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'")
                )
                ->whereIn('product.id', function ($query) {
                    $query->select('product_orders.product_id')
                        ->from('product_orders')
                        ->groupBy('product_orders.product_id')
                        ->orderByRaw('SUM(product_orders.count) DESC')
                        ->get();
                })
                ->get();
        }

        return response()->json($mobile, 200);
    }


    // lấy điện thoại dòng Iphone 
    public function getIphone()
    {
        $mobile = DB::table('product')
            ->join('company', 'product.company_id', '=', 'company.id', 'inner')
            ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
            ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
            ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
            ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
            ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
            ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
            ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
            ->select(
                'product.id',
                DB::raw("company.name as 'company' "),
                'product.name',
                'product.image',
                'product.price',
                DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                'os_cpu.os',
                DB::raw("behind_camera.resolution as 'behind_camera'"),
                DB::raw("front_camera.resolution as 'front_camera'"),
                DB::raw("os_cpu.cpu_speed as 'cpu'"),
                DB::raw("storage.ram as 'ram'"),
                'storage.internal_storage',
                'storage.external_storage',
                'connection.sim',
                DB::raw("battery.capacity as 'battery'")
            )
            ->where('company.id', '=', 2)
            ->get();

        return response()->json($mobile, 200);
    }

    // lấy điện thoại Android 
    public function getAndroid()
    {
        $mobile = DB::table('product')
            ->join('company', 'product.company_id', '=', 'company.id', 'inner')
            ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
            ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
            ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
            ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
            ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
            ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
            ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
            ->select(
                'product.id',
                DB::raw("company.name as 'company' "),
                'product.name',
                'product.image',
                'product.price',
                DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                'os_cpu.os',
                DB::raw("behind_camera.resolution as 'behind_camera'"),
                DB::raw("front_camera.resolution as 'front_camera'"),
                DB::raw("os_cpu.cpu_speed as 'cpu'"),
                DB::raw("storage.ram as 'ram'"),
                'storage.internal_storage',
                'storage.external_storage',
                'connection.sim',
                DB::raw("battery.capacity as 'battery'")
            )
            ->where('company.id', '!=', 2)
            ->get();

        return response()->json($mobile, 200);
    }

    // lấy thông tin chi tiết của một điện thoại 
    public function getPhoneDetail(Request $request)
    {

        $product_id = $request->input('id');

        if (isset($product_id)) {
            $mobile = DB::table('product')
                ->join('company', 'product.company_id', '=', 'company.id', 'inner')
                ->join('screen', 'product.id', '=', 'screen.product_id', 'inner')
                ->join('os_cpu', 'product.id', '=', 'os_cpu.product_id', 'inner')
                ->join('behind_camera', 'product.id', '=', 'behind_camera.product_id', 'inner')
                ->join('front_camera', 'product.id', '=', 'front_camera.product_id', 'inner')
                ->join('storage', 'product.id', '=', 'storage.product_id', 'inner')
                ->join('connection', 'product.id', '=', 'connection.product_id', 'inner')
                ->join('battery', 'product.id', '=', 'battery.product_id', 'inner')
                ->select(
                    'product.id',
                    DB::raw("company.name as 'company' "),
                    'product.name',
                    'product.image',
                    'product.price',
                    DB::raw("CONCAT(screen.screen_technology,', ',screen.dimention) as 'screen'"),
                    'os_cpu.os',
                    DB::raw("behind_camera.resolution as 'behind_camera'"),
                    DB::raw("front_camera.resolution as 'front_camera'"),
                    DB::raw("os_cpu.cpu_speed as 'cpu'"),
                    DB::raw("storage.ram as 'ram'"),
                    'storage.internal_storage',
                    'storage.external_storage',
                    'connection.sim',
                    DB::raw("battery.capacity as 'battery'")
                )
                ->where('product.id', '=', $product_id)
                ->get();

            return response()->json($mobile, 200);
        } else {
            return response()->json([
                "message" => "Erorr"
            ], 404);
        }
    }
}
