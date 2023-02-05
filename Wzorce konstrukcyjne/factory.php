<?php

use InvalidArgumentException;

class KanapkaFactory implements Factory {

   public static function zrobKanapka (KanapkaItem $kanapka): Kanapka {

      switch ($itemKanapka->getTyp()) {
         case KanapkaItem::TYP_WEGE:
            return new WegeKanapka($itemKanapka);
            break;
         case KanapkaItem::TYP_MIESO:
            return new MiesoKanapka($itemKanapka);
            break;
         default:
            throw new InvalidArgumentException("Wrong file type provided: {$itemKanapka->getTyp()}");
            break;
      }
   }
}


interface Factory {
   public static function zrobKanapke (KanapkaItem $kanapka): Kanapka;
}


interface Factory {
   public static function zrobKanapke (KanapkaItem $kanapka): Kanapka;
}

?>