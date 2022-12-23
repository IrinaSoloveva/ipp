<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "methodical_work".
 *
 * @property int $id
 * @property string|null $discipline_one
 * @property float|null $load_plan_one
 * @property float|null $load_fact_one
 * @property string|null $mark_date_one
 * @property int|null $mark_number_one
 * @property string|null $discipline_two
 * @property float|null $load_plan_two
 * @property float|null $load_fact_two
 * @property string|null $mark_date_two
 * @property int|null $mark_number_two
 * @property int $type_methodical_work_id
 * @property int $request_id
 * @property int $mark_name_one_id
 * @property int $mark_name_two_id
 *
 * @property TypeEvent $markNameOne
 * @property TypeEvent $markNameTwo
 * @property Request $request
 * @property TypeMethodicalWork $typeMethodicalWork
 */
class MethodicalWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'methodical_work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['load_plan_one', 'load_fact_one', 'load_plan_two', 'load_fact_two'], 'number'],
            //[['mark_date_one', 'mark_date_two'], 'date', 'message' => 'Дата в формате d-m-Y'],
            // ensure empty values are stored as NULL in the database
            [['mark_date_one', 'mark_date_two'], 'default', 'value' => null],
            [['mark_name_one_id', 'mark_name_two_id'], 'default', 'value' => 1],
            // validate the date and overwrite `deadline` with the unix timestamp
            //['mark_date_one', 'date', 'timestampAttribute' => 'mark_date_one'],
            //['mark_date_two', 'date', 'timestampAttribute' => 'mark_date_two'],
            [['type_methodical_work_id', 'request_id', 'mark_name_one_id', 'mark_name_two_id'], 'integer'],
            [['type_methodical_work_id', 'request_id', 'mark_name_one_id', 'mark_name_two_id'], 'required'],
            [['discipline_one', 'discipline_two', 'mark_number_one', 'mark_number_two'], 'string', 'max' => 45],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::class, 'targetAttribute' => ['request_id' => 'id']],
            [['mark_name_one_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeEvent::class, 'targetAttribute' => ['mark_name_one_id' => 'id']],
            [['mark_name_two_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeEvent::class, 'targetAttribute' => ['mark_name_two_id' => 'id']],
            [['type_methodical_work_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeMethodicalWork::class, 'targetAttribute' => ['type_methodical_work_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discipline_one' => 'Discipline One',
            'load_plan_one' => 'Load Plan One',
            'load_fact_one' => 'Load Fact One',
            'mark_date_one' => 'Mark Date One',
            'mark_number_one' => 'Mark Number One',
            'discipline_two' => 'Discipline Two',
            'load_plan_two' => 'Load Plan Two',
            'load_fact_two' => 'Load Fact Two',
            'mark_date_two' => 'Mark Date Two',
            'mark_number_two' => 'Mark Number Two',
            'type_methodical_work_id' => 'Type Methodical Work ID',
            'request_id' => 'Request ID',
            'mark_name_one_id' => 'Mark Name One ID',
            'mark_name_two_id' => 'Mark Name Two ID',
        ];
    }

    /**
     * Gets query for [[MarkNameOne]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkNameOne()
    {
        return $this->hasOne(TypeEvent::class, ['id' => 'mark_name_one_id']);
    }

    /**
     * Gets query for [[MarkNameTwo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkNameTwo()
    {
        return $this->hasOne(TypeEvent::class, ['id' => 'mark_name_two_id']);
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::class, ['id' => 'request_id']);
    }

    /**
     * Gets query for [[TypeMethodicalWork]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeMethodicalWork()
    {
        return $this->hasOne(TypeMethodicalWork::class, ['id' => 'type_methodical_work_id']);
    }
}
