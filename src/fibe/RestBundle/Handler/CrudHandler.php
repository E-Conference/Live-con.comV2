<?php

namespace fibe\RestBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use fibe\CommunityBundle\Entity\Company;
use fibe\CommunityBundle\Form\CompanyType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View as RedirectView;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

/**
 * Company controller.
 *
 *
 */
class CrudHandler
{
    private $em;
    private $serializer;
    private $formFactory;
    private $router;

    public function __construct(EntityManager $em, SerializerInterface $serializer, FormFactoryInterface $formFactory,RouterInterface $router)
    {
        $this->em = $em;
        $this->serializer = $serializer;
        $this->formFactory = $formFactory;
        $this->router = $router;
    }

  /**
   * Processes the form.
   *
   * @param string $className
   * @param Request $request
   * @param String $method
   *
   * @return mixed $entity|form validation errors
   */
  public function processForm($className, Request $request, $method = "PATCH")
  {
    $formData = $request->request->all();
    //TODO secure this with acl
    if($method == "POST")
    {
      $entity = new $className();
    }
    else
    {
      $entity = $this->em->getRepository($className)->find($formData['id']);
    }
    //TODO get the form dynamically
    $form = $this->formFactory->create(new CompanyType(), $entity, array('method' => $method));
    unset($formData['id']);//remove id to avoid form validation error with this unnecessary id
    $form->submit($formData, 'PATCH' !== $method);
    if ($form->isValid())
    {
      //TODO call a service for business logic if it exists
      $entity = $form->getData();
      $this->em->persist($entity);
      $this->em->flush($entity);
      return $entity;
    }

    return array(
      'form' => $form,
    );
  }
}
