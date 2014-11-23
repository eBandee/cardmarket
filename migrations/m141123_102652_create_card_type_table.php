<?php

use yii\db\Schema;
use yii\db\Migration;

class m141123_102652_create_card_type_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('card_type', [
            'card_type_id' => Schema::TYPE_PK,
            'parent_card_type_id' => Schema::TYPE_INTEGER . ' NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP,
            'updated_at' => Schema::TYPE_TIMESTAMP
        ]);

        $cardTypeTree = [
            'Creature' => [
                'Horror', 'Human Cleric', 'Human Soldier', 'Human Warrior', 'Hound Soldier', 'Hound Scout',
                'Kirin', 'Bear', 'Goblin Berserker', 'Wall', 'Phoenix', 'Elephant Warrior', 'Orc Warrior',
                'Efreet Monk', 'Efreet Shaman', 'Demon', 'Human Rogue', 'Shapeshifter', 'Spirit Warrior',
                'Human Wizard', 'Human Monk', 'Elemental', 'Human Berserker', 'Bat', 'Bird Soldier', 'Elk',
                'Insect', 'Snake Hydra', 'Ape', 'Bird Shaman', 'Elephant', 'Goblin Rogue', 'Bird Scout',
                'Vampire', 'Zombie Crocodile', 'Zombie Wizard', 'Naga Wizard', 'Hound Archer', 'Ogre Warrior',
                'Human Archer','Orc Shaman', 'Turtle', 'Orc Assassin', 'Djinn Wizard', 'Bird', 'Leviathan',
                'Goblin Warrior', 'Cat Demon', 'Human Shaman', 'Djinn Monk', 'Zombie Elephant', 'Human Assassin',
                'Bird Warrior', 'Naga Archer', 'Beast', 'Human Scout', 'Zombie', 'Zombie Ape', 'Rhino',
                'Naga Shaman', 'Yeti', 'Horse', 'Lammasu', 'Sphinx', 'Zombie Treefolk', 'Skeleton Warrior',
                'Badger', 'Siren', 'Cyclops', 'Merfolk Wizard', 'Centaur Warrior', 'Minotaur', 'Minotaur Shaman',
                'Serpent', 'Dragon', 'Spider', 'Griffin', 'Merfolk', 'Minotaur Warrior', 'Kraken', 'Pegasus',
                'Giant', 'Hydra', 'Cat Monk', 'Archon', 'Satyr', 'Satyr Shaman', 'Satyr Warrior', 'Harpy',
                'Zombie Siren', 'Snake', 'Cat Soldier', 'Hound', 'Boar', 'Cockatrice', 'Octopus', 'Centaur Scout',
                'Cat Warrior', 'Zombie Satyr', 'Satyr Soldier', 'Lizard', 'Starfish', 'Leech', 'Chimera',
                'Cat Cleric', 'Merfolk Soldier', 'Merfolk Rogue', 'Siren Soldier', 'Spirit', 'Angel',
                'Human Artificer', 'Salamander Wizard', 'Sliver', 'Zombie Cat', 'Giant Monk',
                'Plant Elemental Beast', 'Zombie Bird', 'Squid Horror', 'Vedalken Artificer', 'Elf Druid',
                'Devil', 'Elemental Cat', 'Plant Hydra', 'Goblin Knight', 'Hippogriff', 'Angel Illusion',
                'Treefolk Warrior', 'Fish', 'Kithkin Soldier', 'Plant Elemental', 'Djinn', 'Zombie Giant',
                'Nightmare Horse', 'Human Druid', 'Faerie Rogue', 'Elf Shaman', 'Wurm', 'Avatar', 'Elf Warrior',
                'Rat', 'Fungus Horror', 'Zombie Wall', 'Frog', 'Shade', 'Human', 'Skeleton Soldier', 'Horse Fish',
                'Centaur Wizard', 'Minotaur Berserker', 'Cat', 'Gorgon', 'Centaur Advisor', 'Centaur Archer',
                'Zombie Centaur', 'Zombie Soldier', 'Satyr Rogue', 'Scorpion', 'Griffin Skeleton',
                'Plant', 'Human Advisor', 'Satyr Druid', 'Fox', 'Human Knight', 'Ox',
            ],
            'Enchantment' => [
                'Aura',
            ],
            'Artifact' => [
                'Equipment',
            ],
            'Instant' => [],
            'Sorcery' => [],
            'Legendary Creature' => [
                'Human Soldier', 'Human Monk', 'Naga Shaman', 'Human Warrior', 'Orc Warrior', 'Cat Soldier',
                'Kraken', 'Human', 'Angel', 'Human Wizard', 'Ogre Spirit', 'Demon', 'Sliver', 'Human Rogue',
                'Gorgon', 'Sphinx', 'Hydra', 'Zombie Warrior',
            ],
            'Land' => [],
            'Legendary Artifact' => [
                'Equipment',
            ],
            'Basic Land' => [
                'Forest', 'Island', 'Mountain', 'Plains', 'Swamp',
            ],
            'Planeswalker' => [
                'Sarkhan', 'Sorin', 'Kiora', 'Ajani', 'Chandra', 'Garruk', 'Jace', 'Liliana', 'Nissa', 'Ashiok',
                'Elspeth', 'Xenagos',
            ],
            'Artifact Creature' => [
                'Golem', 'Chimera', 'Sable', 'Gargoyle', 'Juggernaut', 'Thopter', 'Horror', 'Construct',
                'Avatar', 'Horse', 'Bird', 'Elk', 'Unicorn',
            ],
            'Enchantment Creature' => [
                'Human Warrior', 'Human Soldier', 'Boar', 'Gorgon', 'Human Wizard', 'Manticore', 'Centaur',
                'Spirit', 'Hag', 'Demon', 'Unicorn', 'Satyr', 'Merfolk', 'Wolf', 'Chimera', 'Zombie',
                'Insect', 'Nautilus', 'Cyclops', 'Giant', 'Nymph', 'Minotaur', 'Ox', 'Elemental',
                'Siren', 'Hound', 'Spider', 'Sheep', 'Nymph Dryad', 'Beast', 'Lamia', 'Human Cleric',
                'Archon', 'Snake', 'Elk', 'Horror', 'Cat', 'Crab',
            ],
            'Legendary Enchantment Creature' => [
                'God'
            ],
            'Artifact Land' => [],
            'Legendary Land' => [],
            'Legendary Enchantment Artifact' => [],
        ];
        
        foreach ($cardTypeTree as $parentTypeName => $children) {
            $this->insert('card_type', [
                'name' => $parentTypeName,
                'created_at' => gmdate('Y-m-d H:i:s'),
            ]);
            $parentId = $this->db->createCommand('SELECT MAX(card_type_id) FROM card_type')->queryScalar();
            
            foreach ($children as $childTypeName) {
                $this->insert('card_type', [
                    'name' => $childTypeName,
                    'parent_card_type_id' => $parentId,
                    'created_at' => gmdate('Y-m-d H:i:s')
                ]);
            }
        }
        
        parent::safeUp(); // TODO: Change the autogenerated stub
    }

    public function safeDown()
    {
        $this->dropTable('card_type');
        parent::safeDown(); // TODO: Change the autogenerated stub
    }
}
