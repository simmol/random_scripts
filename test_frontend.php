<?php

$error_code = 401; # XXX Can be changed to some other code

# configure delays in microseconds
$min_delay  = 1000000;
$max_delay  = 4000000;

# XXX [ { image: "url", words: ['a', 'b'] }]
$data = array(
    'data'      => array(
        # TODO add more arrays like the one below as much as you need
        array('image' => '<image_url>', 'words' => array('foo', 'bar')) # FIXME image url and words are just examples
    ),
    'message'   => 'success',
);

$success = rand(0, 4);

header('Content-Type: application/json;charset=utf-8');

if (!$success) {
    http_response_code($error_code);
    $data['message'] = 'Occured, a ' . $error_code . ' error has...';
    $data['data']    = array();
}

# XXX this create random delay from 1 to 3 seconds
usleep(rand($min_delay, $max_delay));

echo json_encode($data);
