<?php
  
namespace Database\Seeders;
  
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'first_name' => 'Oni', 
            'last_name' => 'Adi', 
            'phone' => '+23754645644', 
            'email' => 'softcitygroup@gmail.com',
            'country' => 'Nigeria',
            'type' => 'Admin',
            'created_by' => 'Developer',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
        
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}