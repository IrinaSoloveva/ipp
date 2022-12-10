<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "type_event".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property EducationalWork[] $educationalWorks
 * @property EducationalWork[] $educationalWorks0
 * @property MethodicalWork[] $methodicalWorks
 * @property MethodicalWork[] $methodicalWorks0
 * @property ScientificWork[] $scientificWorks
 * @property ScientificWork[] $scientificWorks0
 */
class TypeEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 150],
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
        return $this->hasMany(EducationalWork::class, ['mark_name_one_id' => 'id']);
    }

    /**
     * Gets query for [[EducationalWorks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducationalWorks0()
    {
        return $this->hasMany(EducationalWork::class, ['mark_name_two_id' => 'id']);
    }

    /**
     * Gets query for [[MethodicalWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethodicalWorks()
    {
        return $this->hasMany(MethodicalWork::class, ['mark_name_one_id' => 'id']);
    }

    /**
     * Gets query for [[MethodicalWorks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethodicalWorks0()
    {
        return $this->hasMany(MethodicalWork::class, ['mark_name_two_id' => 'id']);
    }

    /**
     * Gets query for [[ScientificWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScientificWorks()
    {
        return $this->hasMany(ScientificWork::class, ['mark_name_one_id' => 'id']);
    }

    /**
     * Gets query for [[ScientificWorks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScientificWorks0()
    {
        return $this->hasMany(ScientificWork::class, ['mark_name_two_id' => 'id']);
    }
}
