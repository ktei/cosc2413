<?php namespace Wq\Repositories;

use Wq\IO\FileHelpers;

class UserRepository implements UserRepositoryInterface {
    use FileHelpers;

    public function find($email) {
        $user = null;
        if (($handle = $this->openFile(FILE_USERS)) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                if ($data[0] == $email) {
                    $user = \User::fromCSV($data);
                    break;
                }
            }
            fclose($handle);
        }
        return $user;
    }
}