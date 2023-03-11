<?php

namespace PatrykSawicki\VemarApi\app\Classes;

class Vemar
{
    public static function fabricColors(): FabricColors {
        return new FabricColors();
    }

    public static function systemColors(): SystemColors {
        return new SystemColors();
    }

    public static function files(): Files {
        return new Files();
    }

    public static function systems(): Systems {
        return new Systems();
    }

    public static function types(): Types {
        return new Types();
    }

    public static function equipments(): Equipments {
        return new Equipments();
    }

    public static function systemEquipments(): SystemEquipments {
        return new SystemEquipments();
    }

    public static function systemModels(): SystemModels
    {
        return new SystemModels();
    }

    public static function checkPrice(): CheckPrice
    {
        return new CheckPrice();
    }

    public static function customerData(): CustomerData
    {
        return new CustomerData();
    }
}