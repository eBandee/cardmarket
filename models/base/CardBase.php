<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "card".
 *
 * @property integer $card_id
 * @property string $card_set_id
 * @property integer $card_type_id
 * @property string $name
 * @property string $rarity
 * @property string $manacost
 * @property integer $converted_manacost
 * @property string $ability
 * @property string $color
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CardType $cardType
 * @property CardSet $cardSet
 * @property UserHasCard[] $userHasCards
 * @property User[] $users
 */
class CardBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_id', 'card_set_id', 'card_type_id', 'name', 'rarity'], 'required'],
            [['card_id', 'card_type_id', 'converted_manacost'], 'integer'],
            [['ability'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['card_set_id', 'name', 'rarity', 'manacost', 'color'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'card_id' => 'Card ID',
            'card_set_id' => 'Card Set ID',
            'card_type_id' => 'Card Type ID',
            'name' => 'Name',
            'rarity' => 'Rarity',
            'manacost' => 'Manacost',
            'converted_manacost' => 'Converted Manacost',
            'ability' => 'Ability',
            'color' => 'Color',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardType()
    {
        return $this->hasOne(\app\models\CardType::className(), ['card_type_id' => 'card_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardSet()
    {
        return $this->hasOne(\app\models\CardSet::className(), ['card_set_id' => 'card_set_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasCards()
    {
        return $this->hasMany(\app\models\UserHasCard::className(), ['card_id' => 'card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\app\models\User::className(), ['user_id' => 'user_id'])->viaTable('user_has_card', ['card_id' => 'card_id']);
    }
}
