<?php
namespace fibe\ContentBundle\Form\DataTransformer;

use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use fibe\ContentBundle\Entity\Topic;

class GetOrCreateTopicTransformer implements DataTransformerInterface
{
  /**
   * @var ObjectManager
   */
  private $om;

  /**
   * @param ObjectManager $om
   */
  public function __construct(ObjectManager $om)
  {
    $this->om = $om;
  }

  public function transform($topics)
  {
    return $topics;
  }


  public function reverseTransform($topics)
  {
    if (!$topics || count($topics) < 1) {
      return $topics;
    }
    $results = array();
    foreach($topics as $topic)
    {
      $label = $topic->getLabel();
      $result = $this->om
        ->getRepository('fibeContentBundle:Topic')
        ->findOneBy(array('label' => $label))
      ;

      if (null === $result)
      {
        $result = new Topic();
        $result->setLabel($label);
      }
      else
      {
        $this->om->merge($topic);
      }

      $results[] = $result;
    }
    return $results ;
  }
}