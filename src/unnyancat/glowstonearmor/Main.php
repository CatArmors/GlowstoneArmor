<?php

namespace unnyancat\glowstonearmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§eGlowstone Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2020, 0), new ArmorTypeInfo(10, 500, 0), "glowstone helmet");
            $helmet->setTexture('glowstone_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2021, 0), new ArmorTypeInfo(10, 500, 1), "glowstone chestplate");
            $chestplate->setTexture('glowstone_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2022, 0), new ArmorTypeInfo(10, 500, 2), "glowstone leggings");
            $leggings->setTexture('glowstone_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2023, 0), new ArmorTypeInfo(10, 500, 3), "glowstone boots");
            $boots->setTexture('glowstone_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}