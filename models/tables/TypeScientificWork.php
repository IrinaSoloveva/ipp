<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "type_scientific_work".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property ScientificWork[] $scientificWorks
 */
class TypeScientificWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_scientific_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
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
     * Gets query for [[ScientificWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScientificWorks()
    {
        return $this->hasMany(ScientificWork::class, ['type_scientific_work_id' => 'id']);
    }
}
