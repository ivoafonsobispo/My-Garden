<!-- Controller dos users de login -->

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    // descomentar linha na web.php, usage: my-garden.test/data
    // função para criar users na bd
    function create_users()
    {
        $user = new User;
        $user->name = "José Areia";
        $user->username = "joseareia";
        $user->password = Hash::make("password");
        $user->save();

        $user = new User;
        $user->name = "Ivo Bispo";
        $user->username = "ivobispo";
        $user->password = Hash::make("jojo");
        $user->save();

        return redirect('/login');
    }
}
