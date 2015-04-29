<?php



namespace Kamran\TagsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Kamran\TagsBundle\Entity\Tags;
use Kamran\TagsBundle\Form\Type\TagsType;
use Kamran\TagsBundle\Form\Type\GroupChoiceType;



/**
 * Tags controller.
 *
 * @Route("/tags")
 */

class IndexController extends Controller
{



    /**
     * @Route("/add", name="tags_add")
     * @Template()
     */
    public function addAction(Request $request){

        $entity = new Tags();
        $form = $this->createForm(new TagsType() , $entity);

        if ($request->getMethod() === 'POST'){
            $form->handleRequest($request);

            
            echo '<pre>';
            print_r($form->getData());
            echo '</pre>';

/*            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
            }*/
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }


     /**
     * @Route("/group", name="tags_group")
     * @Template()
     */
    public function groupAction(Request $request){
        
        $form = $this->createForm(new GroupChoiceType());

        if ($request->getMethod() === 'POST'){
            $form->handleRequest($request);
            echo '<pre>';
            print_r($form->getData());
            echo '</pre>';
            
        }
        

        return array(
            'form'   => $form->createView()
        );
    }
   

}
