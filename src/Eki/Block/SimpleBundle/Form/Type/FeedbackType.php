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

class FeedbackType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( 'fullName', 'text', array( 'label' => 'eki_block.feedback.form.full_name.label') )
            ->add( 'email', 'email', array( 'label' => 'eki_block.feedback.form.email.label') )
            ->add( 'subject', 'text', array( 'label' => 'eki_block.feedback.form.subject.label') )
            ->add( 'message', 'textarea', array( 'label' => 'eki_block.feedback.form.message.label') )
            ->add( 'send', 'submit', array( 'label' => 'eki_block.feedback.form.send.label') );
    }

    public function getName()
    {
        return 'eki_block_simple_feedback';
    }

    public function setDefaultOptions( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults( array( 
			'data_class' => "Eki\\Block\\SimpleBundle\\Entity\\Feedback",
			'csrf_protection' => false
		) );
    }
}
