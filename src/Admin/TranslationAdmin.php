<?php

namespace Tenolo\Bundle\TranslationAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Tenolo\Bundle\TranslationBundle\Form\Type\Entities\LanguageEntityType;
use Tenolo\Bundle\TranslationBundle\Form\Type\Entities\TokenEntityType;

/**
 * Class TranslationAdmin
 *
 * @package Tenolo\Bundle\TranslationAdminBundle\Admin
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TranslationAdmin extends AbstractAdmin
{

    /**
     * @inheritdoc
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('language', LanguageEntityType::class, [
            'attr' => [
                'help_text' => 'Wählen Sie bitte die Sprache aus, in die übersetzt wird.',
            ],
        ]);
        $formMapper->add('token', TokenEntityType::class, [
            'attr' => [
                'help_text' => 'Wählen Sie den Token aus, für den eine Übersetzung angelegt werden soll.',
            ],
        ]);
        $formMapper->add('translation', TextareaType::class, [
            'label' => 'Übersetzung',
            'attr'  => [
                'rows'      => 5,
                'help_text' => 'Tragen Sie hier die eigentliche Übersetzung ein.',
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        unset($this->listModes['mosaic']);

        $datagridMapper->add('translation');
        $datagridMapper->add('token.domain');
        $datagridMapper->add('token');
        $datagridMapper->add('language');
    }

    /**
     * @inheritdoc
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->add('token.domain', null, [
            'label' => 'Domain',
        ]);
        $listMapper->add('token', null, [
            'label' => 'Token',
        ]);
        $listMapper->add('language', null, [
            'label' => 'Sprache',
        ]);
        $listMapper->addIdentifier('translation', null, [
            'label' => 'Übersetzung',
        ]);
        $listMapper->add('createdAt', 'datetime', [
            'label' => 'Erstellt'
        ]);
        $listMapper->add('updatedAt', 'datetime', [
            'label' => 'Aktualisiert'
        ]);
    }
}
