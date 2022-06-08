<?php

namespace Magebit\Faq\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    protected $customFactory;
    protected $adapterFactory;
    protected $uploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magebit\Faq\Model\CustomFactory $customFactory
    ) {
        parent::__construct($context);
        $this->customFactory = $customFactory;
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        try {
            if (isset($data['id'])) {
                $model = $this->customFactory->create()->load($data['id']);
            } else {
                $model = $this->customFactory->create();
            }

            $model->addData([
                "question" => $data['question'],
                "answer" => $data['answer'],
                "status" => $data['status']
            ]);

            $saveData = $model->save();

            if ($saveData) {
                $this->messageManager->addSuccess(__('Insert data Successfully !'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('*/*/index');
    }
}
