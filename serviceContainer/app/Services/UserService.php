<?php 
namespace App\Services;

use App\Models\User;

class UserService
{
    // Get the all data from users table 

    public function getUsers(){
        return User::get();
    }

    // Get the unique data from users table

    public function getUserById($id){
        return User::find($id);
    }

    // Add new user in users table

    public function createUser(array $data)
    {
        return User::create($data);
       
    }

    // updata User details

    public function updateUser(User $user, array $data)
    {
        $user->update($data);
    }
    
    // delete User from users table 
    
    public function deleteUser(User $user)
    {
        $user->delete();
    }
    
}
