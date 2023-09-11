<?php

namespace App\Models;

use App\Core\DBModel;

class UserModel extends DBModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    public int $status = self::STATUS_INACTIVE;

    public string $username = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'admin_account';
    }

    public function attributes(): array
    {
        return ['username', 'password'];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED, self::RULE_USERNAME],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
    // findOne method for finding a specific record in the database
    public function findOne($where)
    {
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}