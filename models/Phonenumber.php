<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phonenumber".
 *
 * @property int $id_person
 * @property int $id_phonenumber
 * @property int $number
 */
class Phonenumber extends \yii\db\ActiveRecord
{
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
            [['id_phonenumber', 'id_person', 'number'], 'required'],
            [['id_phonenumber', 'id_person', 'number'], 'integer'],
            [['id_phonenumber'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_phonenumber' => 'Id Phonenumber',
            'id_person' => 'Id Person',
            'number' => 'Number',
        ];
    }
}
