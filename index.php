<?php

require 'vendor/autoload.php';

use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;


class Btc {

    private $xpub = 'xpub6DCkA3SduW8g9iE8zjLiEc9ripgJ7xgSVkXnu4y2HfxLA6D5pXZD9e5NbuG3t6MjcnGnUNBGsNRCPRcLn8BZoMV6Pwduh7VVfDBgGgR8gFA';

    public function getNewAddress($id = 0)
    {       
        $factory = new HierarchicalKeyFactory();
        $master = $factory->fromExtended($this->xpub)->deriveChild($id);
        $addr =  new PayToPubKeyHashAddress($master->getPublicKey()->getPubKeyHash());
        return $addr->getAddress();
    }
}


?>
