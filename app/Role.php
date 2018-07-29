<?php

namespace Xtrainers;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $adminRoleId = 1;

    protected $teacherRoleId = 2;

    protected $subscriberRoleId = 3;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return int
     */
    public function getTeacherRoleId()
    {
        return $this->teacherRoleId;
    }

    /**
     * @return int
     */
    public function getAdminRoleId()
    {
        return $this->adminRoleId;
    }

    /**
     * @return int
     */
    public function getSubscriberRoleId()
    {
        return $this->subscriberRoleId;
    }

    /**
     * @return array
     */
    public function getAllowedUserRoles()
    {
        return array(
            'admin' => 'administrator',
            'trainer' => 'trainer',
            'subscriber' => 'subscriber'
        );
    }
}
