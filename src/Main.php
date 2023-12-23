<?php
declare(strict_types=1);

namespace DavyCraft648\Oceanite;

use customiesdevs\customies\item\CustomiesItemFactory;
use DavyCraft648\Oceanite\item\tool\ReaperScythe;
use pocketmine\item\VanillaItems;
use pocketmine\resourcepacks\ZippedResourcePack;
use pocketmine\scheduler\ClosureTask;
use Symfony\Component\Filesystem\Path;
use function array_merge;

final class Main extends \pocketmine\plugin\PluginBase{

	protected function onLoad() : void{
		$this->saveDefaultConfig();
		$this->saveResource("ArmorTools.mcpack");
		$rpManager = $this->getServer()->getResourcePackManager();
		$rpManager->setResourceStack(array_merge($rpManager->getResourceStack(), [new ZippedResourcePack(Path::join($this->getDataFolder(), "ArmorTools.mcpack"))]));
		(new \ReflectionProperty($rpManager, "serverForceResources"))->setValue($rpManager, true);

		CustomiesItemFactory::getInstance()->registerItem(ReaperScythe::class, "fortify:reaper_scythe", "Reaper Scythe");

		}
}
