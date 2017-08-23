<?php

namespace App\Http\Controllers {

    use Illuminate\Http\Request;
    use App\Mail;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Config;

    class ApiController extends Controller
    {


         public function getAvatar($mail){

             $infos_user = Mail::where('adress', '=', $mail)->get();
             $url = $infos_user[0] -> url_avatar;
             $url = json_encode($url);
             return $url;
        }

        public function getInfos(){
            return Config::get('api.api');
        }
    }

}

