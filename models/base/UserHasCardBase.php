<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "user_has_card".
 *
 * @property integer $user_id
 * @property integer $card_id
 * @property integer $wish
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Card $card
 * @property User $user
 */
class UserHasCardBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'card_id'], 'required'],
            [['user_id', 'card_id', 'wish'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'card_id' => 'Card ID',
            'wish' => 'Wish',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(\app\models\Card::className(), ['card_id' => 'card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'user_id']);
    }
}
