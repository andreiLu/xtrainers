<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Xtrainers\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->string('name');
            $table->timestamps();
        });

        $this->insertRoles();
    }

    private function insertRoles()
    {
        $roles = new Role();
        $allowedRoles = $roles->getAllowedUserRoles();

        foreach ($allowedRoles as $key => $role) {
            $roleModel = new Role();

            switch ($key) {

                case 'admin':
                    $roleModel->role_id = $roleModel->getAdminRoleId();
                    $roleModel->name = $role;
                    break;

                case 'trainer':
                    $roleModel->role_id = $roleModel->getTeacherRoleId();
                    $roleModel->name = $role;
                    break;

                case 'subscriber':
                    $roleModel->role_id = $roleModel->getSubscriberRoleId();
                    $roleModel->name = $role;
                    break;

                default:
                    break;
            }

            $roleModel->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
