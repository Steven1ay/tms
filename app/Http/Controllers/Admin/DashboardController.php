<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Folder;
class DashboardController extends BaseController
{
    //
    public function index ()
    {
        return view('admin.index');
    }


    public function notesStatic ()
    {
        $list = Folder::all();
        $categories = [];//Folder::where(array('p_id'=>0))->select('id','title','p_id')->get();
        $allCategories = [];//Folder::where([['p_id','>',0]])->select('id','title','p_id','u_id')->get();
        foreach($list as $items) {

            // 开始处理显示目录下的文件数量
            $totalCount = 0;//文件夹及其所属的子文件下笔记总数量
            $items->currentCount = $items->notes()->count();// 当前文件夹下笔记数量
            $totalCount = $totalCount + $items->currentCount;
            $subCondition = Folder::where('p_id',$items->id);
            $subMenuCount = $subCondition->count();
            if ($subMenuCount > 0) {
                $delSubCount = $this->dealSub($subCondition->get());
                $totalCount = $totalCount + $delSubCount;
            }
            if ($items->p_id == 0) {
                $items->value = $totalCount;
            }
            // 这里分流数据分为一级目录和其他目录
            if ($items->p_id == 0) {
                array_push($categories,$items->toArray());
            }
        }
        return $this->ajaxSuccess('获取成功',$categories);
    }


    public function usersCount()
    {

        $usersCount = DB::table('users')->count();
    }
    /**
     * 处理子菜单
     * @param $data
     * @return int
     */
    protected function dealSub($data) {
        $totalCount = 0;
        foreach ($data as $subItems) {
            $subItems->currentCount = $subItems->notes()->count();
            $totalCount = $totalCount + $subItems->currentCount;
            $subCondition = Folder::where('p_id',$subItems->id);
            $subMenuCount = $subCondition->count();
            if ($subMenuCount > 0) {
                $subMenu = $subCondition->get();
                $totalCount = $totalCount + $this->dealSub($subMenu);
            }
        }
        return $totalCount;
    }
}
