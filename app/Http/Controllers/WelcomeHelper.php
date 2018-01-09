<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeHelper extends WelcomeController
{
    public static function message($body='',$status='success')
    {
        session()->flash('message', $body);
        session()->flash('status', $status);
    }

    public static function error($body='')
    {
        session()->flash('message', $body);
        session()->flash('status', 'danger');
    }

    public static function flash($success=true)
    {
      $message = $success ? 'ذخیره سازی با موفقیت انجام شد.' : 'ذخیره سازی با خطا مواجه شد.' ;
      $status  = $success ? 'success' : 'danger' ;
      session()->flash('message', $message);
      session()->flash('status', $status);
    }

    public static function flash_delete_message($success=true)
    {
      $message = $success ? 'آیتم مورد نظر با موفقیت پاک شد.' : 'متاسفانه حذف آیتم مورد نظر با خطا مواجه شد' ;
      $status  = $success ? 'success' : 'danger' ;
      session()->flash('message', $message);
      session()->flash('status', $status);
    }

    public static function make_user($username, $type='customer', $password='000000') {
      $user = new \App\User;
      $user->name = $username;
      $user->password = Hash::make($password);
      if($instance = $user->save()){
        return $user;
      }else {
        dd('Error 1001');
      }
    }

    public static function receiver_check($object)
    {
        if( !$object || ( !admin() && $object->receiver_id != userable_id() ) ){
            abort(404);
        }
    }

    public static function check($value=true)
    {
      if(!$value) dd('Error 961');
    }

    public static function detect_transaction_credit_percent($card_owner)
    {
        if(isset($card_owner->wholesale) && !$card_owner->wholesale){
            return current_receiver()->base_transaction->retail_card_gift;
        }else {
            return current_receiver()->base_transaction->wholesale_card_gift;
        }
    }

    public static function detect_transaction_base_points($card_owner)
    {
        if(isset($card_owner->wholesale) && !$card_owner->wholesale){
            return current_receiver()->base_transaction->retail_base_points;
        }else {
            return current_receiver()->base_transaction->wholesale_base_points;
        }
    }

    public static function detect_transaction_foreach_twenty($card_owner)
    {
        if(isset($card_owner->wholesale) && !$card_owner->wholesale){
            return current_receiver()->base_transaction->foreach_twenty;
        }else {
            return current_receiver()->base_transaction->wholesale_foreach_twenty;
        }
    }
}
