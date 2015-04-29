<?php

namespace Kamran\TagsBundle\Form\Type;

use Symfony\Component\Form\DataTransformerInterface;

class TagsTransformer implements DataTransformerInterface
{
    public function transform($tags)
    {

       
       
       //return "I am ..";
        //echo $tags->getName();
       
        $tags = $tags ?: array();
        return implode(', ', $tags);

    }

    public function reverseTransform($tags)
    {
       
        $tags = $tags ?: '';

         echo "fack";
        
        return array_filter(array_map('trim', explode(',', $tags)));
        //return 'abc';
    }
}
