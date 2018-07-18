<?php
// src/Controller/BlogController.php
  
namespace App\Controller;
  
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

  
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
// use Symfony\Component\HttpFoundation\Request;


// use Symfony\Component\HttpFoundation\Request;

// use Symfony\Component\HttpFoundation\Response;

// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     *
     * @Route("/{id}", name="blog", requirements={"id"="\d+"})
     * @Method("GET")
     */
    public function show($id)
    {
        $em = $this->getDoctrine()->getManager();
  
        $blog = $em->getRepository('App:Blog')->find($id);
  
        if (!$blog) {
        throw $this->createNotFoundException('Unable to find Blog post !');
        }
  
        //$comments = $em->getRepository('App:Comment')
        //               ->getCommentsForBlog($blog->getId());
  
        return $this->render('blog/show.html.twig', array(
            'blog'      => $blog
            //,
            //'comments'  => $comments
        ));             
    }
    
     /**
     * List all blogs entry
     *
     * @Route("/list/articles", name="blogs")
     * @Method("GET")
     */
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
  
        $blogs = $em->getRepository('App:Blog')->findAll();
  
        if (!$blogs) {
        throw $this->createNotFoundException('Unable to find articles!!!');
        }
  
        //$comments = $em->getRepository('App:Comment')
        //               ->getCommentsForBlog($blog->getId());
  
        return $this->render('blog/list.html.twig', array(
            'blogs'      => $blogs
            //,
            //'comments'  => $comments
        ));              
    }

}

// name="blog",  id="\d+"