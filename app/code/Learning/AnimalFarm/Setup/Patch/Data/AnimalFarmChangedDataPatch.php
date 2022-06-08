<?php

namespace Learning\AnimalFarm\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AnimalFarmChangedDataPatch implements DataPatchInterface
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

        $this->moduleDataSetup->getConnection()->update(
            $this->moduleDataSetup->getTable('animal_farm'),
            ['name' => 'horse','description' => 'with no name'],
            ['id = ?' => 1]
        );

        $this->moduleDataSetup->getConnection()->delete(
            $this->moduleDataSetup->getTable('animal_farm'),
            ['id = ?' => 2]
        );

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies()
    {
        return [faqDataPatch::class];
    }
    public function getAliases()
    {
        return [];
    }
}












