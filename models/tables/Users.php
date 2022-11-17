<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string $login
 * @property string $password
 * @property string|null $email
 * @property int $department_id
 *
 * @property Department $department
 */
class Users extends \yii\db\ActiveRecord
{
    const SCENARIO_AUTH = 'auth';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'department_id'], 'required'],
            [['department_id'], 'integer'],
            [['name', 'login', 'email'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 60],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'department_id' => 'Department ID',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::class, ['id' => 'department_id']);
    }

    public function fields() {
        if ($this->scenario === static::SCENARIO_AUTH) {
            return [
                'id',
                'username' => 'login',
                'password'
            ];
        }
        return parent::fields();
    }
}
