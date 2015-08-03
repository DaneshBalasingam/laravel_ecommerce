<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Role;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('role_user', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned()->index();
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});

		$role = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'customer']);
        $role_array = [$role->id];

		$admin_user = User::create([
						'name' => 'testUser',
						'email' => 'test@yahoo.com',
						'password' => bcrypt('password'),
					]);

		$admin_user->roles()->sync($role_array);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_user');
		Schema::drop('roles');
	}

}
