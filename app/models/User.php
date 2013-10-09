<?php

use Illuminate\Auth\UserInterface;

class User extends Model implements UserInterface {

    public static function fromCSV($data) {
        return new User(array(
            'email' => $data[0],
            'password' => $data[1],
            'name' => $data[2],
            'biz_name' => $data[3],
            'prices' => json_decode($data[4])
        ));
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->email;
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

}