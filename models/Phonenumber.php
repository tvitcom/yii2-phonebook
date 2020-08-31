<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phonenumber".
 *
 * @property int $person_id
 * @property int $phonenumber_id
 * @property int $number
 */
class Phonenumber extends \yii\db\ActiveRecord
{
    const DEFAULT_PHONE_COUNTRYPREFIX = '380';
    const LIMIT_PHONENUMBERS_FOR_PERSON_ID = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phonenumber';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'number'], 'required'],
            [['number'], 'string' ,'min' => 9, 'max' => 14 ],
            [['phonenumber_id', 'person_id'], 'integer'],
            ['number', 'filter', 'filter' => function ($value) {
                return (string)preg_replace('#\D#u', '', $value);
            }],
            [['phonenumber_id'], 'unique'],
            // [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'phonenumber_id' => 'Id Phonenumber',
            'person_id' => 'Id Person',
            'number' => 'Number',
        ];
    }

    /* 
     * Get count of current person_id
     * @return string
     */
    public static function countOwn($id) {
        return Yii::$app->db->createCommand('SELECT COUNT(' . Phonenumber::tableName() . '_id) FROM ' . Phonenumber::tableName() . ' ph WHERE ph.person_id =' . $id)
        ->queryScalar();
    }
}
