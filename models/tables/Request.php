<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string|null $table_name
 * @property string|null $date_request
 * @property string|null $date_response
 * @property int|null $academic_year
 * @property int $users_id_request
 * @property int $users_id_response
 * @property int $status_id
 * @property int $response_id
 *
 * @property Blog[] $blogs
 * @property EducationalWork[] $educationalWorks
 * @property MethodicalWork[] $methodicalWorks
 * @property Response $response
 * @property ScientificWork[] $scientificWorks
 * @property Status $status
 * @property TeachingLoadFact[] $teachingLoadFacts
 * @property TeachingLoadPlan[] $teachingLoadPlans
 * @property Users $usersIdRequest
 * @property Users $usersIdResponse
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_request', 'date_response'], 'safe'],
            [['academic_year', 'users_id_request', 'users_id_response', 'status_id', 'response_id'], 'integer'],
            [['users_id_request', 'users_id_response', 'status_id', 'response_id'], 'required'],
            [['table_name'], 'string', 'max' => 25],
            [['response_id'], 'exist', 'skipOnError' => true, 'targetClass' => Response::class, 'targetAttribute' => ['response_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['users_id_request'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['users_id_request' => 'id']],
            [['users_id_response'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['users_id_response' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_name' => 'Table Name',
            'date_request' => 'Date Request',
            'date_response' => 'Date Response',
            'academic_year' => 'Academic Year',
            'users_id_request' => 'Users Id Request',
            'users_id_response' => 'Users Id Response',
            'status_id' => 'Status ID',
            'response_id' => 'Response ID',
        ];
    }

    /**
     * Gets query for [[Blogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[EducationalWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducationalWorks()
    {
        return $this->hasMany(EducationalWork::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[MethodicalWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethodicalWorks()
    {
        return $this->hasMany(MethodicalWork::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[Response]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResponse()
    {
        return $this->hasOne(Response::class, ['id' => 'response_id']);
    }

    /**
     * Gets query for [[ScientificWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScientificWorks()
    {
        return $this->hasMany(ScientificWork::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[TeachingLoadFacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachingLoadFacts()
    {
        return $this->hasMany(TeachingLoadFact::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[TeachingLoadPlans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachingLoadPlans()
    {
        return $this->hasMany(TeachingLoadPlan::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[UsersIdRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersIdRequest()
    {
        return $this->hasOne(Users::class, ['id' => 'users_id_request']);
    }

    /**
     * Gets query for [[UsersIdResponse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersIdResponse()
    {
        return $this->hasOne(Users::class, ['id' => 'users_id_response']);
    }
}
