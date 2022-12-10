<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "type_methodical_work".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property MethodicalWork[] $methodicalWorks
 */
class TypeMethodicalWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_methodical_work';
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
     * Gets query for [[MethodicalWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethodicalWorks()
    {
        return $this->hasMany(MethodicalWork::class, ['type_methodical_work_id' => 'id']);
    }
}
