<?php
namespace Wan24\PhpWsdlBundle;
use Symfony\Component\HttpFoundation\Response;
use Wan24\PhpWsdlBundle\PhpWsdl;
/**
 * Description of SoapServer
 *
 * @author cbaxter
 */
class SoapServer extends \SoapServer{
    /**
     * Extension of SoapServer to make it Symfony2 compatible
     * @param string $soap_request
     * @return Response
     */
    public function handle($soap_request = NULL)
    {        
        $response = new Response();        
        $response->headers->set('Content-Type', 'text/xml; charset=utf-8');        
        ob_start();        
        // note the lack of $soap_request when calling handle, this is intentional
        parent::handle();
        
        $response->setContent(ob_get_clean());
        return $response;
    }
}

