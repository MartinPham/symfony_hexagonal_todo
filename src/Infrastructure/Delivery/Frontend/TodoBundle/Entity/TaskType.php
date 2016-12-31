<?php


namespace Infrastructure\Delivery\Frontend\TodoBundle\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class TaskType
 *
 * @category None
 * @package  Infrastructure\Delivery\Frontend\TodoBundle\Entity
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskType extends AbstractType
{
    /**
     * Build Form
     *
     * @param FormBuilderInterface $builder Form builder
     * @param array                $options Options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('save', SubmitType::class);
    }
}