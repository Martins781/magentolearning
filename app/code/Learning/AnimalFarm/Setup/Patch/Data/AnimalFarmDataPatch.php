<?php

namespace Learning\AnimalFarm\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AnimalFarmDataPatch implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {

        $this->moduleDataSetup = $moduleDataSetup;
    }
    /**
     * @inheritdoc
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->insert(
            $this->moduleDataSetup->getTable('animal_farm'),
            [
                'name' => 'Pigs',
                'description' => 'Lorem pigsum'
            ]

        );
        $this->moduleDataSetup->getConnection()->insert(
            $this->moduleDataSetup->getTable('animal_farm'),
            [
                'name' => 'cat',
                'description' => 'cats not like dogs'
            ]
        );

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies()
    {
        return [];
    }
    public function getAliases()
    {
        return [];
    }
}












