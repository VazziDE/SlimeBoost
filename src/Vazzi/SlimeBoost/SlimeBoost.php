<?php


namespace Vazzi\SlimeBoost;


use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\plugin\PluginBase;

class SlimeBoost extends PluginBase
{

	//Default Block ID 165 - Slime Block ID
	public static $blockID = 165;
	public static $worlds = [];

	public function onEnable()
	{
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents(new BoostListener(), $this);
		$this->registerSettings();
	}

	private function registerSettings(){
		if(is_numeric($this->getConfig()->get("block-id", 165))){
			self::$blockID = (int)$this->getConfig()->get("block-id", 165);
		}
		if(is_numeric($this->getConfig()->get("forward-boost", 1))){
			BoostListener::$forwardboost = (int)$this->getConfig()->get("forward-boost", 1);
		}
		if(is_numeric($this->getConfig()->get("high-boost", 1))){
			BoostListener::$highboost = (int)$this->getConfig()->get("high-boost",1);
		}
		if(!$this->getConfig()->exists("allowed-worlds")){
			$this->getConfig()->set("allowed-worlds", ["world", "world2"]);
			$this->getConfig()->save();
			$this->getLogger()->info("§eSlimeBoost Plugin Config has been updated.");
			self::$worlds = ["world", "world2"];
		}else{
			foreach ($this->getConfig()->get("allowed-worlds", []) as $worldname){
				self::$worlds[] = $worldname;
			}
		}
		if ($this->getConfig()->get("register-slime", true)){
			BlockFactory::registerBlock(new SlimeBlock(165), true);
			Item::addCreativeItem(new ItemBlock(Block::SLIME_BLOCK));
		}
	}

}