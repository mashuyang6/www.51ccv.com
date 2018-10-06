<?php

/**
 * 用户表
 */

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * 指定表名
     */
    protected $table = 'users';

    /**
     * 指定表主键
     */
    protected $primaryKey = 'id';


    public function getInfoById($user_id)
    {
        return $this->find($user_id)->toArray();
    }
}
