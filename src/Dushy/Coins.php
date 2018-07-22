<?php

namespace Dushy;

//Basis
use pocketmine\plugin\PluginBase;

//Für Münzen
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Coins extends PluginBase {
	
	public $prefix = "§7[§eMünzen§7]";
	
	public function onEnable() {
	$this->getServer()->getLogger()->info("§bPlugin §eMünzen §bwurde aktiviert!");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{ 
        if($cmd->getName() == "coins"){
            switch($args[0]){
            	case "add":
                  if(!empty($args[1]) && !empty($args[2])){
                        API::addCoins($args[1], intval($args[2]));
                        $sender->sendMessage("§a".$player." hat nun ".$args[2]." Münzen erhalten!");
                    }else{
                        $sender->sendMessage("§cBenutzung: /coins add <player> <coins>");
                    }
                    break;
                case "set":
                    if(!empty($args[1]) && !empty($args[2])){
                        API::setCoins($args[1], intval($args[2]));
                        $sender->sendMessage("§a".$player." wurden nun ".$args[2]." Münzen gesetzt!");
                    }else{
                        $sender->sendMessage("§cBenutzung: /coins set <player> <coins>");
                        }
                    break;
                case "remove":
                    if(!empty($args[1]) && !empty($args[2])){
                        API::removeCoins($args[1], intval($args[2]));
                        $sender->sendMessage("§a".$player." wurden ".$args[2]." Münzen entfernt");
                    }else{
                        $sender->sendMessage("§cBenutzung: /coins remove <player> <coins>");
                        }
                        break;
                    
            }
            return true;
        }
     }
  }