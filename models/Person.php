<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $person_id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property string $note
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'note'], 'required'],
            [['person_id','person_id'], 'integer'],
            [['note'], 'string'],
            [['name', 'surname'], 'string', 'max' => 32],
            [['person_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'note' => 'Note',
        ];
    }
}
