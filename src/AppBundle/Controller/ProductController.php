<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ProductType;
//use AppBundle\Product\product;
use AppBundle\Entity\Product;

class ProductController extends Controller
{
        
    /**
     * @Route("/create_product", name="create_product")
     */
    public function createAction(Request $request)
    {
        $product= new Product();
        
        $form =$this->createForm(ProductType::class , $product);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            $em = $this->get('doctrine.orm.entity_manager');
            $em ->persist($product);  
            $em->flush();
            
            $this->addFlash('success','Your product has been created succesfully');
            return $this->redirectToRoute('homepage');
        }
        return $this->render('product/product.html.twig',[
            'form' => $form ->createView(),
        ]);
    }
    
    /**
     * @Route("/admin/products", name="products")
     */
    public function productssAction(Request $request){
        /*$subject =  $request->query->get('subject');*/
        
        $em = $this->get('doctrine.orm.entity_manager');
        $products = $em->getRepository(Product::class)->findAll();
        
        return $this->render('product/products.html.twig', [
            'products' => $products,
        ]); 
    }
    
    
    /**
     * @Route("/{id}",name="product_update",requirements={ "id" = "\d+"})
     */
    public function updateAction(Request $request, Product $product)
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The product has been successfully updated.');

            return $this->redirectToRoute(
                'product_update',
                array('id' => $product->getId())
            );
        }
        return $this->render('product/product.html.twig',[
            'form' => $form ->createView(),
        ]);   
    }
    
    
    /**
     * @Route("/delete", name="product_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request)
    {
        if (!$product = $this->getDoctrine()->getRepository('AppBundle:Product')->findOneById($request->request->get('product_id'))) {
            $this->addFlash('error', 'The product you want to delete does not exist.');

            return $this->redirectToRoute('products');
        }

        $csrf_token = new CsrfToken('delete_product', $request->request->get('_csrf_token'));

        if ($this->get('security.csrf.token_manager')->isTokenValid($csrf_token)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();

            $this->addFlash('success', 'You have successfully deleted the product.');
        } else {
            $this->addFlash('error', 'An error occurred.');
        }

        return $this->redirectToRoute('products');
    }
    
}
