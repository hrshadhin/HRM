<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $supervisorRole = Role::create(['name' => 'supervisor']);
        $operatorRole = Role::create(['name' => 'operator']);
        $universalPermission = [
            ['name' => 'collection.store'],
            ['name' => 'collection.index'],
            ['name' => 'collection.create'],
            ['name' => 'collection.show'],
            ['name' => 'customer.index'],
            ['name' => 'customer.store'],
            ['name' => 'customer.create'],
            ['name' => 'customer.show'],
            ['name' => 'user.dashboard'],
            ['name' => 'expense.index'],
            ['name' => 'expense.store'],
            ['name' => 'expense.create'],
            ['name' => 'expense.show'],
            ['name' => 'flat.index'],
            ['name' => 'flat.store'],
            ['name' => 'flat.create'],
            ['name' => 'flat.show'],
            ['name' => 'user.lock'],
            ['name' => 'user.login'],
            ['name' => 'user.logout'],
            ['name' => 'user.profile'],
            ['name' => 'user.update'],
            ['name' => 'project.index'],
            ['name' => 'project.create'],
            ['name' => 'project.store'],
            ['name' => 'project.show'],
            ['name' => 'rent.index'],
            ['name' => 'rent.store'],
            ['name' => 'rent.create'],
            ['name' => 'rent.show'],
        ];

        $adminAndSupervisorPermissions = [
            ['name' => 'collection.edit'],
            ['name' => 'collection.update'],
            ['name' => 'customer.update'],
            ['name' => 'customer.ajax'],
            ['name' => 'customer.edit'],
            ['name' => 'expense.update'],
            ['name' => 'expense.edit'],
            ['name' => 'flat.update'],
            ['name' => 'flat.edit'],
            ['name' => 'flat.byproject'],
            ['name' => 'project.bytype'],
            ['name' => 'project.update'],
            ['name' => 'project.edit'],
            ['name' => 'customer.byproject'],
            ['name' => 'flat.bycustomer'],
            ['name' => 'rent.update'],
            ['name' => 'rent.edit'],
            ['name' => 'report.balance'],
            ['name' => 'report.collections'],
            ['name' => 'report.customers'],
            ['name' => 'report.expenses'],
            ['name' => 'report.flats'],
            ['name' => 'report.projects'],
            ['name' => 'report.rents'],
            ['name' => 'report.rentalStatus'],
            ['name' => 'report.dues']

        ];

        $adminOnlyPermissions = [
            ['name' => 'user.index'],
            ['name' => 'user.store'],
            ['name' => 'user.create'],
            ['name' => 'user.destroy'],
            ['name' => 'user.show'],
            ['name' => 'user.edit'],
            ['name' => 'collection.destroy'],
            ['name' => 'customer.destroy'],
            ['name' => 'expense.destroy'],
            ['name' => 'flat.destroy'],
            ['name' => 'project.destroy'],
            ['name' => 'rent.destroy'],
            ['name' => 'mail.compose'],
            ['name' => 'mail.send']
//            ['name' => 'area.index'],
//            ['name' => 'area.store'],
//            ['name' => 'area.destroy']
        ];

        foreach ($universalPermission as $permission){
            Permission::create($permission);
        }

        foreach ($adminAndSupervisorPermissions as $permission){
            Permission::create($permission);
        }

        foreach ($adminOnlyPermissions as $permission){
            Permission::create($permission);
        }

        foreach ($universalPermission as $permission){
            $adminRole->givePermissionTo($permission['name']);
            $supervisorRole->givePermissionTo($permission['name']);
            $operatorRole->givePermissionTo($permission['name']);

        }

        foreach ($adminAndSupervisorPermissions as $permission){
            $adminRole->givePermissionTo($permission['name']);
            $supervisorRole->givePermissionTo($permission['name']);
        }

        foreach ($adminOnlyPermissions as $permission){
            $adminRole->givePermissionTo($permission['name']);
        }

        $adminUser = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@hrm.com',
                'password' => 'demo123',
                'description' => '',
                'remember_token' => null,
            ]);

        $adminUser->assignRole($adminRole->name);
    }
}
