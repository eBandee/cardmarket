<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "card_type".
 *
 * @property integer $card_type_id
 * @property integer $parent_card_type_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Card[] $cards
 */
class CardTypeBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_card_type_id'], 'integer'],
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'card_type_id' => 'Card Type ID',
            'parent_card_type_id' => 'Parent Card Type ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(\app\models\Card::className(), ['card_type_id' => 'card_type_id']);
    }
}
