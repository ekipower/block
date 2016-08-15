<?php
/**
 * This file is part of the Ekipower eZ Website package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Block\SimpleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReceiveInfoType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( 'email', 'email', array( 'label' => false, 'empty_data' => 'eki_block.receive_info.form.email.placeholder') )
            ->add( 'send', 'submit', array( 'label' => 'eki_block.receive_info.form.send.label') );
    }

    public function getName()
    {
        return 'eki_block_simple_receive_info';
    }

    public function setDefaultOptions( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults( array( 
			'data_class' => "Eki\\Block\\SimpleBundle\\Entity\\ReceiveInfo",
			'csrf_protection' => false
		) );
    }
}
