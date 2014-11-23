<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "card_set".
 *
 * @property string $card_set_id
 * @property string $name
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Card[] $cards
 */
class CardSetBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_set_id', 'name', 'date'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['card_set_id', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'card_set_id' => 'Card Set ID',
            'name' => 'Name',
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(\app\models\Card::className(), ['card_set_id' => 'card_set_id']);
    }
}
