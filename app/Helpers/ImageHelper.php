<?php
namespace App\Helpers;

use App\User;
use App\Admin;
use App\Helpers\GravatarHelper;



/*
 * ImageHelper Class
 */
class ImageHelper{
    public static function getUserImage($id){
        $user = User::findorfail($id);
        $avatar_url = "";
        if(!is_null($user)){
            if($user->avatar == NULL){
                //Return the gravatar image
                if(GravatarHelper::validate_gravatar($user->email)){
                    //have valid gravatar image
                    $avatar_url = GravatarHelper::gravatar_image($user->email, 80);
                }else{
                    //when there is no gravatar image
                    $avatar_url = url('Backend/user.png');
                }
            }else{
                //Return the gravatar image
                $avatar_url = url('Backend/users/'.$user->avatar);
            }
        }
        return $avatar_url;
    }

    public static function getAdminImage($id){
        $user = Admin::findorfail($id);
        $avatar_url = "";
        if(!is_null($user)){
            if($user->avatar == NULL){
                //Return the gravatar image
                if(GravatarHelper::validate_gravatar($user->email)){
                    //have valid gravatar image
                    $avatar_url = GravatarHelper::gravatar_image($user->email, 80);
                }else{
                    //when there is no gravatar image
                    $avatar_url = url('Backend/user.png');
                }
            }else{
                //Return the gravatar image
                $avatar_url = url('Backend/users/'.$user->avatar);
            }
        }
        return $avatar_url;
    }
}
