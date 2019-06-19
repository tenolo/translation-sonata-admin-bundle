<?php

namespace Tenolo\Bundle\TranslationAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;

/**
 * Class LanguageAdmin
 *
 * @package Tenolo\Bundle\TranslationAdminBundle\Admin
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class LanguageAdmin extends AbstractAdmin
{

    /**
     * @inheritdoc
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('locale', LocaleType::class, [
            'label' => 'Länder-Code',
            'attr'  => [
                'placeholder' => 'Beispiel: de_DE',
                'help_text'   => 'Wählen Sie bitte die Sprache aus, die Sie übersetzen möchten.'
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('locale');
    }

    /**
     * @inheritdoc
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper->addIdentifier('name');
        $listMapper->add('locale');
    }
}
