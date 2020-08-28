<?php

namespace app\models;


use Yii;
use yii\behaviors\BlameableBehavior;

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

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['person_id','user_id'], 'integer'],
            [['person_id'], 'unique'],
            [['note'], 'string', 'max' => 2048],
            [['name'], 'string', 'min'=>2, 'max' => 32],
            [['surname'], 'string', 'max' => 32],
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
