<?php

namespace AquiveMedia;

use N98\Magento\Command\AbstractMagentoCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductsDeleteCommand extends AbstractMagentoCommand
{
    protected function configure()
    {
        $this
            ->setName('products:delete')            
            ->setDescription('WARNING! Deletes all products from store')
        ;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->detectMagento($output);
        if ($this->initMagento()) {
            
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $objectManager->get('Magento\Framework\Registry')->register('isSecureArea', true);
            
            $appState = $objectManager->get('\Magento\Framework\App\State');
            $appState->setAreaCode('adminhtml');
            
            $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
            $collection = $productCollection->create()->load();
            
                        
            foreach ($collection as $product){
                try {
                    $output->writeln('Deleted SKU: '. $product->getSku());
                    $product->delete();
            
                } catch (Exception $e) {
                    $output->writeln('Unable to delete product SKU: ' . $product->getSku());
                    $output->writeln($e->getMessage());
                }   
            }      
                                                                         
        }
    }
}
