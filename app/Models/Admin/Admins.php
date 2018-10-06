<?php

/**
 * 管理员表
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    /**
     * 指定表名
     */
    protected $table = 'admins';

    /**
     * 指定表主键
     */
    protected $primaryKey = 'id';


    public function getInfoById($user_id)
    {
        return $this->find($user_id)->toArray();
    }
}
