<?php

namespace Tenolo\Bundle\TranslationAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Tenolo\Bundle\TranslationBundle\Form\Type\Entities\DomainEntityType;

/**
 * Class TokenAdmin
 *
 * @package Tenolo\Bundle\TranslationAdminBundle\Admin
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TokenAdmin extends AbstractAdmin
{

    /**
     * @inheritdoc
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class, [
            'label' => 'Name',
            'attr'  => [
                'help_text' => 'Der Name des Token.'
            ]
        ]);
        $formMapper->add('domain', DomainEntityType::class, []);
    }

    /**
     * @inheritdoc
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    /**
     * @inheritdoc
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper->addIdentifier('name');
    }
}
