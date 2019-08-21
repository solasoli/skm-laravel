<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Lguser extends Authenticatable
{
   use HasRoles;
   public function getAvatarAttribute()
   {
   	$hash = md5(strtolower(trim($this->attributes['email'])));
    	return "https://www.gravatar.com/avatar/$hash";
   }

   public function isMe()
   {
   	return auth()->id() == $this->id;
   }

   public function isNotMe()
   {
   	return $this->isMe() == false;
   }

   public function editable()
   {
      return $this->isMe() || auth()->user()->can('manage users');
   }

   public function editUrl()
   {
      return route('users.edit', $this->id);
   }
}