<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => '新闻中心',
                'description' => '企业动态和行业资讯',
            ],
            [
                'name'        => '解决方案',
                'description' => '提供的产品和服务',
            ],
            [
                'name'        => '案例分享',
                'description' => '实施经验和客户反馈',
            ],
            [
                'name'        => '关于我们',
                'description' => '企业相关信息',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
