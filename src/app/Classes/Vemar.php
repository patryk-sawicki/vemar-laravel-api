<?php

namespace PatrykSawicki\VemarApi\app\Classes;

class Vemar
{
    public static function fabricColors(): FabricColors {
        return new FabricColors();
    }

    public static function files(): Files {
        return new Files();
    }
}