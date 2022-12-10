<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "type_educational_work".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property EducationalWork[] $educationalWorks
 */
class TypeEducationalWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_educational_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * Gets query for [[EducationalWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducationalWorks()
    {
        return $this->hasMany(EducationalWork::class, ['type_educational_work_id' => 'id']);
    }
}
