<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Authenticatable {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'equipe';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('senha');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()	{

    return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()	{

    return $this->senha;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {

    return $this->email;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
        public function getRememberToken(){

            return $this->remember_token;
        }

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
        public function setRememberToken($value) {

            $this->remember_token = $value;
        }

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
        public function getRememberTokenName() {

            return 'remember_token';
        }

}
