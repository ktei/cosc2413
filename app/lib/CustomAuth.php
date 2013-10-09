<?php namespace Wq\Security;

use \Illuminate\Auth as Auth;
use Wq\IO\FileHelpers;

class CustomAuth implements Auth\UserProviderInterface {
    use FileHelpers;

    public function retrieveById($identifier) {
        $userData = $this->getUserDataByEmail($identifier);
        if ($userData != null) {
            return \User::fromCSV($userData);
        }
        return null;
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials) {
        $userData = $this->getUserDataByEmail($credentials['email']);
        if ($userData != null && $userData[1] == $credentials['password']) {
            return \User::fromCSV($userData);
        }
        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Auth\UserInterface $user, array $credentials) {
        $result = $user->getAuthIdentifier() == $credentials['email'] &&
            $user->getAuthPassword() == $credentials['password'];
        return $result;
    }

    private function getUserDataByEmail($email) {
        $result = null;
        if (($handle = $this->openFile(FILE_USERS)) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                if ($data[0] == $email) {
                    $result = $data;
                    break;
                }
            }
            fclose($handle);
        }
        return $result;
    }
}