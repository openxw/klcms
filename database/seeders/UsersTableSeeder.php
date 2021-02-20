<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 生成数据集合
        User::factory()->count(3)->create();

        // 单独处理第1个用户的数据
        $user = User::find(1);
        $user->name = '站长';
        $user->email = 'xw@cditd.com';
        // $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();

        // 单独处理第2个用户的数据
        $user = User::find(2);
        $user->name = '管理员';
        $user->email = 'xln@cditd.com';
        // $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();

         // 初始化用户角色，将 1 号用户指派为『站长』
         $user->assignRole('Founder');

         // 将 2 号用户指派为『管理员』
         $user = User::find(2);
         $user->assignRole('Maintainer');
    }
}
