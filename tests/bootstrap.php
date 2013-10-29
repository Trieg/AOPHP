<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 10/28/13
 * @time 8:24 PM
 */

require __DIR__ . '/../autoload.php';

$AOPHP = \AOPHP\AOPHP::crete();

$object = new DocBlockTest();

$AOPHP->addTarget($AOPHP->createTarget($object));
$AOPHP->addAspect($AOPHP->createAspect(clone $object));

$AOPHP->advice($object, 'doThings', ['"Lorem Ipsum dolor sit amet"']);
$AOPHP->advice($object, 'doAnotherThings', ['"Lorem Ipsum dolor sit amet"']);